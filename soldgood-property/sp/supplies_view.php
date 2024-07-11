<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/supplies_variables.php");

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
if(!$pdf)
	$params["useIbox"] = true;
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
$arr['fName'] = "supply_mode_id";
$arr['viewFormat'] = ViewFormat("supply_mode_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "support_type_id";
$arr['viewFormat'] = ViewFormat("support_type_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "zone_id";
$arr['viewFormat'] = ViewFormat("zone_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "district_id";
$arr['viewFormat'] = ViewFormat("district_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "estate";
$arr['viewFormat'] = ViewFormat("estate", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "area";
$arr['viewFormat'] = ViewFormat("area", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "address";
$arr['viewFormat'] = ViewFormat("address", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "unit_price";
$arr['viewFormat'] = ViewFormat("unit_price", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "years";
$arr['viewFormat'] = ViewFormat("years", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ps_id";
$arr['viewFormat'] = ViewFormat("ps_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rc";
$arr['viewFormat'] = ViewFormat("rc", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hc";
$arr['viewFormat'] = ViewFormat("hc", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sf";
$arr['viewFormat'] = ViewFormat("sf", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "height_id";
$arr['viewFormat'] = ViewFormat("height_id", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "feature";
$arr['viewFormat'] = ViewFormat("feature", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "remark";
$arr['viewFormat'] = ViewFormat("remark", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "icon";
$arr['viewFormat'] = ViewFormat("icon", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic1";
$arr['viewFormat'] = ViewFormat("pic1", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic2";
$arr['viewFormat'] = ViewFormat("pic2", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic3";
$arr['viewFormat'] = ViewFormat("pic3", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic4";
$arr['viewFormat'] = ViewFormat("pic4", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic5";
$arr['viewFormat'] = ViewFormat("pic5", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic6";
$arr['viewFormat'] = ViewFormat("pic6", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic7";
$arr['viewFormat'] = ViewFormat("pic7", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pic8";
$arr['viewFormat'] = ViewFormat("pic8", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "creation_date";
$arr['viewFormat'] = ViewFormat("creation_date", $strTableName);
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "modified_date";
$arr['viewFormat'] = ViewFormat("modified_date", $strTableName);
$fieldsArr[] = $arr;

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//supply_mode_id - 
	
	$value="";
	$value=DisplayLookupWizard("supply_mode_id",$data["supply_mode_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("supply_mode_id_value",$value);
	if(!$pageObject->isAppearOnTabs("supply_mode_id"))
		$xt->assign("supply_mode_id_fieldblock",true);
	else
		$xt->assign("supply_mode_id_tabfieldblock",true);
////////////////////////////////////////////
//support_type_id - 
	
	$value="";
	$value=DisplayLookupWizard("support_type_id",$data["support_type_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("support_type_id_value",$value);
	if(!$pageObject->isAppearOnTabs("support_type_id"))
		$xt->assign("support_type_id_fieldblock",true);
	else
		$xt->assign("support_type_id_tabfieldblock",true);
////////////////////////////////////////////
//zone_id - 
	
	$value="";
	$value=DisplayLookupWizard("zone_id",$data["zone_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("zone_id_value",$value);
	if(!$pageObject->isAppearOnTabs("zone_id"))
		$xt->assign("zone_id_fieldblock",true);
	else
		$xt->assign("zone_id_tabfieldblock",true);
////////////////////////////////////////////
//district_id - 
	
	$value="";
	$value=DisplayLookupWizard("district_id",$data["district_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("district_id_value",$value);
	if(!$pageObject->isAppearOnTabs("district_id"))
		$xt->assign("district_id_fieldblock",true);
	else
		$xt->assign("district_id_tabfieldblock",true);
////////////////////////////////////////////
//estate - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"estate", ""),"","",MODE_VIEW);
	$xt->assign("estate_value",$value);
	if(!$pageObject->isAppearOnTabs("estate"))
		$xt->assign("estate_fieldblock",true);
	else
		$xt->assign("estate_tabfieldblock",true);
////////////////////////////////////////////
//area - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"area", ""),"","",MODE_VIEW);
	$xt->assign("area_value",$value);
	if(!$pageObject->isAppearOnTabs("area"))
		$xt->assign("area_fieldblock",true);
	else
		$xt->assign("area_tabfieldblock",true);
////////////////////////////////////////////
//address - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"address", ""),"","",MODE_VIEW);
	$xt->assign("address_value",$value);
	if(!$pageObject->isAppearOnTabs("address"))
		$xt->assign("address_fieldblock",true);
	else
		$xt->assign("address_tabfieldblock",true);
////////////////////////////////////////////
//unit_price - Number
	
	$value="";
	$value = ProcessLargeText(GetData($data,"unit_price", "Number"),"","",MODE_VIEW);
	$xt->assign("unit_price_value",$value);
	if(!$pageObject->isAppearOnTabs("unit_price"))
		$xt->assign("unit_price_fieldblock",true);
	else
		$xt->assign("unit_price_tabfieldblock",true);
////////////////////////////////////////////
//years - Number
	
	$value="";
	$value = ProcessLargeText(GetData($data,"years", "Number"),"","",MODE_VIEW);
	$xt->assign("years_value",$value);
	if(!$pageObject->isAppearOnTabs("years"))
		$xt->assign("years_fieldblock",true);
	else
		$xt->assign("years_tabfieldblock",true);
////////////////////////////////////////////
//ps_id - 
	
	$value="";
	$value=DisplayLookupWizard("ps_id",$data["ps_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("ps_id_value",$value);
	if(!$pageObject->isAppearOnTabs("ps_id"))
		$xt->assign("ps_id_fieldblock",true);
	else
		$xt->assign("ps_id_tabfieldblock",true);
////////////////////////////////////////////
//rc - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"rc", ""),"","",MODE_VIEW);
	$xt->assign("rc_value",$value);
	if(!$pageObject->isAppearOnTabs("rc"))
		$xt->assign("rc_fieldblock",true);
	else
		$xt->assign("rc_tabfieldblock",true);
////////////////////////////////////////////
//hc - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"hc", ""),"","",MODE_VIEW);
	$xt->assign("hc_value",$value);
	if(!$pageObject->isAppearOnTabs("hc"))
		$xt->assign("hc_fieldblock",true);
	else
		$xt->assign("hc_tabfieldblock",true);
////////////////////////////////////////////
//sf - Number
	
	$value="";
	$value = ProcessLargeText(GetData($data,"sf", "Number"),"","",MODE_VIEW);
	$xt->assign("sf_value",$value);
	if(!$pageObject->isAppearOnTabs("sf"))
		$xt->assign("sf_fieldblock",true);
	else
		$xt->assign("sf_tabfieldblock",true);
////////////////////////////////////////////
//height_id - 
	
	$value="";
	$value=DisplayLookupWizard("height_id",$data["height_id"],$data,$keylink,MODE_VIEW);
	$xt->assign("height_id_value",$value);
	if(!$pageObject->isAppearOnTabs("height_id"))
		$xt->assign("height_id_fieldblock",true);
	else
		$xt->assign("height_id_tabfieldblock",true);
////////////////////////////////////////////
//feature - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"feature", ""),"","",MODE_VIEW);
	$xt->assign("feature_value",$value);
	if(!$pageObject->isAppearOnTabs("feature"))
		$xt->assign("feature_fieldblock",true);
	else
		$xt->assign("feature_tabfieldblock",true);
////////////////////////////////////////////
//remark - 
	
	$value="";
	$value = ProcessLargeText(GetData($data,"remark", ""),"","",MODE_VIEW);
	$xt->assign("remark_value",$value);
	if(!$pageObject->isAppearOnTabs("remark"))
		$xt->assign("remark_fieldblock",true);
	else
		$xt->assign("remark_tabfieldblock",true);
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
//pic1 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic1"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic1"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic1"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic1",$data["pic1"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic1"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic1"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic1",$thumbname))."\"></a>";
	}
	$xt->assign("pic1_value",$value);
	if(!$pageObject->isAppearOnTabs("pic1"))
		$xt->assign("pic1_fieldblock",true);
	else
		$xt->assign("pic1_tabfieldblock",true);
////////////////////////////////////////////
//pic2 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic2"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic2"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic2"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic2",$data["pic2"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic2"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic2"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic2",$thumbname))."\"></a>";
	}
	$xt->assign("pic2_value",$value);
	if(!$pageObject->isAppearOnTabs("pic2"))
		$xt->assign("pic2_fieldblock",true);
	else
		$xt->assign("pic2_tabfieldblock",true);
////////////////////////////////////////////
//pic3 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic3"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic3"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic3"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic3",$data["pic3"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic3"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic3"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic3",$thumbname))."\"></a>";
	}
	$xt->assign("pic3_value",$value);
	if(!$pageObject->isAppearOnTabs("pic3"))
		$xt->assign("pic3_fieldblock",true);
	else
		$xt->assign("pic3_tabfieldblock",true);
////////////////////////////////////////////
//pic4 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic4"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic4"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic4"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic4",$data["pic4"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic4"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic4"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic4",$thumbname))."\"></a>";
	}
	$xt->assign("pic4_value",$value);
	if(!$pageObject->isAppearOnTabs("pic4"))
		$xt->assign("pic4_fieldblock",true);
	else
		$xt->assign("pic4_tabfieldblock",true);
////////////////////////////////////////////
//pic5 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic5"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic5"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic5"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic5",$data["pic5"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic5"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic5"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic5",$thumbname))."\"></a>";
	}
	$xt->assign("pic5_value",$value);
	if(!$pageObject->isAppearOnTabs("pic5"))
		$xt->assign("pic5_fieldblock",true);
	else
		$xt->assign("pic5_tabfieldblock",true);
////////////////////////////////////////////
//pic6 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic6"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic6"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic6"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic6",$data["pic6"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic6"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic6"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic6",$thumbname))."\"></a>";
	}
	$xt->assign("pic6_value",$value);
	if(!$pageObject->isAppearOnTabs("pic6"))
		$xt->assign("pic6_fieldblock",true);
	else
		$xt->assign("pic6_tabfieldblock",true);
////////////////////////////////////////////
//pic7 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic7"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic7"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic7"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic7",$data["pic7"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic7"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic7"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic7",$thumbname))."\"></a>";
	}
	$xt->assign("pic7_value",$value);
	if(!$pageObject->isAppearOnTabs("pic7"))
		$xt->assign("pic7_fieldblock",true);
	else
		$xt->assign("pic7_tabfieldblock",true);
////////////////////////////////////////////
//pic8 - File-based Image
	
	$value="";
	if(CheckImageExtension($data["pic8"])) 
	{
	 	// show thumbnail
		$thumbname="th".$data["pic8"];
		if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
			$thumbname=$data["pic8"];
		$value="<a";
			$value .= " rel='ibox'";
		$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic8",$data["pic8"]))."\">";
		$value.="<img";
		if($thumbname==$data["pic8"])
		{
								}
		$value.=" border=0";
		if(isEnableSection508())
			$value.= " alt=\"".htmlspecialchars($data["pic8"])."\"";
		$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic8",$thumbname))."\"></a>";
	}
	$xt->assign("pic8_value",$value);
	if(!$pageObject->isAppearOnTabs("pic8"))
		$xt->assign("pic8_fieldblock",true);
	else
		$xt->assign("pic8_tabfieldblock",true);
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
			$strTableName = "supplies";		
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
	$strTableName = "supplies";		
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
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" onclick=\"window.location.href='supplies_view.php?".$nextlink."'\"");
	}
	else 
		$xt->assign("next_button",false);	
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" onclick=\"window.location.href='supplies_view.php?".$prevlink."'\"");
	}
    else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile=$templatefile;
$templatefile = "supplies_view.htm";

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
