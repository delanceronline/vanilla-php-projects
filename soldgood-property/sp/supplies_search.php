<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/supplies_variables.php");
include("classes/searchcontrol.php");
include("classes/advancedsearchcontrol.php");
include("classes/panelsearchcontrol.php");
include("classes/searchclause.php");

$sessionPrefix = $strTableName;

//Basic includes js files
$includes="";
// predefined fields num
$predefFieldNum = 0;

$chrt_array=array();
$rpt_array=array();

//	check if logged in
if( (!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && !@$chrt_array['status'] && !@$rpt_array['status'])
|| (@$rpt_array['status'] == "private" && @$rpt_array['owner'] != @$_SESSION["UserID"])
|| (@$chrt_array['status'] == "private" && @$chrt_array['owner'] != @$_SESSION["UserID"]) )
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

// id that used to add to controls names
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
	
// for usual page show proccess
$mode=SEARCH_SIMPLE;
$templatefile = "supplies_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode = SEARCH_LOAD_CONTROL;
	$templatefile = "supplies_inline_search.htm";
}	
	

$calendar = false;

////////////////////// time picker
$timepicker = false;

$params = array();
$params["id"] = $id;
$params["mode"] = $mode;
$params["calendar"] = $calendar;
$params["timepicker"] = $timepicker;
$params['xt'] = &$xt;
$params['shortTableName'] = 'supplies';
$params['origTName'] = $strOriginalTableName;
$params['sessionPrefix'] = $sessionPrefix;
$params['tName'] = $strTableName;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;
$params['pageType']=PAGE_SEARCH;

//PAGE_SEARCH,$id,$calendar

$pageObject = new RunnerPage($params);

// create reusable searchControl builder instance
$searchControllerId = (postvalue('searchControllerId') ? postvalue('searchControllerId') : $pageObject->id);




//	Before Process event
if($eventObj->exists("BeforeProcessSearch"))
	$eventObj->BeforeProcessSearch($conn);

