<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/campaigns_variables.php");

add_nocache_headers();

//	check if logged in
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

include('include/xtempl.php');
include('classes/runnerpage.php');
include("classes/searchclause.php");
$xt = new Xtempl();


$query = $gQuery->Copy();

$filename = "";	
$message = "";
$key = array();
$next = array();
$prev = array();
$all = postvalue("all");
$pdf = postvalue("pdf");
$mypage = 1;

//Show view page as popUp or not
$inlineview = (postvalue("onFly") ? true : false);

//If show view as popUp, get parent Id
if($inlineview)
	$parId = postvalue("parId");
else
	$parId = 0;

//Set page id	
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;

//$isNeedSettings = true;//($inlineview && postvalue("isNeedSettings") == 'true') || (!$inlineview);	
	
// assign an id			
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_VIEW, "id" =>$id, "tName"=>$strTableName);
$params["xt"] = &$xt;
//Get array of tabs for edit page
$params['useTabsOnView'] = useTabsOnView($strTableName);
if($params['useTabsOnView'])
	$params['arrViewTabs'] = GetViewTabs($strTableName);
$pageObject = new RunnerPage($params);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

// proccess big google maps

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadView", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

// add button events if exist
$pageObject->addButtonHandlers();

//For show detail tables on master page view
$dpParams = array();
if($pageObject->isShowDetailTables)
{
	$ids = $id;
	$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	$pageObject->AddJSFile("include/detailspreview");
}


//	Before Process event
if($eventObj->exists("BeforeProcessView"))
	$eventObj->BeforeProcessView($conn);

$strWhereClause = '';
$strHavingClause = '';
if(!$all)
{
//	show one record only
	$keys=array();
	$strWhereClause="";
	$keys["id"]=postvalue("editid1");
	$strWhereClause = KeyWhere($keys);
	$strSQL = gSQLWhere($strWhereClause);
}
else
{
	if ($_SESSION[$strTableName."_SelectedSQL"]!="" && @$_REQUEST["records"]=="") 
	{
		$strSQL = $_SESSION[$strTableName."_SelectedSQL"];
		$strWhereClause=@$_SESSION[$strTableName."_SelectedWhere"];
	}
	else
	{
		$strWhereClause=@$_SESSION[$strTableName."_where"];
		$strHavingClause=@$_SESSION[$strTableName."_having"];
		$strSQL=gSQLWhere($strWhereClause,$strHavingClause);
	}
//	order by
	$strOrderBy=$_SESSION[$strTableName."_order"];
	if(!$strOrderBy)
		$strOrderBy=$gstrOrderBy;
	$strSQL.=" ".trim($strOrderBy);
}

$strSQLbak = $strSQL;
if($eventObj->exists("BeforeQueryView"))
	$eventObj->BeforeQueryView($strSQL,$strWhereClause);
if($strSQLbak == $strSQL)
{
	$strSQL=gSQLWhere($strWhereClause,$strHavingClause);
	if($all)
	{
		$numrows=gSQLRowCount($strWhereClause,$strHavingClause);
		$strSQL.=" ".trim($strOrderBy);
	}
}
else
{
//	changed $strSQL - old style	
	if($all)
	{
		$numrows=GetRowCount($strSQL);
	}
}

if(!$all)
{
	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
}
else
{
//	 Pagination:
	$nPageSize=0;
	if(@$_REQUEST["records"]=="page" && $numrows)
	{
		$mypage=(integer)@$_SESSION[$strTableName."_pagenumber"];
		$nPageSize=(integer)@$_SESSION[$strTableName."_pagesize"];
		if($numrows<=($mypage-1)*$nPageSize)
			$mypage=ceil($numrows/$nPageSize);
		if(!$nPageSize)
			$nPageSize=$gPageSize;
		if(!$mypage)
			$mypage=1;
		$strSQL.=" limit ".(($mypage-1)*$nPageSize).",".$nPageSize;
	}
	$rs=db_query($strSQL,$conn);
}

$data=db_fetch_array($rs);

