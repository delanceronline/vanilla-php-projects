<?php
$tdatasupplies=array();
	$tdatasupplies[".NumberOfChars"]=80; 
	$tdatasupplies[".ShortName"]="supplies";
	$tdatasupplies[".OwnerID"]="user_id";
	$tdatasupplies[".OriginalTable"]="supplies";


	
//	field labels
$fieldLabelssupplies = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelssupplies["English"]=array();
	$fieldToolTipssupplies["English"]=array();
	$fieldLabelssupplies["English"]["id"] = "Property ID";
	$fieldToolTipssupplies["English"]["id"] = "";
	$fieldLabelssupplies["English"]["estate"] = "Estate Name";
	$fieldToolTipssupplies["English"]["estate"] = "";
	$fieldLabelssupplies["English"]["district_id"] = "District";
	$fieldToolTipssupplies["English"]["district_id"] = "";
	$fieldLabelssupplies["English"]["area"] = "Area(sqr feets)";
	$fieldToolTipssupplies["English"]["area"] = "";
	$fieldLabelssupplies["English"]["address"] = "Address";
	$fieldToolTipssupplies["English"]["address"] = "";
	$fieldLabelssupplies["English"]["unit_price"] = "Selling / Renting Price(HKD)";
	$fieldToolTipssupplies["English"]["unit_price"] = "";
	$fieldLabelssupplies["English"]["years"] = "Years";
	$fieldToolTipssupplies["English"]["years"] = "";
	$fieldLabelssupplies["English"]["rc"] = "Number of Room(s)";
	$fieldToolTipssupplies["English"]["rc"] = "";
	$fieldLabelssupplies["English"]["hc"] = "Numer of Hall(s)";
	$fieldToolTipssupplies["English"]["hc"] = "";
	$fieldLabelssupplies["English"]["sf"] = "Management / Security Fee(per inch)";
	$fieldToolTipssupplies["English"]["sf"] = "";
	$fieldLabelssupplies["English"]["height_id"] = "Height";
	$fieldToolTipssupplies["English"]["height_id"] = "";
	$fieldLabelssupplies["English"]["feature"] = "Property's Feature";
	$fieldToolTipssupplies["English"]["feature"] = "";
	$fieldLabelssupplies["English"]["remark"] = "Remark";
	$fieldToolTipssupplies["English"]["remark"] = "";
	$fieldLabelssupplies["English"]["icon"] = "Icon";
	$fieldToolTipssupplies["English"]["icon"] = "";
	$fieldLabelssupplies["English"]["pic1"] = "Image 1";
	$fieldToolTipssupplies["English"]["pic1"] = "";
	$fieldLabelssupplies["English"]["pic2"] = "Image 2";
	$fieldToolTipssupplies["English"]["pic2"] = "";
	$fieldLabelssupplies["English"]["pic3"] = "Image 3";
	$fieldToolTipssupplies["English"]["pic3"] = "";
	$fieldLabelssupplies["English"]["pic4"] = "Image 4";
	$fieldToolTipssupplies["English"]["pic4"] = "";
	$fieldLabelssupplies["English"]["pic5"] = "Image 5";
	$fieldToolTipssupplies["English"]["pic5"] = "";
	$fieldLabelssupplies["English"]["pic6"] = "Image 6";
	$fieldToolTipssupplies["English"]["pic6"] = "";
	$fieldLabelssupplies["English"]["pic7"] = "Image 7";
	$fieldToolTipssupplies["English"]["pic7"] = "";
	$fieldLabelssupplies["English"]["pic8"] = "Image 8";
	$fieldToolTipssupplies["English"]["pic8"] = "";
	$fieldLabelssupplies["English"]["user_id"] = "User ID";
	$fieldToolTipssupplies["English"]["user_id"] = "";
	$fieldLabelssupplies["English"]["creation_date"] = "Post Date";
	$fieldToolTipssupplies["English"]["creation_date"] = "";
	$fieldLabelssupplies["English"]["modified_date"] = "Modified Date";
	$fieldToolTipssupplies["English"]["modified_date"] = "";
	$fieldLabelssupplies["English"]["zone_id"] = "Zone";
	$fieldToolTipssupplies["English"]["zone_id"] = "";
	$fieldLabelssupplies["English"]["supply_mode_id"] = "Mode";
	$fieldToolTipssupplies["English"]["supply_mode_id"] = "";
	$fieldLabelssupplies["English"]["support_type_id"] = "Property Type";
	$fieldToolTipssupplies["English"]["support_type_id"] = "";
	$fieldLabelssupplies["English"]["ps_id"] = "Status";
	$fieldToolTipssupplies["English"]["ps_id"] = "";
	if (count($fieldToolTipssupplies["English"])){
		$tdatasupplies[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["id"] = "放盤編號";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["estate"] = "屋苑名稱";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["estate"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["district_id"] = "地區";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["district_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["area"] = "面積(尺)";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["area"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["address"] = "地址";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["address"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["unit_price"] = "租金 / 樓價(港幣)";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["unit_price"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["years"] = "樓年";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["years"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["rc"] = "房間數目";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["rc"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["hc"] = "客廳數目";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["hc"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["sf"] = "管理費(每尺)";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["sf"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["height_id"] = "樓層";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["height_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["feature"] = "物業特色";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["feature"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["remark"] = "備註";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["remark"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["icon"] = "細示圖";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["icon"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic1"] = "圖片1";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic1"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic2"] = "圖片2";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic2"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic3"] = "圖片3";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic3"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic4"] = "圖片4";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic4"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic5"] = "圖片5";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic5"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic6"] = "圖片6";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic6"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic7"] = "圖片7";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic7"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["pic8"] = "圖片8";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["pic8"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["user_id"] = "會員編號";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["user_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "加入日期";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["modified_date"] = "更新日期";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["modified_date"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["zone_id"] = "地域";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["zone_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["supply_mode_id"] = "放盤形式";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["supply_mode_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["support_type_id"] = "物業類型";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["support_type_id"] = "";
	$fieldLabelssupplies["Chinese (Hong Kong S.A.R.)"]["ps_id"] = "狀況";
	$fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"]["ps_id"] = "";
	if (count($fieldToolTipssupplies["Chinese (Hong Kong S.A.R.)"])){
		$tdatasupplies[".isUseToolTips"]=true;
	}
}


	
	$tdatasupplies[".NCSearch"]=true;

	

$tdatasupplies[".shortTableName"] = "supplies";
$tdatasupplies[".nSecOptions"] = 1;
$tdatasupplies[".recsPerRowList"] = 1;	
$tdatasupplies[".tableGroupBy"] = "0";
$tdatasupplies[".mainTableOwnerID"] = "user_id";
$tdatasupplies[".moveNext"] = 1;




$tdatasupplies[".showAddInPopup"] = false;

$tdatasupplies[".showEditInPopup"] = false;

$tdatasupplies[".showViewInPopup"] = false;


$tdatasupplies[".fieldsForRegister"] = array();
	
$tdatasupplies[".listAjax"] = false;

	$tdatasupplies[".audit"] = false;

	$tdatasupplies[".locking"] = false;
	
$tdatasupplies[".listIcons"] = true;
$tdatasupplies[".edit"] = true;
$tdatasupplies[".view"] = true;



$tdatasupplies[".delete"] = true;

$tdatasupplies[".showSimpleSearchOptions"] = false;

$tdatasupplies[".showSearchPanel"] = true;


$tdatasupplies[".isUseAjaxSuggest"] = true;

$tdatasupplies[".rowHighlite"] = true;


// button handlers file names

$tdatasupplies[".addPageEvents"] = false;

$tdatasupplies[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatasupplies[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatasupplies[".isUseTimeForSearch"] = false;

$tdatasupplies[".isUseiBox"] = true;

$tdatasupplies[".useIbox"] = true;



$tdatasupplies[".isUseInlineJs"] = $tdatasupplies[".isUseInlineAdd"] || $tdatasupplies[".isUseInlineEdit"];

$tdatasupplies[".allSearchFields"] = array();

$tdatasupplies[".globSearchFields"][] = "ps_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ps_id", $tdatasupplies[".allSearchFields"]))
{
	$tdatasupplies[".allSearchFields"][] = "ps_id";	
}
$tdatasupplies[".globSearchFields"][] = "zone_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("zone_id", $tdatasupplies[".allSearchFields"]))
{
	$tdatasupplies[".allSearchFields"][] = "zone_id";	
}
$tdatasupplies[".globSearchFields"][] = "supply_mode_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("supply_mode_id", $tdatasupplies[".allSearchFields"]))
{
	$tdatasupplies[".allSearchFields"][] = "supply_mode_id";	
}
$tdatasupplies[".globSearchFields"][] = "support_type_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("support_type_id", $tdatasupplies[".allSearchFields"]))
{
	$tdatasupplies[".allSearchFields"][] = "support_type_id";	
}


$tdatasupplies[".googleLikeFields"][] = "id";
$tdatasupplies[".googleLikeFields"][] = "estate";
$tdatasupplies[".googleLikeFields"][] = "creation_date";
$tdatasupplies[".googleLikeFields"][] = "district_id";
$tdatasupplies[".googleLikeFields"][] = "user_id";
$tdatasupplies[".googleLikeFields"][] = "pic8";
$tdatasupplies[".googleLikeFields"][] = "area";
$tdatasupplies[".googleLikeFields"][] = "address";
$tdatasupplies[".googleLikeFields"][] = "unit_price";
$tdatasupplies[".googleLikeFields"][] = "years";
$tdatasupplies[".googleLikeFields"][] = "rc";
$tdatasupplies[".googleLikeFields"][] = "hc";
$tdatasupplies[".googleLikeFields"][] = "sf";
$tdatasupplies[".googleLikeFields"][] = "height_id";
$tdatasupplies[".googleLikeFields"][] = "modified_date";
$tdatasupplies[".googleLikeFields"][] = "feature";
$tdatasupplies[".googleLikeFields"][] = "remark";
$tdatasupplies[".googleLikeFields"][] = "icon";
$tdatasupplies[".googleLikeFields"][] = "pic1";
$tdatasupplies[".googleLikeFields"][] = "pic2";
$tdatasupplies[".googleLikeFields"][] = "pic3";
$tdatasupplies[".googleLikeFields"][] = "pic4";
$tdatasupplies[".googleLikeFields"][] = "pic5";
$tdatasupplies[".googleLikeFields"][] = "pic6";
$tdatasupplies[".googleLikeFields"][] = "pic7";
$tdatasupplies[".googleLikeFields"][] = "ps_id";
$tdatasupplies[".googleLikeFields"][] = "zone_id";
$tdatasupplies[".googleLikeFields"][] = "supply_mode_id";
$tdatasupplies[".googleLikeFields"][] = "support_type_id";



$tdatasupplies[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "id";	
}
$tdatasupplies[".advSearchFields"][] = "estate";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("estate", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "estate";	
}
$tdatasupplies[".advSearchFields"][] = "creation_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("creation_date", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "creation_date";	
}
$tdatasupplies[".advSearchFields"][] = "district_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("district_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "district_id";	
}
$tdatasupplies[".advSearchFields"][] = "user_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("user_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "user_id";	
}
$tdatasupplies[".advSearchFields"][] = "pic8";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic8", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic8";	
}
$tdatasupplies[".advSearchFields"][] = "area";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("area", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "area";	
}
$tdatasupplies[".advSearchFields"][] = "address";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("address", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "address";	
}
$tdatasupplies[".advSearchFields"][] = "unit_price";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("unit_price", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "unit_price";	
}
$tdatasupplies[".advSearchFields"][] = "years";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("years", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "years";	
}
$tdatasupplies[".advSearchFields"][] = "rc";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("rc", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "rc";	
}
$tdatasupplies[".advSearchFields"][] = "hc";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hc", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "hc";	
}
$tdatasupplies[".advSearchFields"][] = "sf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("sf", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "sf";	
}
$tdatasupplies[".advSearchFields"][] = "height_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("height_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "height_id";	
}
$tdatasupplies[".advSearchFields"][] = "modified_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("modified_date", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "modified_date";	
}
$tdatasupplies[".advSearchFields"][] = "feature";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("feature", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "feature";	
}
$tdatasupplies[".advSearchFields"][] = "remark";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("remark", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "remark";	
}
$tdatasupplies[".advSearchFields"][] = "icon";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("icon", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "icon";	
}
$tdatasupplies[".advSearchFields"][] = "pic1";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic1", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic1";	
}
$tdatasupplies[".advSearchFields"][] = "pic2";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic2", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic2";	
}
$tdatasupplies[".advSearchFields"][] = "pic3";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic3", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic3";	
}
$tdatasupplies[".advSearchFields"][] = "pic4";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic4", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic4";	
}
$tdatasupplies[".advSearchFields"][] = "pic5";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic5", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic5";	
}
$tdatasupplies[".advSearchFields"][] = "pic6";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic6", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic6";	
}
$tdatasupplies[".advSearchFields"][] = "pic7";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pic7", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "pic7";	
}
$tdatasupplies[".advSearchFields"][] = "ps_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ps_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "ps_id";	
}
$tdatasupplies[".advSearchFields"][] = "zone_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("zone_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "zone_id";	
}
$tdatasupplies[".advSearchFields"][] = "supply_mode_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("supply_mode_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "supply_mode_id";	
}
$tdatasupplies[".advSearchFields"][] = "support_type_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("support_type_id", $tdatasupplies[".allSearchFields"])) 
{
	$tdatasupplies[".allSearchFields"][] = "support_type_id";	
}

