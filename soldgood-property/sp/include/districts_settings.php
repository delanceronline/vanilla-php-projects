<?php
$tdatadistricts=array();
	$tdatadistricts[".NumberOfChars"]=80; 
	$tdatadistricts[".ShortName"]="districts";
	$tdatadistricts[".OwnerID"]="";
	$tdatadistricts[".OriginalTable"]="districts";


	
//	field labels
$fieldLabelsdistricts = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsdistricts["English"]=array();
	$fieldToolTipsdistricts["English"]=array();
	$fieldLabelsdistricts["English"]["id"] = "User ID";
	$fieldToolTipsdistricts["English"]["id"] = "";
	$fieldLabelsdistricts["English"]["zone_id"] = "Zone ID";
	$fieldToolTipsdistricts["English"]["zone_id"] = "";
	$fieldLabelsdistricts["English"]["value"] = "Value";
	$fieldToolTipsdistricts["English"]["value"] = "";
	$fieldLabelsdistricts["English"]["language_type"] = "Language Type";
	$fieldToolTipsdistricts["English"]["language_type"] = "";
	if (count($fieldToolTipsdistricts["English"])){
		$tdatadistricts[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelsdistricts["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelsdistricts["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelsdistricts["Chinese (Hong Kong S.A.R.)"]["zone_id"] = "地域號碼";
	$fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"]["zone_id"] = "";
	$fieldLabelsdistricts["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelsdistricts["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipsdistricts["Chinese (Hong Kong S.A.R.)"])){
		$tdatadistricts[".isUseToolTips"]=true;
	}
}


	
	$tdatadistricts[".NCSearch"]=true;

	

$tdatadistricts[".shortTableName"] = "districts";
$tdatadistricts[".nSecOptions"] = 0;
$tdatadistricts[".recsPerRowList"] = 1;	
$tdatadistricts[".tableGroupBy"] = "0";
$tdatadistricts[".mainTableOwnerID"] = "";
$tdatadistricts[".moveNext"] = 1;




$tdatadistricts[".showAddInPopup"] = false;

$tdatadistricts[".showEditInPopup"] = false;

$tdatadistricts[".showViewInPopup"] = false;


$tdatadistricts[".fieldsForRegister"] = array();
	
$tdatadistricts[".listAjax"] = false;

	$tdatadistricts[".audit"] = false;

	$tdatadistricts[".locking"] = false;
	
$tdatadistricts[".listIcons"] = true;




$tdatadistricts[".showSimpleSearchOptions"] = false;

$tdatadistricts[".showSearchPanel"] = true;


$tdatadistricts[".isUseAjaxSuggest"] = true;

$tdatadistricts[".rowHighlite"] = true;


// button handlers file names

$tdatadistricts[".addPageEvents"] = false;

$tdatadistricts[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatadistricts[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatadistricts[".isUseTimeForSearch"] = false;

$tdatadistricts[".isUseiBox"] = false;




$tdatadistricts[".isUseInlineJs"] = $tdatadistricts[".isUseInlineAdd"] || $tdatadistricts[".isUseInlineEdit"];

$tdatadistricts[".allSearchFields"] = array();



$tdatadistricts[".googleLikeFields"][] = "id";
$tdatadistricts[".googleLikeFields"][] = "value";
$tdatadistricts[".googleLikeFields"][] = "zone_id";
$tdatadistricts[".googleLikeFields"][] = "language_type";



$tdatadistricts[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatadistricts[".allSearchFields"])) 
{
	$tdatadistricts[".allSearchFields"][] = "id";	
}
$tdatadistricts[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatadistricts[".allSearchFields"])) 
{
	$tdatadistricts[".allSearchFields"][] = "value";	
}
$tdatadistricts[".advSearchFields"][] = "zone_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("zone_id", $tdatadistricts[".allSearchFields"])) 
{
	$tdatadistricts[".allSearchFields"][] = "zone_id";	
}
$tdatadistricts[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatadistricts[".allSearchFields"])) 
{
	$tdatadistricts[".allSearchFields"][] = "language_type";	
}

$tdatadistricts[".isTableType"] = "list";


	

$tdatadistricts[".isDisplayLoading"] = true;

$tdatadistricts[".isResizeColumns"] = false;





