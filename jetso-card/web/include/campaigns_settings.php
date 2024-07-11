<?php
$tdatacampaigns=array();
	$tdatacampaigns[".NumberOfChars"]=80; 
	$tdatacampaigns[".ShortName"]="campaigns";
	$tdatacampaigns[".OwnerID"]="";
	$tdatacampaigns[".OriginalTable"]="campaigns";


	
//	field labels
$fieldLabelscampaigns = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscampaigns["English"]=array();
	$fieldToolTipscampaigns["English"]=array();
	$fieldLabelscampaigns["English"]["owner"] = "Owner";
	$fieldToolTipscampaigns["English"]["owner"] = "";
	$fieldLabelscampaigns["English"]["id"] = "Id";
	$fieldToolTipscampaigns["English"]["id"] = "";
	$fieldLabelscampaigns["English"]["coupon"] = "Coupon Image";
	$fieldToolTipscampaigns["English"]["coupon"] = "";
	$fieldLabelscampaigns["English"]["cn_offset"] = "Coupon Number Offset";
	$fieldToolTipscampaigns["English"]["cn_offset"] = "";
	$fieldLabelscampaigns["English"]["cn_prefix"] = "Coupon Number Prefix";
	$fieldToolTipscampaigns["English"]["cn_prefix"] = "";
	$fieldLabelscampaigns["English"]["cc"] = "Coupon Count";
	$fieldToolTipscampaigns["English"]["cc"] = "";
	$fieldLabelscampaigns["English"]["cr"] = "Coupon Release Count";
	$fieldToolTipscampaigns["English"]["cr"] = "";
	$fieldLabelscampaigns["English"]["pt"] = "Offer Title";
	$fieldToolTipscampaigns["English"]["pt"] = "";
	$fieldLabelscampaigns["English"]["pd"] = "Offer Details";
	$fieldToolTipscampaigns["English"]["pd"] = "";
	$fieldLabelscampaigns["English"]["pi"] = "Promotional Image";
	$fieldToolTipscampaigns["English"]["pi"] = "";
	$fieldLabelscampaigns["English"]["terms"] = "Terms of Use";
	$fieldToolTipscampaigns["English"]["terms"] = "";
	$fieldLabelscampaigns["English"]["ti"] = "Terms of Use Image";
	$fieldToolTipscampaigns["English"]["ti"] = "";
	$fieldLabelscampaigns["English"]["start_date"] = "Start Date";
	$fieldToolTipscampaigns["English"]["start_date"] = "";
	$fieldLabelscampaigns["English"]["start_time"] = "Start Time";
	$fieldToolTipscampaigns["English"]["start_time"] = "";
	$fieldLabelscampaigns["English"]["end_date"] = "End Date";
	$fieldToolTipscampaigns["English"]["end_date"] = "";
	$fieldLabelscampaigns["English"]["end_time"] = "End Time";
	$fieldToolTipscampaigns["English"]["end_time"] = "";
	$fieldLabelscampaigns["English"]["status"] = "Status";
	$fieldToolTipscampaigns["English"]["status"] = "";
	$fieldLabelscampaigns["English"]["creation_date"] = "Creation Date";
	$fieldToolTipscampaigns["English"]["creation_date"] = "";
	$fieldLabelscampaigns["English"]["modified_date"] = "Modified Date";
	$fieldToolTipscampaigns["English"]["modified_date"] = "";
	if (count($fieldToolTipscampaigns["English"])){
		$tdatacampaigns[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["owner"] = "Owner";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["owner"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["coupon"] = "優惠券圖片";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["coupon"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["cn_offset"] = "優惠券起始編號";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["cn_offset"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["cn_prefix"] = "優惠券編號字首";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["cn_prefix"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["cc"] = "優惠券總數";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["cc"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["cr"] = "已發放優惠券數目";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["cr"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["pt"] = "優惠標題";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["pt"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["pd"] = "優惠詳情";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["pd"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["pi"] = "推廣圖片";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["pi"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["terms"] = "使用條款";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["terms"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["ti"] = "使用條款圖片";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["ti"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["start_date"] = "開始日期";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["start_date"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["start_time"] = "開始時間";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["start_time"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["end_date"] = "完結日期";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["end_date"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["end_time"] = "完結時間";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["end_time"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["status"] = "狀況";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["status"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "新增日期";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "";
	$fieldLabelscampaigns["Chinese (Hong Kong S.A.R.)"]["modified_date"] = "更改日期";
	$fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"]["modified_date"] = "";
	if (count($fieldToolTipscampaigns["Chinese (Hong Kong S.A.R.)"])){
		$tdatacampaigns[".isUseToolTips"]=true;
	}
}


	
	$tdatacampaigns[".NCSearch"]=true;

	

$tdatacampaigns[".shortTableName"] = "campaigns";
$tdatacampaigns[".nSecOptions"] = 0;
$tdatacampaigns[".recsPerRowList"] = 1;	
$tdatacampaigns[".tableGroupBy"] = "0";
$tdatacampaigns[".mainTableOwnerID"] = "";
$tdatacampaigns[".moveNext"] = 1;




$tdatacampaigns[".showAddInPopup"] = false;

$tdatacampaigns[".showEditInPopup"] = false;

$tdatacampaigns[".showViewInPopup"] = false;


$tdatacampaigns[".fieldsForRegister"] = array();

$tdatacampaigns[".listAjax"] = false;

	$tdatacampaigns[".audit"] = false;

	$tdatacampaigns[".locking"] = false;
	
$tdatacampaigns[".listIcons"] = true;
$tdatacampaigns[".edit"] = true;
$tdatacampaigns[".view"] = true;

$tdatacampaigns[".exportTo"] = true;

$tdatacampaigns[".printFriendly"] = true;

$tdatacampaigns[".delete"] = true;

$tdatacampaigns[".showSimpleSearchOptions"] = false;

$tdatacampaigns[".showSearchPanel"] = true;


$tdatacampaigns[".isUseAjaxSuggest"] = true;

$tdatacampaigns[".rowHighlite"] = true;


// button handlers file names

$tdatacampaigns[".addPageEvents"] = false;

$tdatacampaigns[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatacampaigns[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatacampaigns[".isUseTimeForSearch"] = true;

$tdatacampaigns[".isUseiBox"] = false;




$tdatacampaigns[".isUseInlineJs"] = $tdatacampaigns[".isUseInlineAdd"] || $tdatacampaigns[".isUseInlineEdit"];

$tdatacampaigns[".allSearchFields"] = array();

$tdatacampaigns[".globSearchFields"][] = "pt";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pt", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "pt";	
}
$tdatacampaigns[".globSearchFields"][] = "pd";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pd", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "pd";	
}
$tdatacampaigns[".globSearchFields"][] = "pi";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pi", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "pi";	
}
$tdatacampaigns[".globSearchFields"][] = "coupon";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("coupon", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "coupon";	
}
$tdatacampaigns[".globSearchFields"][] = "terms";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("terms", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "terms";	
}
$tdatacampaigns[".globSearchFields"][] = "ti";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ti", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "ti";	
}
$tdatacampaigns[".globSearchFields"][] = "cc";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cc", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "cc";	
}
$tdatacampaigns[".globSearchFields"][] = "cn_prefix";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cn_prefix", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "cn_prefix";	
}
$tdatacampaigns[".globSearchFields"][] = "cn_offset";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cn_offset", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "cn_offset";	
}
$tdatacampaigns[".globSearchFields"][] = "cr";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cr", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "cr";	
}
$tdatacampaigns[".globSearchFields"][] = "start_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("start_date", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "start_date";	
}
$tdatacampaigns[".globSearchFields"][] = "start_time";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("start_time", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "start_time";	
}
$tdatacampaigns[".globSearchFields"][] = "end_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("end_date", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "end_date";	
}
$tdatacampaigns[".globSearchFields"][] = "end_time";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("end_time", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "end_time";	
}
$tdatacampaigns[".globSearchFields"][] = "creation_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("creation_date", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "creation_date";	
}
$tdatacampaigns[".globSearchFields"][] = "modified_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("modified_date", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "modified_date";	
}
$tdatacampaigns[".globSearchFields"][] = "status";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("status", $tdatacampaigns[".allSearchFields"]))
{
	$tdatacampaigns[".allSearchFields"][] = "status";	
}


$tdatacampaigns[".googleLikeFields"][] = "id";
$tdatacampaigns[".googleLikeFields"][] = "owner";
$tdatacampaigns[".googleLikeFields"][] = "pt";
$tdatacampaigns[".googleLikeFields"][] = "pd";
$tdatacampaigns[".googleLikeFields"][] = "pi";
$tdatacampaigns[".googleLikeFields"][] = "coupon";
$tdatacampaigns[".googleLikeFields"][] = "terms";
$tdatacampaigns[".googleLikeFields"][] = "ti";
$tdatacampaigns[".googleLikeFields"][] = "cc";
$tdatacampaigns[".googleLikeFields"][] = "cn_prefix";
$tdatacampaigns[".googleLikeFields"][] = "cn_offset";
$tdatacampaigns[".googleLikeFields"][] = "cr";
$tdatacampaigns[".googleLikeFields"][] = "start_date";
$tdatacampaigns[".googleLikeFields"][] = "start_time";
$tdatacampaigns[".googleLikeFields"][] = "end_date";
$tdatacampaigns[".googleLikeFields"][] = "end_time";
$tdatacampaigns[".googleLikeFields"][] = "creation_date";
$tdatacampaigns[".googleLikeFields"][] = "modified_date";
$tdatacampaigns[".googleLikeFields"][] = "status";



$tdatacampaigns[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "id";	
}
$tdatacampaigns[".advSearchFields"][] = "owner";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("owner", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "owner";	
}
$tdatacampaigns[".advSearchFields"][] = "pt";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pt", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "pt";	
}
$tdatacampaigns[".advSearchFields"][] = "pd";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pd", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "pd";	
}
$tdatacampaigns[".advSearchFields"][] = "pi";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("pi", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "pi";	
}
$tdatacampaigns[".advSearchFields"][] = "coupon";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("coupon", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "coupon";	
}
$tdatacampaigns[".advSearchFields"][] = "terms";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("terms", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "terms";	
}
$tdatacampaigns[".advSearchFields"][] = "ti";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ti", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "ti";	
}
$tdatacampaigns[".advSearchFields"][] = "cc";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cc", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "cc";	
}
$tdatacampaigns[".advSearchFields"][] = "cn_prefix";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cn_prefix", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "cn_prefix";	
}
$tdatacampaigns[".advSearchFields"][] = "cn_offset";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cn_offset", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "cn_offset";	
}
$tdatacampaigns[".advSearchFields"][] = "cr";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cr", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "cr";	
}
$tdatacampaigns[".advSearchFields"][] = "start_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("start_date", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "start_date";	
}
$tdatacampaigns[".advSearchFields"][] = "start_time";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("start_time", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "start_time";	
}
$tdatacampaigns[".advSearchFields"][] = "end_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("end_date", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "end_date";	
}
$tdatacampaigns[".advSearchFields"][] = "end_time";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("end_time", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "end_time";	
}
$tdatacampaigns[".advSearchFields"][] = "creation_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("creation_date", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "creation_date";	
}
$tdatacampaigns[".advSearchFields"][] = "modified_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("modified_date", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "modified_date";	
}
$tdatacampaigns[".advSearchFields"][] = "status";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("status", $tdatacampaigns[".allSearchFields"])) 
{
	$tdatacampaigns[".allSearchFields"][] = "status";	
}

