<?php
$tdatazones=array();
	$tdatazones[".NumberOfChars"]=80; 
	$tdatazones[".ShortName"]="zones";
	$tdatazones[".OwnerID"]="";
	$tdatazones[".OriginalTable"]="zones";


	
//	field labels
$fieldLabelszones = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelszones["English"]=array();
	$fieldToolTipszones["English"]=array();
	$fieldLabelszones["English"]["id"] = "User ID";
	$fieldToolTipszones["English"]["id"] = "";
	$fieldLabelszones["English"]["value"] = "Value";
	$fieldToolTipszones["English"]["value"] = "";
	$fieldLabelszones["English"]["language_type"] = "Language Type";
	$fieldToolTipszones["English"]["language_type"] = "";
	if (count($fieldToolTipszones["English"])){
		$tdatazones[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelszones["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipszones["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelszones["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipszones["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelszones["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipszones["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelszones["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipszones["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipszones["Chinese (Hong Kong S.A.R.)"])){
		$tdatazones[".isUseToolTips"]=true;
	}
}


	
	$tdatazones[".NCSearch"]=true;

	

$tdatazones[".shortTableName"] = "zones";
$tdatazones[".nSecOptions"] = 0;
$tdatazones[".recsPerRowList"] = 1;	
$tdatazones[".tableGroupBy"] = "0";
$tdatazones[".mainTableOwnerID"] = "";
$tdatazones[".moveNext"] = 1;




$tdatazones[".showAddInPopup"] = false;

$tdatazones[".showEditInPopup"] = false;

$tdatazones[".showViewInPopup"] = false;


$tdatazones[".fieldsForRegister"] = array();
	
$tdatazones[".listAjax"] = false;

	$tdatazones[".audit"] = false;

	$tdatazones[".locking"] = false;
	
$tdatazones[".listIcons"] = true;




$tdatazones[".showSimpleSearchOptions"] = false;

$tdatazones[".showSearchPanel"] = true;


$tdatazones[".isUseAjaxSuggest"] = true;

$tdatazones[".rowHighlite"] = true;


// button handlers file names

$tdatazones[".addPageEvents"] = false;

$tdatazones[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatazones[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatazones[".isUseTimeForSearch"] = false;

$tdatazones[".isUseiBox"] = false;




$tdatazones[".isUseInlineJs"] = $tdatazones[".isUseInlineAdd"] || $tdatazones[".isUseInlineEdit"];

$tdatazones[".allSearchFields"] = array();

$tdatazones[".globSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatazones[".allSearchFields"]))
{
	$tdatazones[".allSearchFields"][] = "value";	
}
$tdatazones[".globSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatazones[".allSearchFields"]))
{
	$tdatazones[".allSearchFields"][] = "language_type";	
}


$tdatazones[".googleLikeFields"][] = "id";
$tdatazones[".googleLikeFields"][] = "value";
$tdatazones[".googleLikeFields"][] = "language_type";



$tdatazones[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatazones[".allSearchFields"])) 
{
	$tdatazones[".allSearchFields"][] = "id";	
}
$tdatazones[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatazones[".allSearchFields"])) 
{
	$tdatazones[".allSearchFields"][] = "value";	
}
$tdatazones[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatazones[".allSearchFields"])) 
{
	$tdatazones[".allSearchFields"][] = "language_type";	
}

$tdatazones[".isTableType"] = "list";


	

$tdatazones[".isDisplayLoading"] = true;

$tdatazones[".isResizeColumns"] = false;





$tdatazones[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatazones[".strOrderBy"] = $gstrOrderBy;
	
$tdatazones[".orderindexes"] = array();

$tdatazones[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdatazones[".sqlFrom"] = "FROM zones";
$tdatazones[".sqlWhereExpr"] = "";
$tdatazones[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatazones[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatazones[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatazones[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "zones";
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
	
				
		
				
		
		
		
			$tdatazones["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "zones";
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
			
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		$fdata["bInlineAdd"]=true; 
	
		$fdata["bEditPage"]=true; 
	
		$fdata["bInlineEdit"]=true; 
	
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		$fdata["bPrinterPage"]=true; 
	
		$fdata["bExportPage"]=true; 
	
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatazones["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "zones";
		$fdata["Label"]="Language Type"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "language_type";
	
		$fdata["FullName"]= "language_type";
	
		
		
		
		
		
				$fdata["Index"]= 3;
				$fdata["EditParams"]="";
			
		$fdata["bListPage"]=true; 
	
		$fdata["bAddPage"]=true; 
	
		$fdata["bInlineAdd"]=true; 
	
		$fdata["bEditPage"]=true; 
	
		$fdata["bInlineEdit"]=true; 
	
		$fdata["bViewPage"]=true; 
	
		$fdata["bAdvancedSearch"]=true; 
	
		$fdata["bPrinterPage"]=true; 
	
		$fdata["bExportPage"]=true; 
	
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatazones["language_type"]=$fdata;

	
$tables_data["zones"]=&$tdatazones;
$field_labels["zones"] = &$fieldLabelszones;
$fieldToolTips["zones"] = &$fieldToolTipszones;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["zones"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["zones"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto45=array();
$proto45["m_strHead"] = "SELECT";
$proto45["m_strFieldList"] = "id,   `value`,   language_type";
$proto45["m_strFrom"] = "FROM zones";
$proto45["m_strWhere"] = "";
$proto45["m_strOrderBy"] = "";
$proto45["m_strTail"] = "";
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

$proto45["m_where"] = $obj;
$proto48=array();
$proto48["m_sql"] = "";
$proto48["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto48["m_column"]=$obj;
$proto48["m_contained"] = array();
$proto48["m_strCase"] = "";
$proto48["m_havingmode"] = "0";
$proto48["m_inBrackets"] = "0";
$proto48["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto48);

$proto45["m_having"] = $obj;
$proto45["m_fieldlist"] = array();
						$proto50=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "zones"
));

$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto45["m_fieldlist"][]=$obj;
						$proto52=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "zones"
));

$proto52["m_expr"]=$obj;
$proto52["m_alias"] = "";
$obj = new SQLFieldListItem($proto52);

$proto45["m_fieldlist"][]=$obj;
						$proto54=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "zones"
));

$proto54["m_expr"]=$obj;
$proto54["m_alias"] = "";
$obj = new SQLFieldListItem($proto54);

$proto45["m_fieldlist"][]=$obj;
$proto45["m_fromlist"] = array();
												$proto56=array();
$proto56["m_link"] = "SQLL_MAIN";
			$proto57=array();
$proto57["m_strName"] = "zones";
$proto57["m_columns"] = array();
$proto57["m_columns"][] = "id";
$proto57["m_columns"][] = "value";
$proto57["m_columns"][] = "language_type";
$obj = new SQLTable($proto57);

$proto56["m_table"] = $obj;
$proto56["m_alias"] = "";
$proto58=array();
$proto58["m_sql"] = "";
$proto58["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto58["m_column"]=$obj;
$proto58["m_contained"] = array();
$proto58["m_strCase"] = "";
$proto58["m_havingmode"] = "0";
$proto58["m_inBrackets"] = "0";
$proto58["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto58);

$proto56["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto56);

$proto45["m_fromlist"][]=$obj;
$proto45["m_groupby"] = array();
$proto45["m_orderby"] = array();
$obj = new SQLQuery($proto45);

$queryData_zones = $obj;
$tdatazones[".sqlquery"] = $queryData_zones;

$tableEvents["zones"] = new eventsBase;

?>
