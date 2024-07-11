<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/clients_variables.php");

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
$arr['fName'] = "email";
$arr['viewFormat'] = ViewFormat("email", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "logo";
$arr['viewFormat'] = ViewFormat("logo", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sn";
$arr['viewFormat'] = ViewFormat("sn", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cp";
$arr['viewFormat'] = ViewFormat("cp", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tn";
$arr['viewFormat'] = ViewFormat("tn", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "website";
$arr['viewFormat'] = ViewFormat("website", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "fb_page";
$arr['viewFormat'] = ViewFormat("fb_page", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "fb_page_id";
$arr['viewFormat'] = ViewFormat("fb_page_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "industry";
$arr['viewFormat'] = ViewFormat("industry", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "status";
$arr['viewFormat'] = ViewFormat("status", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "modified_date";
$arr['viewFormat'] = ViewFormat("modified_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "creation_date";
$arr['viewFormat'] = ViewFormat("creation_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "added_by";
$arr['viewFormat'] = ViewFormat("added_by", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "group";
$arr['viewFormat'] = ViewFormat("group", $strTableName);
$fieldsArr[] = $arr;

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//email - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"email", ""),"","",MODE_VIEW);
	$xt->assign("email_value",$value);
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
////////////////////////////////////////////
//logo - File-based Image
	
	$value="";
	if(CheckImageExtension($data["logo"])) 
	{
	 	// show thumbnail
		$thumbname="".$data["logo"];
		if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
			$thumbname=$data["logo"];
		$value="<a";
			$value .= " target=_blank";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("logo",$data["logo"]))."\">";
		$value.="<img";
		if($thumbname==$data["logo"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["logo"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("logo",$thumbname))."\"></a>";
	}
	$xt->assign("logo_value",$value);
	if(!$pageObject->isAppearOnTabs("logo"))
		$xt->assign("logo_fieldblock",true);
	else
		$xt->assign("logo_tabfieldblock",true);
////////////////////////////////////////////
//sn - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"sn", ""),"","",MODE_VIEW);
	$xt->assign("sn_value",$value);
	if(!$pageObject->isAppearOnTabs("sn"))
		$xt->assign("sn_fieldblock",true);
	else
		$xt->assign("sn_tabfieldblock",true);
////////////////////////////////////////////
//cp - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cp", ""),"","",MODE_VIEW);
	$xt->assign("cp_value",$value);
	if(!$pageObject->isAppearOnTabs("cp"))
		$xt->assign("cp_fieldblock",true);
	else
		$xt->assign("cp_tabfieldblock",true);
////////////////////////////////////////////
//tn - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"tn", ""),"","",MODE_VIEW);
	$xt->assign("tn_value",$value);
	if(!$pageObject->isAppearOnTabs("tn"))
		$xt->assign("tn_fieldblock",true);
	else
		$xt->assign("tn_tabfieldblock",true);
////////////////////////////////////////////
//website - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"website", ""),"","",MODE_VIEW);
	$xt->assign("website_value",$value);
	if(!$pageObject->isAppearOnTabs("website"))
		$xt->assign("website_fieldblock",true);
	else
		$xt->assign("website_tabfieldblock",true);
////////////////////////////////////////////
//fb_page - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"fb_page", ""),"","",MODE_VIEW);
	$xt->assign("fb_page_value",$value);
	if(!$pageObject->isAppearOnTabs("fb_page"))
		$xt->assign("fb_page_fieldblock",true);
	else
		$xt->assign("fb_page_tabfieldblock",true);
////////////////////////////////////////////
//fb_page_id - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"fb_page_id", ""),"","",MODE_VIEW);
	$xt->assign("fb_page_id_value",$value);
	if(!$pageObject->isAppearOnTabs("fb_page_id"))
		$xt->assign("fb_page_id_fieldblock",true);
	else
		$xt->assign("fb_page_id_tabfieldblock",true);
////////////////////////////////////////////
//industry - 
	
	$value="";
	$value=DisplayLookupWizard("industry",$data["industry"],$data,$keylink,MODE_VIEW);
	$xt->assign("industry_value",$value);
	if(!$pageObject->isAppearOnTabs("industry"))
		$xt->assign("industry_fieldblock",true);
	else
		$xt->assign("industry_tabfieldblock",true);
////////////////////////////////////////////
//status - 
	
	$value="";
	$value=DisplayLookupWizard("status",$data["status"],$data,$keylink,MODE_VIEW);
	$xt->assign("status_value",$value);
	if(!$pageObject->isAppearOnTabs("status"))
		$xt->assign("status_fieldblock",true);
	else
		$xt->assign("status_tabfieldblock",true);
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
//creation_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"creation_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("creation_date_value",$value);
	if(!$pageObject->isAppearOnTabs("creation_date"))
		$xt->assign("creation_date_fieldblock",true);
	else
		$xt->assign("creation_date_tabfieldblock",true);
////////////////////////////////////////////
//added_by - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"added_by", ""),"","",MODE_VIEW);
	$xt->assign("added_by_value",$value);
	if(!$pageObject->isAppearOnTabs("added_by"))
		$xt->assign("added_by_fieldblock",true);
	else
		$xt->assign("added_by_tabfieldblock",true);
////////////////////////////////////////////
//group - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"group", ""),"","",MODE_VIEW);
	$xt->assign("group_value",$value);
	if(!$pageObject->isAppearOnTabs("group"))
		$xt->assign("group_fieldblock",true);
	else
		$xt->assign("group_tabfieldblock",true);

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
			$strTableName = "clients";		
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
	$strTableName = "clients";		
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
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" onclick=\"window.location.href='clients_view.php?".$nextlink."'\"");
	}
	else 
		$xt->assign("next_button",false);	
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" onclick=\"window.location.href='clients_view.php?".$prevlink."'\"");
	}
    else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile=$templatefile;
$templatefile = "clients_view.htm";

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
