<?php
$tdatasupply_types=array();
	$tdatasupply_types[".NumberOfChars"]=80; 
	$tdatasupply_types[".ShortName"]="supply_types";
	$tdatasupply_types[".OwnerID"]="";
	$tdatasupply_types[".OriginalTable"]="supply_types";


	
//	field labels
$fieldLabelssupply_types = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelssupply_types["English"]=array();
	$fieldToolTipssupply_types["English"]=array();
	$fieldLabelssupply_types["English"]["id"] = "User ID";
	$fieldToolTipssupply_types["English"]["id"] = "";
	$fieldLabelssupply_types["English"]["value"] = "Value";
	$fieldToolTipssupply_types["English"]["value"] = "";
	$fieldLabelssupply_types["English"]["language_type"] = "Language Type";
	$fieldToolTipssupply_types["English"]["language_type"] = "";
	if (count($fieldToolTipssupply_types["English"])){
		$tdatasupply_types[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelssupply_types["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipssupply_types["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelssupply_types["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipssupply_types["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelssupply_types["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipssupply_types["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelssupply_types["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipssupply_types["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipssupply_types["Chinese (Hong Kong S.A.R.)"])){
		$tdatasupply_types[".isUseToolTips"]=true;
	}
}


	
	$tdatasupply_types[".NCSearch"]=true;

	

$tdatasupply_types[".shortTableName"] = "supply_types";
$tdatasupply_types[".nSecOptions"] = 0;
$tdatasupply_types[".recsPerRowList"] = 1;	
$tdatasupply_types[".tableGroupBy"] = "0";
$tdatasupply_types[".mainTableOwnerID"] = "";
$tdatasupply_types[".moveNext"] = 1;




$tdatasupply_types[".showAddInPopup"] = false;

$tdatasupply_types[".showEditInPopup"] = false;

$tdatasupply_types[".showViewInPopup"] = false;


$tdatasupply_types[".fieldsForRegister"] = array();
	
$tdatasupply_types[".listAjax"] = false;

	$tdatasupply_types[".audit"] = false;

	$tdatasupply_types[".locking"] = false;
	
$tdatasupply_types[".listIcons"] = true;




$tdatasupply_types[".showSimpleSearchOptions"] = false;

$tdatasupply_types[".showSearchPanel"] = true;


$tdatasupply_types[".isUseAjaxSuggest"] = true;

$tdatasupply_types[".rowHighlite"] = true;


// button handlers file names

$tdatasupply_types[".addPageEvents"] = false;

$tdatasupply_types[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatasupply_types[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasupply_types[".isUseTimeForSearch"] = false;

$tdatasupply_types[".isUseiBox"] = false;




$tdatasupply_types[".isUseInlineJs"] = $tdatasupply_types[".isUseInlineAdd"] || $tdatasupply_types[".isUseInlineEdit"];

$tdatasupply_types[".allSearchFields"] = array();

$tdatasupply_types[".globSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatasupply_types[".allSearchFields"]))
{
	$tdatasupply_types[".allSearchFields"][] = "value";	
}
$tdatasupply_types[".globSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatasupply_types[".allSearchFields"]))
{
	$tdatasupply_types[".allSearchFields"][] = "language_type";	
}


$tdatasupply_types[".googleLikeFields"][] = "id";
$tdatasupply_types[".googleLikeFields"][] = "value";
$tdatasupply_types[".googleLikeFields"][] = "language_type";



$tdatasupply_types[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatasupply_types[".allSearchFields"])) 
{
	$tdatasupply_types[".allSearchFields"][] = "id";	
}
$tdatasupply_types[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatasupply_types[".allSearchFields"])) 
{
	$tdatasupply_types[".allSearchFields"][] = "value";	
}
$tdatasupply_types[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatasupply_types[".allSearchFields"])) 
{
	$tdatasupply_types[".allSearchFields"][] = "language_type";	
}

$tdatasupply_types[".isTableType"] = "list";


	

$tdatasupply_types[".isDisplayLoading"] = true;

$tdatasupply_types[".isResizeColumns"] = false;





$tdatasupply_types[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasupply_types[".strOrderBy"] = $gstrOrderBy;
	
$tdatasupply_types[".orderindexes"] = array();

$tdatasupply_types[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdatasupply_types[".sqlFrom"] = "FROM supply_types";
$tdatasupply_types[".sqlWhereExpr"] = "";
$tdatasupply_types[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatasupply_types[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatasupply_types[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatasupply_types[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "supply_types";
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
	
				
		
				
		
		
		
			$tdatasupply_types["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "supply_types";
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
	
		
				
		
		
		
			$tdatasupply_types["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "supply_types";
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
	
		
				
		
		
		
			$tdatasupply_types["language_type"]=$fdata;

	
$tables_data["supply_types"]=&$tdatasupply_types;
$field_labels["supply_types"] = &$fieldLabelssupply_types;
$fieldToolTips["supply_types"] = &$fieldToolTipssupply_types;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["supply_types"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["supply_types"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto87=array();
$proto87["m_strHead"] = "SELECT";
$proto87["m_strFieldList"] = "id,   `value`,   language_type";
$proto87["m_strFrom"] = "FROM supply_types";
$proto87["m_strWhere"] = "";
$proto87["m_strOrderBy"] = "";
$proto87["m_strTail"] = "";
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

$proto87["m_where"] = $obj;
$proto90=array();
$proto90["m_sql"] = "";
$proto90["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto90["m_column"]=$obj;
$proto90["m_contained"] = array();
$proto90["m_strCase"] = "";
$proto90["m_havingmode"] = "0";
$proto90["m_inBrackets"] = "0";
$proto90["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto90);

$proto87["m_having"] = $obj;
$proto87["m_fieldlist"] = array();
						$proto92=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "supply_types"
));

$proto92["m_expr"]=$obj;
$proto92["m_alias"] = "";
$obj = new SQLFieldListItem($proto92);

$proto87["m_fieldlist"][]=$obj;
						$proto94=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "supply_types"
));

$proto94["m_expr"]=$obj;
$proto94["m_alias"] = "";
$obj = new SQLFieldListItem($proto94);

$proto87["m_fieldlist"][]=$obj;
						$proto96=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "supply_types"
));

$proto96["m_expr"]=$obj;
$proto96["m_alias"] = "";
$obj = new SQLFieldListItem($proto96);

$proto87["m_fieldlist"][]=$obj;
$proto87["m_fromlist"] = array();
												$proto98=array();
$proto98["m_link"] = "SQLL_MAIN";
			$proto99=array();
$proto99["m_strName"] = "supply_types";
$proto99["m_columns"] = array();
$proto99["m_columns"][] = "id";
$proto99["m_columns"][] = "value";
$proto99["m_columns"][] = "language_type";
$obj = new SQLTable($proto99);

$proto98["m_table"] = $obj;
$proto98["m_alias"] = "";
$proto100=array();
$proto100["m_sql"] = "";
$proto100["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto100["m_column"]=$obj;
$proto100["m_contained"] = array();
$proto100["m_strCase"] = "";
$proto100["m_havingmode"] = "0";
$proto100["m_inBrackets"] = "0";
$proto100["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto100);

$proto98["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto98);

$proto87["m_fromlist"][]=$obj;
$proto87["m_groupby"] = array();
$proto87["m_orderby"] = array();
$obj = new SQLQuery($proto87);

$queryData_supply_types = $obj;
$tdatasupply_types[".sqlquery"] = $queryData_supply_types;

$tableEvents["supply_types"] = new eventsBase;

?>