if($eventObj->exists("ProcessValuesView"))
	$eventObj->ProcessValuesView($data);

$out="";
$first=true;

$templatefile="";
$fieldsArr = array();
$arr = array();
$arr['fName'] = "pt";
$arr['viewFormat'] = ViewFormat("pt", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pd";
$arr['viewFormat'] = ViewFormat("pd", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pi";
$arr['viewFormat'] = ViewFormat("pi", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "coupon";
$arr['viewFormat'] = ViewFormat("coupon", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "terms";
$arr['viewFormat'] = ViewFormat("terms", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ti";
$arr['viewFormat'] = ViewFormat("ti", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cc";
$arr['viewFormat'] = ViewFormat("cc", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cn_prefix";
$arr['viewFormat'] = ViewFormat("cn_prefix", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cn_offset";
$arr['viewFormat'] = ViewFormat("cn_offset", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cr";
$arr['viewFormat'] = ViewFormat("cr", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "start_date";
$arr['viewFormat'] = ViewFormat("start_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "start_time";
$arr['viewFormat'] = ViewFormat("start_time", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "end_date";
$arr['viewFormat'] = ViewFormat("end_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "end_time";
$arr['viewFormat'] = ViewFormat("end_time", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "creation_date";
$arr['viewFormat'] = ViewFormat("creation_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "modified_date";
$arr['viewFormat'] = ViewFormat("modified_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "status";
$arr['viewFormat'] = ViewFormat("status", $strTableName);
$fieldsArr[] = $arr;

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//pt - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"pt", ""),"","",MODE_VIEW);
	$xt->assign("pt_value",$value);
	if(!$pageObject->isAppearOnTabs("pt"))
		$xt->assign("pt_fieldblock",true);
	else
		$xt->assign("pt_tabfieldblock",true);
////////////////////////////////////////////
//pd - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"pd", ""),"","",MODE_VIEW);
	$xt->assign("pd_value",$value);
	if(!$pageObject->isAppearOnTabs("pd"))
		$xt->assign("pd_fieldblock",true);
	else
		$xt->assign("pd_tabfieldblock",true);
////////////////////////////////////////////
//pi - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pi"])) 
	{
	 	// show thumbnail
		$thumbname="".$data["pi"];
		if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
			$thumbname=$data["pi"];
		$value="<a";
			$value .= " target=_blank";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pi",$data["pi"]))."\">";
		$value.="<img";
		if($thumbname==$data["pi"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pi"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pi",$thumbname))."\"></a>";
	}
	$xt->assign("pi_value",$value);
	if(!$pageObject->isAppearOnTabs("pi"))
		$xt->assign("pi_fieldblock",true);
	else
		$xt->assign("pi_tabfieldblock",true);
////////////////////////////////////////////
//coupon - File-based Image
	
	$value="";
	if(CheckImageExtension($data["coupon"])) 
	{
	 	// show thumbnail
		$thumbname="".$data["coupon"];
		if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
			$thumbname=$data["coupon"];
		$value="<a";
			$value .= " target=_blank";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("coupon",$data["coupon"]))."\">";
		$value.="<img";
		if($thumbname==$data["coupon"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["coupon"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("coupon",$thumbname))."\"></a>";
	}
	$xt->assign("coupon_value",$value);
	if(!$pageObject->isAppearOnTabs("coupon"))
		$xt->assign("coupon_fieldblock",true);
	else
		$xt->assign("coupon_tabfieldblock",true);
////////////////////////////////////////////
//terms - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"terms", ""),"","",MODE_VIEW);
	$xt->assign("terms_value",$value);
	if(!$pageObject->isAppearOnTabs("terms"))
		$xt->assign("terms_fieldblock",true);
	else
		$xt->assign("terms_tabfieldblock",true);
////////////////////////////////////////////
//ti - File-based Image
	
	$value="";
	if(CheckImageExtension($data["ti"])) 
	{
	 	// show thumbnail
		$thumbname="".$data["ti"];
		if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
			$thumbname=$data["ti"];
		$value="<a";
			$value .= " target=_blank";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("ti",$data["ti"]))."\">";
		$value.="<img";
		if($thumbname==$data["ti"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["ti"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("ti",$thumbname))."\"></a>";
	}
	$xt->assign("ti_value",$value);
	if(!$pageObject->isAppearOnTabs("ti"))
		$xt->assign("ti_fieldblock",true);
	else
		$xt->assign("ti_tabfieldblock",true);
////////////////////////////////////////////
//cc - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cc", ""),"","",MODE_VIEW);
	$xt->assign("cc_value",$value);
	if(!$pageObject->isAppearOnTabs("cc"))
		$xt->assign("cc_fieldblock",true);
	else
		$xt->assign("cc_tabfieldblock",true);
////////////////////////////////////////////
//cn_prefix - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cn_prefix", ""),"","",MODE_VIEW);
	$xt->assign("cn_prefix_value",$value);
	if(!$pageObject->isAppearOnTabs("cn_prefix"))
		$xt->assign("cn_prefix_fieldblock",true);
	else
		$xt->assign("cn_prefix_tabfieldblock",true);
////////////////////////////////////////////
//cn_offset - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cn_offset", ""),"","",MODE_VIEW);
	$xt->assign("cn_offset_value",$value);
	if(!$pageObject->isAppearOnTabs("cn_offset"))
		$xt->assign("cn_offset_fieldblock",true);
	else
		$xt->assign("cn_offset_tabfieldblock",true);
////////////////////////////////////////////
//cr - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cr", ""),"","",MODE_VIEW);
	$xt->assign("cr_value",$value);
	if(!$pageObject->isAppearOnTabs("cr"))
		$xt->assign("cr_fieldblock",true);
	else
		$xt->assign("cr_tabfieldblock",true);
////////////////////////////////////////////
//start_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"start_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("start_date_value",$value);
	if(!$pageObject->isAppearOnTabs("start_date"))
		$xt->assign("start_date_fieldblock",true);
	else
		$xt->assign("start_date_tabfieldblock",true);
////////////////////////////////////////////
//start_time - Time
	
	$value="";
	$value = ProcessLargeText(GetData($data,"start_time", "Time"),"","",MODE_VIEW);
	$xt->assign("start_time_value",$value);
	if(!$pageObject->isAppearOnTabs("start_time"))
		$xt->assign("start_time_fieldblock",true);
	else
		$xt->assign("start_time_tabfieldblock",true);
////////////////////////////////////////////
//end_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"end_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("end_date_value",$value);
	if(!$pageObject->isAppearOnTabs("end_date"))
		$xt->assign("end_date_fieldblock",true);
	else
		$xt->assign("end_date_tabfieldblock",true);
////////////////////////////////////////////
//end_time - Time
	
	$value="";
	$value = ProcessLargeText(GetData($data,"end_time", "Time"),"","",MODE_VIEW);
	$xt->assign("end_time_value",$value);
	if(!$pageObject->isAppearOnTabs("end_time"))
		$xt->assign("end_time_fieldblock",true);
	else
		$xt->assign("end_time_tabfieldblock",true);
////////////////////////////////////////////
//creation_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"creation_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("creation_date_value",$value);
	if(!$pageObject->isAppearOnTabs("creation_date"))
		$xt->assign("creation_date_fieldblock",true);
	else
		$xt->assign("creation_date_tabfieldblock",true);
////////////////////////////////////////////
//modified_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"modified_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("modified_date_value",$value);
	if(!$pageObject->isAppearOnTabs("modified_date"))
		$xt->assign("modified_date_fieldblock",true);
	else
		$xt->assign("modified_date_tabfieldblock",true);
////////////////////////////////////////////
//status - 
	
	$value="";
	$value=DisplayLookupWizard("status",$data["status"],$data,$keylink,MODE_VIEW);
	$xt->assign("status_value",$value);
	if(!$pageObject->isAppearOnTabs("status"))
		$xt->assign("status_fieldblock",true);
	else
		$xt->assign("status_tabfieldblock",true);

$jsKeysObj = 'window.recKeysObj = {';
	$jsKeysObj .= "'".jsreplace("id")."': '".(jsreplace(@$data["id"]))."', ";
$jsKeysObj = substr($jsKeysObj, 0, strlen($jsKeysObj)-2);
$jsKeysObj .= '};';
$pageObject->AddJsCode($jsKeysObj);	

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables)
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_VIEW;
	$options["mainMasterPageType"] = PAGE_VIEW;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;
	
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
	}
	
	$dControlsMap = array();
	
	$flyId = $ids+1;
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "campaigns";		
			continue;
		}
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $flyId++;
		$mkr=1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		$flyId = $listPageObject->recId+1;
		// show page
		if(!$pdf && $listPageObject->isDispGrid())
		{
			//add detail settings to master settings
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];				
			$dControlsMap[$strTableName]['video'] = $listPageObject->controlsHTMLMap[$strTableName][PAGE_LIST][$dpParams['ids'][$d]]['video'];
			$dControlsMap[$strTableName]['gMaps'] = $listPageObject->controlsHTMLMap[$strTableName][PAGE_LIST][$dpParams['ids'][$d]]['gMaps'];
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $keySet=>$val)
			{
				if(!array_key_exists($keySet,$pageObject->settingsMap["globalSettings"]['shortTNames']))
					$pageObject->settingsMap["globalSettings"]['shortTNames'][$keySet] = $val;
			}		
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files	
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
		}
		$xt->assign("displayDetailTable_".GoodFieldName($strTableName), array("func" => "showDetailTable","params" => array("dpObject" => $listPageObject, "dpParams" => $strTableName)));
	}	
	$strTableName = "campaigns";		
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin prepare for Next Prev button
if(!@$_SESSION[$strTableName."_noNextPrev"] && !$inlineview && !$pdf)
{
	$pageObject->getNextPrevRecordKeys($data,"Search",$next,$prev);
}	
//End prepare for Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}

$pageObject->addCommonJs();

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();
	
if(!$inlineview)
{
	$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/jquery.js\"></script>\r\n";
	$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
	if ($pageObject->debugJSMode === true)
	{			
		/*$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
			"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n".
			"<script type=\"text/javascript\" src=\"include/runnerJS/Observer.js\"></script>\r\n";*/
			$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";	
	}
	else
	{
		$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
	}
		$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $keys;
	$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
	$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
		
	$pageObject->body["end"].="<script>".$pageObject->PrepareJS()."</script>";	
	
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";		
	$pageObject->body['end']["object"] = &$pageObject;	
	
	$xt->assignbyref("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$xt->assign("footer","");
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
	
	$pageObject->fillSetCntrlMaps();
	
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}
$xt->assign("style_block",true);
$xt->assign("stylefiles_block",true);

if(!$pdf && !$all && !$inlineview)
{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin show Next Prev button
    $nextlink=$prevlink="";
	if(count($next))
    {
		$xt->assign("next_button",true);
	 		$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" onclick=\"window.location.href='campaigns_view.php?".$nextlink."'\"");
	}
	else 
		$xt->assign("next_button",false);	
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" onclick=\"window.location.href='campaigns_view.php?".$prevlink."'\"");
	}
    else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile=$templatefile;
$templatefile = "campaigns_view.htm";

if(!$all)
{
	if($eventObj->exists("BeforeShowView"))
		$eventObj->BeforeShowView($xt,$templatefile,$data);
	
	if(!$pdf)
	{
		if(!$inlineview)
			$xt->display($templatefile);
		else{
				$xt->load_template($templatefile);
				$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('flybody');
				if($pageObject->isShowDetailTables)
					$returnJSON['html'].= $xt->fetch_loaded('detail_tables');
				$returnJSON['idStartFrom'] = $id+1;
				echo (my_json_encode($returnJSON)); 
			}
	}	
	break;
}
}


?>