// add constants and files for simple view
if ($mode==SEARCH_SIMPLE)
{
	$searchControlBuilder = new AdvancedSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);
	// add onload event
	$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadSearch", '');
	$pageObject->addOnLoadJsEvent($onLoadJsCode);

	// add button events if exist
	$pageObject->addButtonHandlers();

	$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
	$includes.="<script language=\"JavaScript\" src=\"include/customlabels.js\"></script>\r\n";
	$includes .="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";	
	if ($pageObject->debugJSMode === true)
	{
		/*$includes.="<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Observer.js\"></script>\r\n";*/
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
	}
	else
	{
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
	}	

	// if not simple, this div already exist on page
	$includes.="<div id=\"search_suggest\" class=\"search_suggest\"></div>";	

	// search panel radio button assign
	$searchRadio = $searchControlBuilder->getSearchRadio();
	$xt->assign_section("all_checkbox_label", $searchRadio['all_checkbox_label'][0], $searchRadio['all_checkbox_label'][1]);
	$xt->assign_section("any_checkbox_label", $searchRadio['any_checkbox_label'][0], $searchRadio['any_checkbox_label'][1]);
	$xt->assignbyref("all_checkbox",$searchRadio['all_checkbox']);
	$xt->assignbyref("any_checkbox",$searchRadio['any_checkbox']);
		
	// search fields data
	
	if(GetLookupTable("id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("id", $strTableName)] = GetTableURL(GetLookupTable("id", $strTableName));
	
	$pageObject->fillFieldToolTips("id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("id_label","<label for=\"".GetInputElementId("id", $id)."\">","</label>");
	else 
		$xt->assign("id_label", true);
	
	$xt->assign("id_fieldblock", true);		
	$xt->assignbyref("id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("estate", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("estate", $strTableName)] = GetTableURL(GetLookupTable("estate", $strTableName));
	
	$pageObject->fillFieldToolTips("estate");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("estate");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "estate";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("estate_label","<label for=\"".GetInputElementId("estate", $id)."\">","</label>");
	else 
		$xt->assign("estate_label", true);
	
	$xt->assign("estate_fieldblock", true);		
	$xt->assignbyref("estate_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("estate_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("estate_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_estate", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("estate");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"estate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"estate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("creation_date", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("creation_date", $strTableName)] = GetTableURL(GetLookupTable("creation_date", $strTableName));
	
	$pageObject->fillFieldToolTips("creation_date");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("creation_date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "creation_date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("creation_date_label","<label for=\"".GetInputElementId("creation_date", $id)."\">","</label>");
	else 
		$xt->assign("creation_date_label", true);
	
	$xt->assign("creation_date_fieldblock", true);		
	$xt->assignbyref("creation_date_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("creation_date_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("creation_date_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_creation_date", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("creation_date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"creation_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"creation_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("district_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("district_id", $strTableName)] = GetTableURL(GetLookupTable("district_id", $strTableName));
	
	$pageObject->fillFieldToolTips("district_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("district_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "district_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("district_id_label","<label for=\"".GetInputElementId("district_id", $id)."\">","</label>");
	else 
		$xt->assign("district_id_label", true);
	
	$xt->assign("district_id_fieldblock", true);		
	$xt->assignbyref("district_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("district_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("district_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_district_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("district_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"district_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"district_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("user_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("user_id", $strTableName)] = GetTableURL(GetLookupTable("user_id", $strTableName));
	
	$pageObject->fillFieldToolTips("user_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("user_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "user_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("user_id_label","<label for=\"".GetInputElementId("user_id", $id)."\">","</label>");
	else 
		$xt->assign("user_id_label", true);
	
	$xt->assign("user_id_fieldblock", true);		
	$xt->assignbyref("user_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("user_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("user_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_user_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("user_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"user_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"user_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic8", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic8", $strTableName)] = GetTableURL(GetLookupTable("pic8", $strTableName));
	
	$pageObject->fillFieldToolTips("pic8");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic8_label","<label for=\"".GetInputElementId("pic8", $id)."\">","</label>");
	else 
		$xt->assign("pic8_label", true);
	
	$xt->assign("pic8_fieldblock", true);		
	$xt->assignbyref("pic8_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic8_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic8_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic8", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("area", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("area", $strTableName)] = GetTableURL(GetLookupTable("area", $strTableName));
	
	$pageObject->fillFieldToolTips("area");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("area");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "area";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("area_label","<label for=\"".GetInputElementId("area", $id)."\">","</label>");
	else 
		$xt->assign("area_label", true);
	
	$xt->assign("area_fieldblock", true);		
	$xt->assignbyref("area_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("area_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("area_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_area", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("area");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"area", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"area", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("address", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("address", $strTableName)] = GetTableURL(GetLookupTable("address", $strTableName));
	
	$pageObject->fillFieldToolTips("address");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("address");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "address";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("address_label","<label for=\"".GetInputElementId("address", $id)."\">","</label>");
	else 
		$xt->assign("address_label", true);
	
	$xt->assign("address_fieldblock", true);		
	$xt->assignbyref("address_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("address_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("address_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_address", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("address");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"address", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"address", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("unit_price", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("unit_price", $strTableName)] = GetTableURL(GetLookupTable("unit_price", $strTableName));
	
	$pageObject->fillFieldToolTips("unit_price");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("unit_price");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "unit_price";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("unit_price_label","<label for=\"".GetInputElementId("unit_price", $id)."\">","</label>");
	else 
		$xt->assign("unit_price_label", true);
	
	$xt->assign("unit_price_fieldblock", true);		
	$xt->assignbyref("unit_price_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("unit_price_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("unit_price_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_unit_price", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("unit_price");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"unit_price", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"unit_price", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("years", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("years", $strTableName)] = GetTableURL(GetLookupTable("years", $strTableName));
	
	$pageObject->fillFieldToolTips("years");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("years");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "years";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("years_label","<label for=\"".GetInputElementId("years", $id)."\">","</label>");
	else 
		$xt->assign("years_label", true);
	
	$xt->assign("years_fieldblock", true);		
	$xt->assignbyref("years_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("years_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("years_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_years", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("years");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"years", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"years", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("rc", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("rc", $strTableName)] = GetTableURL(GetLookupTable("rc", $strTableName));
	
	$pageObject->fillFieldToolTips("rc");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("rc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("rc_label","<label for=\"".GetInputElementId("rc", $id)."\">","</label>");
	else 
		$xt->assign("rc_label", true);
	
	$xt->assign("rc_fieldblock", true);		
	$xt->assignbyref("rc_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("rc_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("rc_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_rc", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("rc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("hc", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("hc", $strTableName)] = GetTableURL(GetLookupTable("hc", $strTableName));
	
	$pageObject->fillFieldToolTips("hc");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("hc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "hc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("hc_label","<label for=\"".GetInputElementId("hc", $id)."\">","</label>");
	else 
		$xt->assign("hc_label", true);
	
	$xt->assign("hc_fieldblock", true);		
	$xt->assignbyref("hc_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("hc_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("hc_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_hc", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("hc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"hc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"hc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("sf", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("sf", $strTableName)] = GetTableURL(GetLookupTable("sf", $strTableName));
	
	$pageObject->fillFieldToolTips("sf");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("sf");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "sf";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("sf_label","<label for=\"".GetInputElementId("sf", $id)."\">","</label>");
	else 
		$xt->assign("sf_label", true);
	
	$xt->assign("sf_fieldblock", true);		
	$xt->assignbyref("sf_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("sf_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("sf_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_sf", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("sf");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sf", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sf", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("height_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("height_id", $strTableName)] = GetTableURL(GetLookupTable("height_id", $strTableName));
	
	$pageObject->fillFieldToolTips("height_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("height_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "height_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("height_id_label","<label for=\"".GetInputElementId("height_id", $id)."\">","</label>");
	else 
		$xt->assign("height_id_label", true);
	
	$xt->assign("height_id_fieldblock", true);		
	$xt->assignbyref("height_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("height_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("height_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_height_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("height_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"height_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"height_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("modified_date", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("modified_date", $strTableName)] = GetTableURL(GetLookupTable("modified_date", $strTableName));
	
	$pageObject->fillFieldToolTips("modified_date");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("modified_date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "modified_date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("modified_date_label","<label for=\"".GetInputElementId("modified_date", $id)."\">","</label>");
	else 
		$xt->assign("modified_date_label", true);
	
	$xt->assign("modified_date_fieldblock", true);		
	$xt->assignbyref("modified_date_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("modified_date_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("modified_date_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_modified_date", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("modified_date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"modified_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"modified_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("feature", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("feature", $strTableName)] = GetTableURL(GetLookupTable("feature", $strTableName));
	
	$pageObject->fillFieldToolTips("feature");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("feature");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "feature";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("feature_label","<label for=\"".GetInputElementId("feature", $id)."\">","</label>");
	else 
		$xt->assign("feature_label", true);
	
	$xt->assign("feature_fieldblock", true);		
	$xt->assignbyref("feature_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("feature_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("feature_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_feature", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("feature");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"feature", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"feature", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("remark", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("remark", $strTableName)] = GetTableURL(GetLookupTable("remark", $strTableName));
	
	$pageObject->fillFieldToolTips("remark");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("remark");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "remark";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("remark_label","<label for=\"".GetInputElementId("remark", $id)."\">","</label>");
	else 
		$xt->assign("remark_label", true);
	
	$xt->assign("remark_fieldblock", true);		
	$xt->assignbyref("remark_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("remark_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("remark_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_remark", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("remark");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"remark", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"remark", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("icon", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("icon", $strTableName)] = GetTableURL(GetLookupTable("icon", $strTableName));
	
	$pageObject->fillFieldToolTips("icon");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("icon");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "icon";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("icon_label","<label for=\"".GetInputElementId("icon", $id)."\">","</label>");
	else 
		$xt->assign("icon_label", true);
	
	$xt->assign("icon_fieldblock", true);		
	$xt->assignbyref("icon_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("icon_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("icon_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_icon", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("icon");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"icon", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"icon", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic1", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic1", $strTableName)] = GetTableURL(GetLookupTable("pic1", $strTableName));
	
	$pageObject->fillFieldToolTips("pic1");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic1_label","<label for=\"".GetInputElementId("pic1", $id)."\">","</label>");
	else 
		$xt->assign("pic1_label", true);
	
	$xt->assign("pic1_fieldblock", true);		
	$xt->assignbyref("pic1_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic1_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic1_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic1", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic2", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic2", $strTableName)] = GetTableURL(GetLookupTable("pic2", $strTableName));
	
	$pageObject->fillFieldToolTips("pic2");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic2_label","<label for=\"".GetInputElementId("pic2", $id)."\">","</label>");
	else 
		$xt->assign("pic2_label", true);
	
	$xt->assign("pic2_fieldblock", true);		
	$xt->assignbyref("pic2_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic2_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic2_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic2", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic3", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic3", $strTableName)] = GetTableURL(GetLookupTable("pic3", $strTableName));
	
	$pageObject->fillFieldToolTips("pic3");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic3_label","<label for=\"".GetInputElementId("pic3", $id)."\">","</label>");
	else 
		$xt->assign("pic3_label", true);
	
	$xt->assign("pic3_fieldblock", true);		
	$xt->assignbyref("pic3_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic3_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic3_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic3", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic4", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic4", $strTableName)] = GetTableURL(GetLookupTable("pic4", $strTableName));
	
	$pageObject->fillFieldToolTips("pic4");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic4_label","<label for=\"".GetInputElementId("pic4", $id)."\">","</label>");
	else 
		$xt->assign("pic4_label", true);
	
	$xt->assign("pic4_fieldblock", true);		
	$xt->assignbyref("pic4_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic4_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic4_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic4", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic5", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic5", $strTableName)] = GetTableURL(GetLookupTable("pic5", $strTableName));
	
	$pageObject->fillFieldToolTips("pic5");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic5_label","<label for=\"".GetInputElementId("pic5", $id)."\">","</label>");
	else 
		$xt->assign("pic5_label", true);
	
	$xt->assign("pic5_fieldblock", true);		
	$xt->assignbyref("pic5_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic5_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic5_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic5", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic6", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic6", $strTableName)] = GetTableURL(GetLookupTable("pic6", $strTableName));
	
	$pageObject->fillFieldToolTips("pic6");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic6_label","<label for=\"".GetInputElementId("pic6", $id)."\">","</label>");
	else 
		$xt->assign("pic6_label", true);
	
	$xt->assign("pic6_fieldblock", true);		
	$xt->assignbyref("pic6_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic6_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic6_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic6", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("pic7", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("pic7", $strTableName)] = GetTableURL(GetLookupTable("pic7", $strTableName));
	
	$pageObject->fillFieldToolTips("pic7");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pic7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pic7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pic7_label","<label for=\"".GetInputElementId("pic7", $id)."\">","</label>");
	else 
		$xt->assign("pic7_label", true);
	
	$xt->assign("pic7_fieldblock", true);		
	$xt->assignbyref("pic7_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pic7_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pic7_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pic7", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pic7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pic7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("ps_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("ps_id", $strTableName)] = GetTableURL(GetLookupTable("ps_id", $strTableName));
	
	$pageObject->fillFieldToolTips("ps_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ps_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ps_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ps_id_label","<label for=\"".GetInputElementId("ps_id", $id)."\">","</label>");
	else 
		$xt->assign("ps_id_label", true);
	
	$xt->assign("ps_id_fieldblock", true);		
	$xt->assignbyref("ps_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("ps_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("ps_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_ps_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ps_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ps_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ps_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("zone_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("zone_id", $strTableName)] = GetTableURL(GetLookupTable("zone_id", $strTableName));
	
	$pageObject->fillFieldToolTips("zone_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("zone_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "zone_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("zone_id_label","<label for=\"".GetInputElementId("zone_id", $id)."\">","</label>");
	else 
		$xt->assign("zone_id_label", true);
	
	$xt->assign("zone_id_fieldblock", true);		
	$xt->assignbyref("zone_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("zone_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("zone_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_zone_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("zone_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"zone_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"zone_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("supply_mode_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("supply_mode_id", $strTableName)] = GetTableURL(GetLookupTable("supply_mode_id", $strTableName));
	
	$pageObject->fillFieldToolTips("supply_mode_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("supply_mode_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "supply_mode_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("supply_mode_id_label","<label for=\"".GetInputElementId("supply_mode_id", $id)."\">","</label>");
	else 
		$xt->assign("supply_mode_id_label", true);
	
	$xt->assign("supply_mode_id_fieldblock", true);		
	$xt->assignbyref("supply_mode_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("supply_mode_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("supply_mode_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_supply_mode_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("supply_mode_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"supply_mode_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"supply_mode_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if(GetLookupTable("support_type_id", $strTableName))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][GetLookupTable("support_type_id", $strTableName)] = GetTableURL(GetLookupTable("support_type_id", $strTableName));
	
	$pageObject->fillFieldToolTips("support_type_id");	
		
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("support_type_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "support_type_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("support_type_id_label","<label for=\"".GetInputElementId("support_type_id", $id)."\">","</label>");
	else 
		$xt->assign("support_type_id_label", true);
	
	$xt->assign("support_type_id_fieldblock", true);		
	$xt->assignbyref("support_type_id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("support_type_id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("support_type_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_support_type_id", $ctrlBlockArr['searchtype']);	
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("support_type_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl) 
	{				
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"support_type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{	
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"support_type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	
	//--------------------------------------------------------

	// search fields data
	$categoryFieldParams = $pageObject->searchClauseObj->getSearchCtrlParams("zone_id");
	$categoryFieldVal = '';
	if (count($categoryFieldParams))
	{
		$categoryFieldVal = $categoryFieldParams[0]['value1'];
	}
	
	$fieldParams = $pageObject->searchClauseObj->getSearchCtrlParams('district_id');
	$fieldVal = '';
	if (count($fieldParams))
	{
		$fieldVal = $fieldParams[0]['value1'];
	}		
	
	$pageObject->body["begin"] .= $includes;

	$pageObject->addCommonJs();
		
	$xt->assignbyref("body",$pageObject->body);
	
	$xt->assign("contents_block", true);
	
	$xt->assign("conditions_block",true);
	$xt->assign("search_button",true);
	$xt->assign("reset_button",true);
	$xt->assign("back_button",true);
	
	
	$xt->assign("searchbutton_attrs","id=\"searchButton".$id."\"");
	$xt->assign("resetbutton_attrs","id=\"resetButton".$id."\"");		
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	

	if($eventObj->exists("BeforeShowSearch"))
		$eventObj->BeforeShowSearch($xt,$templatefile);
	// load controls for first page loading	
	
	
	$pageObject->fillSetCntrlMaps();
	
	$pageObject->body['end'] .= '<script>';
	$pageObject->body['end'] .= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
	$pageObject->body['end'] .= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
	$pageObject->body['end'] .= '</script>';
	
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJs()."</script>";	
	
	$xt->assignbyref("body",$pageObject->body);
	$xt->display($templatefile);
	exit();	
}
else if($mode==SEARCH_LOAD_CONTROL)
{	

	$searchControlBuilder = new PanelSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);
	$ctrlField = postvalue('ctrlField');	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $ctrlField, 0, '', false, true, '', '');	
	
	// build array for encode
	$resArr = array();
	$resArr['control1'] = trim($xt->call_func($ctrlBlockArr['searchcontrol']));
	$resArr['control2'] = trim($xt->call_func($ctrlBlockArr['searchcontrol1']));
	$resArr['comboHtml'] = trim($ctrlBlockArr['searchtype']);
	$resArr['delButt'] = trim($ctrlBlockArr['delCtrlButt']);
	$resArr['delButtId'] =  trim($searchControlBuilder->getDelButtonId($ctrlField, $id));
	$resArr['divInd'] = trim($id);	
	$resArr['fLabel'] = GetFieldLabel(GoodFieldName($strTableName),GoodFieldName($ctrlField));
	$resArr['ctrlMap'] = $pageObject->controlsMap['controls'];
	
	if (postvalue('isNeedSettings') == 'true')
	{
		$pageObject->fillSettings();
		$resArr['settings'] = $pageObject->jsSettings;
	}
		
	// return JSON
	echo my_json_encode($resArr);
	exit();
}
	

?>
