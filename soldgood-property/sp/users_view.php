<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/users_variables.php");

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
	$strWhereClause = whereAdd($strWhereClause,SecuritySQL("Search"));
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
		if($strWhereClause=="")
			$strWhereClause = whereAdd($strWhereClause,SecuritySQL("Search"));
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
$arr['fName'] = "id";
$arr['viewFormat'] = ViewFormat("id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "name";
$arr['viewFormat'] = ViewFormat("name", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cn";
$arr['viewFormat'] = ViewFormat("cn", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "email";
$arr['viewFormat'] = ViewFormat("email", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "icon";
$arr['viewFormat'] = ViewFormat("icon", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "identity_id";
$arr['viewFormat'] = ViewFormat("identity_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "creation_date";
$arr['viewFormat'] = ViewFormat("creation_date", $strTableName);
$fieldsArr[] = $arr;

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//id - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"id", ""),"","",MODE_VIEW);
	$xt->assign("id_value",$value);
	if(!$pageObject->isAppearOnTabs("id"))
		$xt->assign("id_fieldblock",true);
	else
		$xt->assign("id_tabfieldblock",true);
////////////////////////////////////////////
//name - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"name", ""),"","",MODE_VIEW);
	$xt->assign("name_value",$value);
	if(!$pageObject->isAppearOnTabs("name"))
		$xt->assign("name_fieldblock",true);
	else
		$xt->assign("name_tabfieldblock",true);
////////////////////////////////////////////
//cn - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"cn", ""),"","",MODE_VIEW);
	$xt->assign("cn_value",$value);
	if(!$pageObject->isAppearOnTabs("cn"))
		$xt->assign("cn_fieldblock",true);
	else
		$xt->assign("cn_tabfieldblock",true);
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
//icon - File-based Image
	
	$value="";
	if(CheckImageExtension($data["icon"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["icon"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["icon"];
		$value="<a";
			$value .= " target=_blank";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("icon",$data["icon"]))."\">";
		$value.="<img";
		if($thumbname==$data["icon"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["icon"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("icon",$thumbname))."\"></a>";
	}
	$xt->assign("icon_value",$value);
	if(!$pageObject->isAppearOnTabs("icon"))
		$xt->assign("icon_fieldblock",true);
	else
		$xt->assign("icon_tabfieldblock",true);
////////////////////////////////////////////
//identity_id - 
	
	$value="";
	$value=DisplayLookupWizard("identity_id",$data["identity_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("identity_id_value",$value);
	if(!$pageObject->isAppearOnTabs("identity_id"))
		$xt->assign("identity_id_fieldblock",true);
	else
		$xt->assign("identity_id_tabfieldblock",true);
////////////////////////////////////////////
//creation_date - Short Date
	
	$value="";
	$value = ProcessLargeText(GetData($data,"creation_date", "Short Date"),"","",MODE_VIEW);
	$xt->assign("creation_date_value",$value);
	if(!$pageObject->isAppearOnTabs("creation_date"))
		$xt->assign("creation_date_fieldblock",true);
	else
		$xt->assign("creation_date_tabfieldblock",true);

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
			$strTableName = "users";		
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
	$strTableName = "users";		
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
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" onclick=\"window.location.href='users_view.php?".$nextlink."'\"");
	}
	else 
		$xt->assign("next_button",false);	
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" onclick=\"window.location.href='users_view.php?".$prevlink."'\"");
	}
    else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile=$templatefile;
$templatefile = "users_view.htm";

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