$tdatacampaigns[".isTableType"] = "list";


	

$tdatacampaigns[".isDisplayLoading"] = true;

$tdatacampaigns[".isResizeColumns"] = false;





$tdatacampaigns[".pageSize"] = 20;

$gstrOrderBy = "ORDER BY modified_date DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacampaigns[".strOrderBy"] = $gstrOrderBy;
	
$tdatacampaigns[".orderindexes"] = array();
$tdatacampaigns[".orderindexes"][] = array(19, (0 ? "ASC" : "DESC"), "modified_date");

$tdatacampaigns[".sqlHead"] = "SELECT owner,  id,  coupon,  cn_offset,  cn_prefix,  cc,  cr,  pt,  pd,  pi,  terms,  ti,  start_date,  start_time,  end_date,  end_time,  status,  creation_date,  modified_date";
$tdatacampaigns[".sqlFrom"] = "FROM campaigns";
$tdatacampaigns[".sqlWhereExpr"] = "";
$tdatacampaigns[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacampaigns[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacampaigns[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatacampaigns[".Keys"] = $tableKeys;

//	owner
	$fdata = array();
	$fdata["strName"] = "owner";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="Owner"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "owner";
	
		$fdata["FullName"]= "owner";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 1;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				
		
				
		
		
		
			$tdatacampaigns["owner"]=$fdata;
//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="Id"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		$fdata["AutoInc"]=true;
	
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
	
		$fdata["FullName"]= "id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 2;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				
		
				
		
		
		
			$tdatacampaigns["id"]=$fdata;
//	coupon
	$fdata = array();
	$fdata["strName"] = "coupon";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠券圖片"; 
	
		
		$fdata["LinkPrefix"]="client_images/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "coupon";
	
		$fdata["FullName"]= "coupon";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="client_images"; 
		$fdata["Index"]= 3;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["coupon"]=$fdata;
//	cn_offset
	$fdata = array();
	$fdata["strName"] = "cn_offset";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠券起始編號"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cn_offset";
	
		$fdata["FullName"]= "cn_offset";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 4;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["cn_offset"]=$fdata;
//	cn_prefix
	$fdata = array();
	$fdata["strName"] = "cn_prefix";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠券編號字首"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cn_prefix";
	
		$fdata["FullName"]= "cn_prefix";
	
		
		
		
		
		
				$fdata["Index"]= 5;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=6";
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["cn_prefix"]=$fdata;
//	cc
	$fdata = array();
	$fdata["strName"] = "cc";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠券總數"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cc";
	
		$fdata["FullName"]= "cc";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 6;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["cc"]=$fdata;
//	cr
	$fdata = array();
	$fdata["strName"] = "cr";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="已發放優惠券數目"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cr";
	
		$fdata["FullName"]= "cr";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 7;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["cr"]=$fdata;
//	pt
	$fdata = array();
	$fdata["strName"] = "pt";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠標題"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "pt";
	
		$fdata["FullName"]= "pt";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 8;
				$fdata["EditParams"]="";
				$fdata["EditParams"].= " size=40";
	
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
	
		
				
		
		
		
			$tdatacampaigns["pt"]=$fdata;
//	pd
	$fdata = array();
	$fdata["strName"] = "pd";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="優惠詳情"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "pd";
	
		$fdata["FullName"]= "pd";
	
		
		
		
		
		
				$fdata["Index"]= 9;
			$fdata["EditParams"] = "";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=400";
		$fdata["nCols"] = 400;
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["pd"]=$fdata;
//	pi
	$fdata = array();
	$fdata["strName"] = "pi";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="推廣圖片"; 
	
		
		$fdata["LinkPrefix"]="client_images/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "pi";
	
		$fdata["FullName"]= "pi";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="client_images"; 
		$fdata["Index"]= 10;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["pi"]=$fdata;
//	terms
	$fdata = array();
	$fdata["strName"] = "terms";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="使用條款"; 
	
		
		
	$fdata["FieldType"]= 201;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "terms";
	
		$fdata["FullName"]= "terms";
	
		
		
		
		
		
				$fdata["Index"]= 11;
			$fdata["EditParams"] = "";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=400";
		$fdata["nCols"] = 400;
		
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["terms"]=$fdata;
//	ti
	$fdata = array();
	$fdata["strName"] = "ti";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="使用條款圖片"; 
	
		
		$fdata["LinkPrefix"]="client_images/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "ti";
	
		$fdata["FullName"]= "ti";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="client_images"; 
		$fdata["Index"]= 12;
				
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["ti"]=$fdata;
//	start_date
	$fdata = array();
	$fdata["strName"] = "start_date";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="開始日期"; 
	
		
		
	$fdata["FieldType"]= 7;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "start_date";
	
		$fdata["FullName"]= "start_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 13;
		$fdata["DateEditType"] = 11; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
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
	
		
				
		
		
		
			$tdatacampaigns["start_date"]=$fdata;
//	start_time
	$fdata = array();
	$fdata["strName"] = "start_time";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="開始時間"; 
	
		
		
	$fdata["FieldType"]= 134;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "start_time";
	
		$fdata["FullName"]= "start_time";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 14;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Time");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
						$hours = 24;
		$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => $hours,
										  "minutes" => 15,
										  "showSeconds" => 0);
	$tdatacampaigns["start_time"]=$fdata;
//	end_date
	$fdata = array();
	$fdata["strName"] = "end_date";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="完結日期"; 
	
		
		
	$fdata["FieldType"]= 7;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "end_date";
	
		$fdata["FullName"]= "end_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 15;
		$fdata["DateEditType"] = 11; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
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
	
		
				
		
		
		
			$tdatacampaigns["end_date"]=$fdata;
//	end_time
	$fdata = array();
	$fdata["strName"] = "end_time";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="完結時間"; 
	
		
		
	$fdata["FieldType"]= 134;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "end_time";
	
		$fdata["FullName"]= "end_time";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 16;
				$fdata["EditParams"]="";
			
		
		$fdata["bAddPage"]=true; 
	
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Time");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
						$hours = 24;
		$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => $hours,
										  "minutes" => 15,
										  "showSeconds" => 0);
	$tdatacampaigns["end_time"]=$fdata;
//	status
	$fdata = array();
	$fdata["strName"] = "status";
	$fdata["ownerTable"] = "campaigns";
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
	$fdata["DisplayField"]="symbol";
				$fdata["LookupTable"]="status";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language='".$_SESSION['language']."'";
													$fdata["SimpleAdd"]=true;
	
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "status";
	
		$fdata["FullName"]= "status";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 17;
				
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
	
		
				
		
		
		
			$tdatacampaigns["status"]=$fdata;
//	creation_date
	$fdata = array();
	$fdata["strName"] = "creation_date";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="新增日期"; 
	
		
		
	$fdata["FieldType"]= 135;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "creation_date";
	
		$fdata["FullName"]= "creation_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 18;
		$fdata["DateEditType"] = 11; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
		
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["creation_date"]=$fdata;
//	modified_date
	$fdata = array();
	$fdata["strName"] = "modified_date";
	$fdata["ownerTable"] = "campaigns";
		$fdata["Label"]="更改日期"; 
	
		
		
	$fdata["FieldType"]= 135;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "modified_date";
	
		$fdata["FullName"]= "modified_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 19;
		$fdata["DateEditType"] = 11; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
		$fdata["bListPage"]=true; 
	
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
		//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatacampaigns["modified_date"]=$fdata;

	
$tables_data["campaigns"]=&$tdatacampaigns;
$field_labels["campaigns"] = &$fieldLabelscampaigns;
$fieldToolTips["campaigns"] = &$fieldToolTipscampaigns;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["campaigns"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["campaigns"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto43=array();
$proto43["m_strHead"] = "SELECT";
$proto43["m_strFieldList"] = "owner,  id,  coupon,  cn_offset,  cn_prefix,  cc,  cr,  pt,  pd,  pi,  terms,  ti,  start_date,  start_time,  end_date,  end_time,  status,  creation_date,  modified_date";
$proto43["m_strFrom"] = "FROM campaigns";
$proto43["m_strWhere"] = "";
$proto43["m_strOrderBy"] = "ORDER BY modified_date DESC";
$proto43["m_strTail"] = "";
$proto44=array();
$proto44["m_sql"] = "";
$proto44["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto44["m_column"]=$obj;
$proto44["m_contained"] = array();
$proto44["m_strCase"] = "";
$proto44["m_havingmode"] = "0";
$proto44["m_inBrackets"] = "0";
$proto44["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto44);

$proto43["m_where"] = $obj;
$proto46=array();
$proto46["m_sql"] = "";
$proto46["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto46["m_column"]=$obj;
$proto46["m_contained"] = array();
$proto46["m_strCase"] = "";
$proto46["m_havingmode"] = "0";
$proto46["m_inBrackets"] = "0";
$proto46["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto46);

$proto43["m_having"] = $obj;
$proto43["m_fieldlist"] = array();
						$proto48=array();
			$obj = new SQLField(array(
	"m_strName" => "owner",
	"m_strTable" => "campaigns"
));

$proto48["m_expr"]=$obj;
$proto48["m_alias"] = "";
$obj = new SQLFieldListItem($proto48);

$proto43["m_fieldlist"][]=$obj;
						$proto50=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "campaigns"
));

$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto43["m_fieldlist"][]=$obj;
						$proto52=array();
			$obj = new SQLField(array(
	"m_strName" => "coupon",
	"m_strTable" => "campaigns"
));

$proto52["m_expr"]=$obj;
$proto52["m_alias"] = "";
$obj = new SQLFieldListItem($proto52);

$proto43["m_fieldlist"][]=$obj;
						$proto54=array();
			$obj = new SQLField(array(
	"m_strName" => "cn_offset",
	"m_strTable" => "campaigns"
));

$proto54["m_expr"]=$obj;
$proto54["m_alias"] = "";
$obj = new SQLFieldListItem($proto54);

$proto43["m_fieldlist"][]=$obj;
						$proto56=array();
			$obj = new SQLField(array(
	"m_strName" => "cn_prefix",
	"m_strTable" => "campaigns"
));

$proto56["m_expr"]=$obj;
$proto56["m_alias"] = "";
$obj = new SQLFieldListItem($proto56);

$proto43["m_fieldlist"][]=$obj;
						$proto58=array();
			$obj = new SQLField(array(
	"m_strName" => "cc",
	"m_strTable" => "campaigns"
));

$proto58["m_expr"]=$obj;
$proto58["m_alias"] = "";
$obj = new SQLFieldListItem($proto58);

$proto43["m_fieldlist"][]=$obj;
						$proto60=array();
			$obj = new SQLField(array(
	"m_strName" => "cr",
	"m_strTable" => "campaigns"
));

$proto60["m_expr"]=$obj;
$proto60["m_alias"] = "";
$obj = new SQLFieldListItem($proto60);

$proto43["m_fieldlist"][]=$obj;
						$proto62=array();
			$obj = new SQLField(array(
	"m_strName" => "pt",
	"m_strTable" => "campaigns"
));

$proto62["m_expr"]=$obj;
$proto62["m_alias"] = "";
$obj = new SQLFieldListItem($proto62);

$proto43["m_fieldlist"][]=$obj;
						$proto64=array();
			$obj = new SQLField(array(
	"m_strName" => "pd",
	"m_strTable" => "campaigns"
));

$proto64["m_expr"]=$obj;
$proto64["m_alias"] = "";
$obj = new SQLFieldListItem($proto64);

$proto43["m_fieldlist"][]=$obj;
						$proto66=array();
			$obj = new SQLField(array(
	"m_strName" => "pi",
	"m_strTable" => "campaigns"
));

$proto66["m_expr"]=$obj;
$proto66["m_alias"] = "";
$obj = new SQLFieldListItem($proto66);

$proto43["m_fieldlist"][]=$obj;
						$proto68=array();
			$obj = new SQLField(array(
	"m_strName" => "terms",
	"m_strTable" => "campaigns"
));

$proto68["m_expr"]=$obj;
$proto68["m_alias"] = "";
$obj = new SQLFieldListItem($proto68);

$proto43["m_fieldlist"][]=$obj;
						$proto70=array();
			$obj = new SQLField(array(
	"m_strName" => "ti",
	"m_strTable" => "campaigns"
));

$proto70["m_expr"]=$obj;
$proto70["m_alias"] = "";
$obj = new SQLFieldListItem($proto70);

$proto43["m_fieldlist"][]=$obj;
						$proto72=array();
			$obj = new SQLField(array(
	"m_strName" => "start_date",
	"m_strTable" => "campaigns"
));

$proto72["m_expr"]=$obj;
$proto72["m_alias"] = "";
$obj = new SQLFieldListItem($proto72);

$proto43["m_fieldlist"][]=$obj;
						$proto74=array();
			$obj = new SQLField(array(
	"m_strName" => "start_time",
	"m_strTable" => "campaigns"
));

$proto74["m_expr"]=$obj;
$proto74["m_alias"] = "";
$obj = new SQLFieldListItem($proto74);

$proto43["m_fieldlist"][]=$obj;
						$proto76=array();
			$obj = new SQLField(array(
	"m_strName" => "end_date",
	"m_strTable" => "campaigns"
));

$proto76["m_expr"]=$obj;
$proto76["m_alias"] = "";
$obj = new SQLFieldListItem($proto76);

$proto43["m_fieldlist"][]=$obj;
						$proto78=array();
			$obj = new SQLField(array(
	"m_strName" => "end_time",
	"m_strTable" => "campaigns"
));

$proto78["m_expr"]=$obj;
$proto78["m_alias"] = "";
$obj = new SQLFieldListItem($proto78);

$proto43["m_fieldlist"][]=$obj;
						$proto80=array();
			$obj = new SQLField(array(
	"m_strName" => "status",
	"m_strTable" => "campaigns"
));

$proto80["m_expr"]=$obj;
$proto80["m_alias"] = "";
$obj = new SQLFieldListItem($proto80);

$proto43["m_fieldlist"][]=$obj;
						$proto82=array();
			$obj = new SQLField(array(
	"m_strName" => "creation_date",
	"m_strTable" => "campaigns"
));

$proto82["m_expr"]=$obj;
$proto82["m_alias"] = "";
$obj = new SQLFieldListItem($proto82);

$proto43["m_fieldlist"][]=$obj;
						$proto84=array();
			$obj = new SQLField(array(
	"m_strName" => "modified_date",
	"m_strTable" => "campaigns"
));

$proto84["m_expr"]=$obj;
$proto84["m_alias"] = "";
$obj = new SQLFieldListItem($proto84);

$proto43["m_fieldlist"][]=$obj;
$proto43["m_fromlist"] = array();
												$proto86=array();
$proto86["m_link"] = "SQLL_MAIN";
			$proto87=array();
$proto87["m_strName"] = "campaigns";
$proto87["m_columns"] = array();
$proto87["m_columns"][] = "owner";
$proto87["m_columns"][] = "id";
$proto87["m_columns"][] = "coupon";
$proto87["m_columns"][] = "cn_offset";
$proto87["m_columns"][] = "cn_prefix";
$proto87["m_columns"][] = "cc";
$proto87["m_columns"][] = "cr";
$proto87["m_columns"][] = "pt";
$proto87["m_columns"][] = "pd";
$proto87["m_columns"][] = "pi";
$proto87["m_columns"][] = "terms";
$proto87["m_columns"][] = "ti";
$proto87["m_columns"][] = "start_date";
$proto87["m_columns"][] = "start_time";
$proto87["m_columns"][] = "end_date";
$proto87["m_columns"][] = "end_time";
$proto87["m_columns"][] = "status";
$proto87["m_columns"][] = "creation_date";
$proto87["m_columns"][] = "modified_date";
$obj = new SQLTable($proto87);

$proto86["m_table"] = $obj;
$proto86["m_alias"] = "";
$proto88=array();
$proto88["m_sql"] = "";
$proto88["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto88["m_column"]=$obj;
$proto88["m_contained"] = array();
$proto88["m_strCase"] = "";
$proto88["m_havingmode"] = "0";
$proto88["m_inBrackets"] = "0";
$proto88["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto88);

$proto86["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto86);

$proto43["m_fromlist"][]=$obj;
$proto43["m_groupby"] = array();
$proto43["m_orderby"] = array();
												$proto90=array();
						$obj = new SQLField(array(
	"m_strName" => "modified_date",
	"m_strTable" => "campaigns"
));

$proto90["m_column"]=$obj;
$proto90["m_bAsc"] = 0;
$proto90["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto90);

$proto43["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto43);

$queryData_campaigns = $obj;
$tdatacampaigns[".sqlquery"] = $queryData_campaigns;

include(getabspath("include/campaigns_events.php"));
$tableEvents["campaigns"] = new eventclass_campaigns;

?>