$tdatasupplies[".isTableType"] = "list";


	

$tdatasupplies[".isDisplayLoading"] = true;

$tdatasupplies[".isResizeColumns"] = false;





$tdatasupplies[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasupplies[".strOrderBy"] = $gstrOrderBy;
	
$tdatasupplies[".orderindexes"] = array();

$tdatasupplies[".sqlHead"] = "SELECT id,   estate,   zone_id,   district_id,   supply_mode_id,   support_type_id,   area,   address,   unit_price,   years,   rc,   hc,   sf,   height_id,   ps_id,   feature,   remark,   icon,   pic1,   pic2,   pic3,   pic4,   pic5,   pic6,   pic7,   pic8,   user_id,   creation_date,   modified_date";
$tdatasupplies[".sqlFrom"] = "FROM supplies";
$tdatasupplies[".sqlWhereExpr"] = "";
$tdatasupplies[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatasupplies[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatasupplies[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatasupplies[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="放盤編號"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		$fdata["AutoInc"]=true;
	
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
	
		$fdata["FullName"]= "id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 1;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				
		
				
		
		
		
			$tdatasupplies["id"]=$fdata;
//	estate
	$fdata = array();
	$fdata["strName"] = "estate";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="屋苑名稱"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "estate";
	
		$fdata["FullName"]= "estate";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 2;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=128";
		
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["estate"]=$fdata;
//	zone_id
	$fdata = array();
	$fdata["strName"] = "zone_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="地域"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="zones";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
				//	dependent dropdowns	
	$fdata["DependentLookups"]=array();
	$fdata["DependentLookups"][]="district_id";
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "zone_id";
	
		$fdata["FullName"]= "zone_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 3;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["zone_id"]=$fdata;
//	district_id
	$fdata = array();
	$fdata["strName"] = "district_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="地區"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="districts";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
				$fdata["UseCategory"]=true; 
	$fdata["CategoryControl"]="zone_id"; 
	$fdata["CategoryFilter"]="zone_id"; 
										
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "district_id";
	
		$fdata["FullName"]= "district_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 4;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["district_id"]=$fdata;
//	supply_mode_id
	$fdata = array();
	$fdata["strName"] = "supply_mode_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="放盤形式"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="supply_modes";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "supply_mode_id";
	
		$fdata["FullName"]= "supply_mode_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 5;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["supply_mode_id"]=$fdata;
//	support_type_id
	$fdata = array();
	$fdata["strName"] = "support_type_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="物業類型"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="supply_types";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "support_type_id";
	
		$fdata["FullName"]= "support_type_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 6;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["support_type_id"]=$fdata;
//	area
	$fdata = array();
	$fdata["strName"] = "area";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="面積(尺)"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "area";
	
		$fdata["FullName"]= "area";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 7;
				$fdata["EditParams"]="";
			
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["area"]=$fdata;
//	address
	$fdata = array();
	$fdata["strName"] = "address";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="地址"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "address";
	
		$fdata["FullName"]= "address";
	
		
		
		
		
		
				$fdata["Index"]= 8;
			$fdata["EditParams"] = "";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=200";
		$fdata["nCols"] = 200;
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["address"]=$fdata;
//	unit_price
	$fdata = array();
	$fdata["strName"] = "unit_price";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="租金 / 樓價(港幣)"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
		
		
		
		$fdata["DecimalDigits"] = 2;
	
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "unit_price";
	
		$fdata["FullName"]= "unit_price";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 9;
				$fdata["EditParams"]="";
			
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Currency");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["unit_price"]=$fdata;
//	years
	$fdata = array();
	$fdata["strName"] = "years";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="樓年"; 
	
		
		
	$fdata["FieldType"]= 5;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
		
		
		
		$fdata["DecimalDigits"] = 2;
	
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "years";
	
		$fdata["FullName"]= "years";
	
		
		
		
		
		
				$fdata["Index"]= 10;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["years"]=$fdata;
//	rc
	$fdata = array();
	$fdata["strName"] = "rc";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="房間數目"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=0;
	$fdata["pLookupType"] = 0;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
									$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
	$fdata["LookupValues"][]="10";
			
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "rc";
	
		$fdata["FullName"]= "rc";
	
		
		
		
		
		
				$fdata["Index"]= 11;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["rc"]=$fdata;
//	hc
	$fdata = array();
	$fdata["strName"] = "hc";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="客廳數目"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=0;
	$fdata["pLookupType"] = 0;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
									$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
			
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hc";
	
		$fdata["FullName"]= "hc";
	
		
		
		
		
		
				$fdata["Index"]= 12;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["hc"]=$fdata;
//	sf
	$fdata = array();
	$fdata["strName"] = "sf";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="管理費(每尺)"; 
	
		
		
	$fdata["FieldType"]= 5;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
		
		
		
		$fdata["DecimalDigits"] = 2;
	
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "sf";
	
		$fdata["FullName"]= "sf";
	
		
		
		
		
		
				$fdata["Index"]= 13;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["sf"]=$fdata;
//	height_id
	$fdata = array();
	$fdata["strName"] = "height_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="樓層"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="heights";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "height_id";
	
		$fdata["FullName"]= "height_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 14;
				
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["height_id"]=$fdata;
//	ps_id
	$fdata = array();
	$fdata["strName"] = "ps_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="狀況"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="property_states";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ps_id";
	
		$fdata["FullName"]= "ps_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 15;
				
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["ps_id"]=$fdata;
//	feature
	$fdata = array();
	$fdata["strName"] = "feature";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="物業特色"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "feature";
	
		$fdata["FullName"]= "feature";
	
		
		
		
		
		
				$fdata["Index"]= 16;
			$fdata["EditParams"] = "";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=200";
		$fdata["nCols"] = 200;
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["feature"]=$fdata;
//	remark
	$fdata = array();
	$fdata["strName"] = "remark";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="備註"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "remark";
	
		$fdata["FullName"]= "remark";
	
		
		
		
		
		
				$fdata["Index"]= 17;
			$fdata["EditParams"] = "";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=200";
		$fdata["nCols"] = 200;
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["remark"]=$fdata;
//	icon
	$fdata = array();
	$fdata["strName"] = "icon";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="細示圖"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "icon";
	
		$fdata["FullName"]= "icon";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 18;
				
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["icon"]=$fdata;
//	pic1
	$fdata = array();
	$fdata["strName"] = "pic1";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片1"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic1";
	
		$fdata["FullName"]= "pic1";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 19;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic1"]=$fdata;
//	pic2
	$fdata = array();
	$fdata["strName"] = "pic2";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片2"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic2";
	
		$fdata["FullName"]= "pic2";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 20;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic2"]=$fdata;
//	pic3
	$fdata = array();
	$fdata["strName"] = "pic3";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片3"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic3";
	
		$fdata["FullName"]= "pic3";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 21;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic3"]=$fdata;
//	pic4
	$fdata = array();
	$fdata["strName"] = "pic4";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片4"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic4";
	
		$fdata["FullName"]= "pic4";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 22;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic4"]=$fdata;
//	pic5
	$fdata = array();
	$fdata["strName"] = "pic5";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片5"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic5";
	
		$fdata["FullName"]= "pic5";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 23;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic5"]=$fdata;
//	pic6
	$fdata = array();
	$fdata["strName"] = "pic6";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片6"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic6";
	
		$fdata["FullName"]= "pic6";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 24;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic6"]=$fdata;
//	pic7
	$fdata = array();
	$fdata["strName"] = "pic7";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片7"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic7";
	
		$fdata["FullName"]= "pic7";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 25;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic7"]=$fdata;
//	pic8
	$fdata = array();
	$fdata["strName"] = "pic8";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="圖片8"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = true;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pic8";
	
		$fdata["FullName"]= "pic8";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 26;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatasupplies["pic8"]=$fdata;
//	user_id
	$fdata = array();
	$fdata["strName"] = "user_id";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="會員編號"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "user_id";
	
		$fdata["FullName"]= "user_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 27;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				
		
				
		
		
		
			$tdatasupplies["user_id"]=$fdata;
//	creation_date
	$fdata = array();
	$fdata["strName"] = "creation_date";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="加入日期"; 
	
		
		
	$fdata["FieldType"]= 135;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "creation_date";
	
		$fdata["FullName"]= "creation_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 28;
		$fdata["DateEditType"] = 13; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
		
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["creation_date"]=$fdata;
//	modified_date
	$fdata = array();
	$fdata["strName"] = "modified_date";
	$fdata["ownerTable"] = "supplies";
		$fdata["Label"]="更新日期"; 
	
		
		
	$fdata["FieldType"]= 135;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "modified_date";
	
		$fdata["FullName"]= "modified_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 29;
		$fdata["DateEditType"] = 13; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
		$fdata["bListPage"]=true; 
	
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatasupplies["modified_date"]=$fdata;

	
$tables_data["supplies"]=&$tdatasupplies;
$field_labels["supplies"] = &$fieldLabelssupplies;
$fieldToolTips["supplies"] = &$fieldToolTipssupplies;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["supplies"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["supplies"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto117=array();
$proto117["m_strHead"] = "SELECT";
$proto117["m_strFieldList"] = "id,   estate,   zone_id,   district_id,   supply_mode_id,   support_type_id,   area,   address,   unit_price,   years,   rc,   hc,   sf,   height_id,   ps_id,   feature,   remark,   icon,   pic1,   pic2,   pic3,   pic4,   pic5,   pic6,   pic7,   pic8,   user_id,   creation_date,   modified_date";
$proto117["m_strFrom"] = "FROM supplies";
$proto117["m_strWhere"] = "";
$proto117["m_strOrderBy"] = "";
$proto117["m_strTail"] = "";
$proto118=array();
$proto118["m_sql"] = "";
$proto118["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto118["m_column"]=$obj;
$proto118["m_contained"] = array();
$proto118["m_strCase"] = "";
$proto118["m_havingmode"] = "0";
$proto118["m_inBrackets"] = "0";
$proto118["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto118);

$proto117["m_where"] = $obj;
$proto120=array();
$proto120["m_sql"] = "";
$proto120["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto120["m_column"]=$obj;
$proto120["m_contained"] = array();
$proto120["m_strCase"] = "";
$proto120["m_havingmode"] = "0";
$proto120["m_inBrackets"] = "0";
$proto120["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto120);

$proto117["m_having"] = $obj;
$proto117["m_fieldlist"] = array();
						$proto122=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "supplies"
));

$proto122["m_expr"]=$obj;
$proto122["m_alias"] = "";
$obj = new SQLFieldListItem($proto122);

$proto117["m_fieldlist"][]=$obj;
						$proto124=array();
			$obj = new SQLField(array(
	"m_strName" => "estate",
	"m_strTable" => "supplies"
));

$proto124["m_expr"]=$obj;
$proto124["m_alias"] = "";
$obj = new SQLFieldListItem($proto124);

$proto117["m_fieldlist"][]=$obj;
						$proto126=array();
			$obj = new SQLField(array(
	"m_strName" => "zone_id",
	"m_strTable" => "supplies"
));

$proto126["m_expr"]=$obj;
$proto126["m_alias"] = "";
$obj = new SQLFieldListItem($proto126);

$proto117["m_fieldlist"][]=$obj;
						$proto128=array();
			$obj = new SQLField(array(
	"m_strName" => "district_id",
	"m_strTable" => "supplies"
));

$proto128["m_expr"]=$obj;
$proto128["m_alias"] = "";
$obj = new SQLFieldListItem($proto128);

$proto117["m_fieldlist"][]=$obj;
						$proto130=array();
			$obj = new SQLField(array(
	"m_strName" => "supply_mode_id",
	"m_strTable" => "supplies"
));

$proto130["m_expr"]=$obj;
$proto130["m_alias"] = "";
$obj = new SQLFieldListItem($proto130);

$proto117["m_fieldlist"][]=$obj;
						$proto132=array();
			$obj = new SQLField(array(
	"m_strName" => "support_type_id",
	"m_strTable" => "supplies"
));

$proto132["m_expr"]=$obj;
$proto132["m_alias"] = "";
$obj = new SQLFieldListItem($proto132);

$proto117["m_fieldlist"][]=$obj;
						$proto134=array();
			$obj = new SQLField(array(
	"m_strName" => "area",
	"m_strTable" => "supplies"
));

$proto134["m_expr"]=$obj;
$proto134["m_alias"] = "";
$obj = new SQLFieldListItem($proto134);

$proto117["m_fieldlist"][]=$obj;
						$proto136=array();
			$obj = new SQLField(array(
	"m_strName" => "address",
	"m_strTable" => "supplies"
));

$proto136["m_expr"]=$obj;
$proto136["m_alias"] = "";
$obj = new SQLFieldListItem($proto136);

$proto117["m_fieldlist"][]=$obj;
						$proto138=array();
			$obj = new SQLField(array(
	"m_strName" => "unit_price",
	"m_strTable" => "supplies"
));

$proto138["m_expr"]=$obj;
$proto138["m_alias"] = "";
$obj = new SQLFieldListItem($proto138);

$proto117["m_fieldlist"][]=$obj;
						$proto140=array();
			$obj = new SQLField(array(
	"m_strName" => "years",
	"m_strTable" => "supplies"
));

$proto140["m_expr"]=$obj;
$proto140["m_alias"] = "";
$obj = new SQLFieldListItem($proto140);

$proto117["m_fieldlist"][]=$obj;
						$proto142=array();
			$obj = new SQLField(array(
	"m_strName" => "rc",
	"m_strTable" => "supplies"
));

$proto142["m_expr"]=$obj;
$proto142["m_alias"] = "";
$obj = new SQLFieldListItem($proto142);

$proto117["m_fieldlist"][]=$obj;
						$proto144=array();
			$obj = new SQLField(array(
	"m_strName" => "hc",
	"m_strTable" => "supplies"
));

$proto144["m_expr"]=$obj;
$proto144["m_alias"] = "";
$obj = new SQLFieldListItem($proto144);

$proto117["m_fieldlist"][]=$obj;
						$proto146=array();
			$obj = new SQLField(array(
	"m_strName" => "sf",
	"m_strTable" => "supplies"
));

$proto146["m_expr"]=$obj;
$proto146["m_alias"] = "";
$obj = new SQLFieldListItem($proto146);

$proto117["m_fieldlist"][]=$obj;
						$proto148=array();
			$obj = new SQLField(array(
	"m_strName" => "height_id",
	"m_strTable" => "supplies"
));

$proto148["m_expr"]=$obj;
$proto148["m_alias"] = "";
$obj = new SQLFieldListItem($proto148);

$proto117["m_fieldlist"][]=$obj;
						$proto150=array();
			$obj = new SQLField(array(
	"m_strName" => "ps_id",
	"m_strTable" => "supplies"
));

$proto150["m_expr"]=$obj;
$proto150["m_alias"] = "";
$obj = new SQLFieldListItem($proto150);

$proto117["m_fieldlist"][]=$obj;
						$proto152=array();
			$obj = new SQLField(array(
	"m_strName" => "feature",
	"m_strTable" => "supplies"
));

$proto152["m_expr"]=$obj;
$proto152["m_alias"] = "";
$obj = new SQLFieldListItem($proto152);

$proto117["m_fieldlist"][]=$obj;
						$proto154=array();
			$obj = new SQLField(array(
	"m_strName" => "remark",
	"m_strTable" => "supplies"
));

$proto154["m_expr"]=$obj;
$proto154["m_alias"] = "";
$obj = new SQLFieldListItem($proto154);

$proto117["m_fieldlist"][]=$obj;
						$proto156=array();
			$obj = new SQLField(array(
	"m_strName" => "icon",
	"m_strTable" => "supplies"
));

$proto156["m_expr"]=$obj;
$proto156["m_alias"] = "";
$obj = new SQLFieldListItem($proto156);

$proto117["m_fieldlist"][]=$obj;
						$proto158=array();
			$obj = new SQLField(array(
	"m_strName" => "pic1",
	"m_strTable" => "supplies"
));

$proto158["m_expr"]=$obj;
$proto158["m_alias"] = "";
$obj = new SQLFieldListItem($proto158);

$proto117["m_fieldlist"][]=$obj;
						$proto160=array();
			$obj = new SQLField(array(
	"m_strName" => "pic2",
	"m_strTable" => "supplies"
));

$proto160["m_expr"]=$obj;
$proto160["m_alias"] = "";
$obj = new SQLFieldListItem($proto160);

$proto117["m_fieldlist"][]=$obj;
						$proto162=array();
			$obj = new SQLField(array(
	"m_strName" => "pic3",
	"m_strTable" => "supplies"
));

$proto162["m_expr"]=$obj;
$proto162["m_alias"] = "";
$obj = new SQLFieldListItem($proto162);

$proto117["m_fieldlist"][]=$obj;
						$proto164=array();
			$obj = new SQLField(array(
	"m_strName" => "pic4",
	"m_strTable" => "supplies"
));

$proto164["m_expr"]=$obj;
$proto164["m_alias"] = "";
$obj = new SQLFieldListItem($proto164);

$proto117["m_fieldlist"][]=$obj;
						$proto166=array();
			$obj = new SQLField(array(
	"m_strName" => "pic5",
	"m_strTable" => "supplies"
));

$proto166["m_expr"]=$obj;
$proto166["m_alias"] = "";
$obj = new SQLFieldListItem($proto166);

$proto117["m_fieldlist"][]=$obj;
						$proto168=array();
			$obj = new SQLField(array(
	"m_strName" => "pic6",
	"m_strTable" => "supplies"
));

$proto168["m_expr"]=$obj;
$proto168["m_alias"] = "";
$obj = new SQLFieldListItem($proto168);

$proto117["m_fieldlist"][]=$obj;
						$proto170=array();
			$obj = new SQLField(array(
	"m_strName" => "pic7",
	"m_strTable" => "supplies"
));

$proto170["m_expr"]=$obj;
$proto170["m_alias"] = "";
$obj = new SQLFieldListItem($proto170);

$proto117["m_fieldlist"][]=$obj;
						$proto172=array();
			$obj = new SQLField(array(
	"m_strName" => "pic8",
	"m_strTable" => "supplies"
));

$proto172["m_expr"]=$obj;
$proto172["m_alias"] = "";
$obj = new SQLFieldListItem($proto172);

$proto117["m_fieldlist"][]=$obj;
						$proto174=array();
			$obj = new SQLField(array(
	"m_strName" => "user_id",
	"m_strTable" => "supplies"
));

$proto174["m_expr"]=$obj;
$proto174["m_alias"] = "";
$obj = new SQLFieldListItem($proto174);

$proto117["m_fieldlist"][]=$obj;
						$proto176=array();
			$obj = new SQLField(array(
	"m_strName" => "creation_date",
	"m_strTable" => "supplies"
));

$proto176["m_expr"]=$obj;
$proto176["m_alias"] = "";
$obj = new SQLFieldListItem($proto176);

$proto117["m_fieldlist"][]=$obj;
						$proto178=array();
			$obj = new SQLField(array(
	"m_strName" => "modified_date",
	"m_strTable" => "supplies"
));

$proto178["m_expr"]=$obj;
$proto178["m_alias"] = "";
$obj = new SQLFieldListItem($proto178);

$proto117["m_fieldlist"][]=$obj;
$proto117["m_fromlist"] = array();
												$proto180=array();
$proto180["m_link"] = "SQLL_MAIN";
			$proto181=array();
$proto181["m_strName"] = "supplies";
$proto181["m_columns"] = array();
$proto181["m_columns"][] = "id";
$proto181["m_columns"][] = "estate";
$proto181["m_columns"][] = "zone_id";
$proto181["m_columns"][] = "district_id";
$proto181["m_columns"][] = "supply_mode_id";
$proto181["m_columns"][] = "support_type_id";
$proto181["m_columns"][] = "area";
$proto181["m_columns"][] = "address";
$proto181["m_columns"][] = "unit_price";
$proto181["m_columns"][] = "years";
$proto181["m_columns"][] = "rc";
$proto181["m_columns"][] = "hc";
$proto181["m_columns"][] = "sf";
$proto181["m_columns"][] = "height_id";
$proto181["m_columns"][] = "ps_id";
$proto181["m_columns"][] = "feature";
$proto181["m_columns"][] = "remark";
$proto181["m_columns"][] = "icon";
$proto181["m_columns"][] = "pic1";
$proto181["m_columns"][] = "pic2";
$proto181["m_columns"][] = "pic3";
$proto181["m_columns"][] = "pic4";
$proto181["m_columns"][] = "pic5";
$proto181["m_columns"][] = "pic6";
$proto181["m_columns"][] = "pic7";
$proto181["m_columns"][] = "pic8";
$proto181["m_columns"][] = "user_id";
$proto181["m_columns"][] = "creation_date";
$proto181["m_columns"][] = "modified_date";
$obj = new SQLTable($proto181);

$proto180["m_table"] = $obj;
$proto180["m_alias"] = "";
$proto182=array();
$proto182["m_sql"] = "";
$proto182["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto182["m_column"]=$obj;
$proto182["m_contained"] = array();
$proto182["m_strCase"] = "";
$proto182["m_havingmode"] = "0";
$proto182["m_inBrackets"] = "0";
$proto182["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto182);

$proto180["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto180);

$proto117["m_fromlist"][]=$obj;
$proto117["m_groupby"] = array();
$proto117["m_orderby"] = array();
$obj = new SQLQuery($proto117);

$queryData_supplies = $obj;
$tdatasupplies[".sqlquery"] = $queryData_supplies;

include(getabspath("include/supplies_events.php"));
$tableEvents["supplies"] = new eventclass_supplies;

?>