$tdatadistricts[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatadistricts[".strOrderBy"] = $gstrOrderBy;
	
$tdatadistricts[".orderindexes"] = array();

$tdatadistricts[".sqlHead"] = "SELECT id,  `value`,  zone_id,  language_type";
$tdatadistricts[".sqlFrom"] = "FROM districts";
$tdatadistricts[".sqlWhereExpr"] = "";
$tdatadistricts[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatadistricts[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatadistricts[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatadistricts[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "districts";
		$fdata["Label"]="Id"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
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
	
				
		
				
		
		
		
			$tdatadistricts["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "districts";
		$fdata["Label"]="Value"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "value";
	
		$fdata["FullName"]= "`value`";
	
		
		
		
		
		
				$fdata["Index"]= 2;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				
		
				
		
		
		
			$tdatadistricts["value"]=$fdata;
//	zone_id
	$fdata = array();
	$fdata["strName"] = "zone_id";
	$fdata["ownerTable"] = "districts";
		$fdata["Label"]="地域號碼"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "zone_id";
	
		$fdata["FullName"]= "zone_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 3;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
				//End validation
	
				
		
				
		
		
		
			$tdatadistricts["zone_id"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "districts";
		$fdata["Label"]="Language Type"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "language_type";
	
		$fdata["FullName"]= "language_type";
	
		
		
		
		
		
				$fdata["Index"]= 4;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				
		
				
		
		
		
			$tdatadistricts["language_type"]=$fdata;

	
$tables_data["districts"]=&$tdatadistricts;
$field_labels["districts"] = &$fieldLabelsdistricts;
$fieldToolTips["districts"] = &$fieldToolTipsdistricts;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["districts"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["districts"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto184=array();
$proto184["m_strHead"] = "SELECT";
$proto184["m_strFieldList"] = "id,  `value`,  zone_id,  language_type";
$proto184["m_strFrom"] = "FROM districts";
$proto184["m_strWhere"] = "";
$proto184["m_strOrderBy"] = "";
$proto184["m_strTail"] = "";
$proto185=array();
$proto185["m_sql"] = "";
$proto185["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto185["m_column"]=$obj;
$proto185["m_contained"] = array();
$proto185["m_strCase"] = "";
$proto185["m_havingmode"] = "0";
$proto185["m_inBrackets"] = "0";
$proto185["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto185);

$proto184["m_where"] = $obj;
$proto187=array();
$proto187["m_sql"] = "";
$proto187["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto187["m_column"]=$obj;
$proto187["m_contained"] = array();
$proto187["m_strCase"] = "";
$proto187["m_havingmode"] = "0";
$proto187["m_inBrackets"] = "0";
$proto187["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto187);

$proto184["m_having"] = $obj;
$proto184["m_fieldlist"] = array();
						$proto189=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "districts"
));

$proto189["m_expr"]=$obj;
$proto189["m_alias"] = "";
$obj = new SQLFieldListItem($proto189);

$proto184["m_fieldlist"][]=$obj;
						$proto191=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "districts"
));

$proto191["m_expr"]=$obj;
$proto191["m_alias"] = "";
$obj = new SQLFieldListItem($proto191);

$proto184["m_fieldlist"][]=$obj;
						$proto193=array();
			$obj = new SQLField(array(
	"m_strName" => "zone_id",
	"m_strTable" => "districts"
));

$proto193["m_expr"]=$obj;
$proto193["m_alias"] = "";
$obj = new SQLFieldListItem($proto193);

$proto184["m_fieldlist"][]=$obj;
						$proto195=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "districts"
));

$proto195["m_expr"]=$obj;
$proto195["m_alias"] = "";
$obj = new SQLFieldListItem($proto195);

$proto184["m_fieldlist"][]=$obj;
$proto184["m_fromlist"] = array();
												$proto197=array();
$proto197["m_link"] = "SQLL_MAIN";
			$proto198=array();
$proto198["m_strName"] = "districts";
$proto198["m_columns"] = array();
$proto198["m_columns"][] = "id";
$proto198["m_columns"][] = "value";
$proto198["m_columns"][] = "zone_id";
$proto198["m_columns"][] = "language_type";
$obj = new SQLTable($proto198);

$proto197["m_table"] = $obj;
$proto197["m_alias"] = "";
$proto199=array();
$proto199["m_sql"] = "";
$proto199["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto199["m_column"]=$obj;
$proto199["m_contained"] = array();
$proto199["m_strCase"] = "";
$proto199["m_havingmode"] = "0";
$proto199["m_inBrackets"] = "0";
$proto199["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto199);

$proto197["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto197);

$proto184["m_fromlist"][]=$obj;
$proto184["m_groupby"] = array();
$proto184["m_orderby"] = array();
$obj = new SQLQuery($proto184);

$queryData_districts = $obj;
$tdatadistricts[".sqlquery"] = $queryData_districts;

$tableEvents["districts"] = new eventsBase;

?>
