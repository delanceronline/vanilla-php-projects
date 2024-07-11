<?php
$tdatasupply_modes=array();
	$tdatasupply_modes[".NumberOfChars"]=80; 
	$tdatasupply_modes[".ShortName"]="supply_modes";
	$tdatasupply_modes[".OwnerID"]="";
	$tdatasupply_modes[".OriginalTable"]="supply_modes";


	
//	field labels
$fieldLabelssupply_modes = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelssupply_modes["English"]=array();
	$fieldToolTipssupply_modes["English"]=array();
	$fieldLabelssupply_modes["English"]["id"] = "User ID";
	$fieldToolTipssupply_modes["English"]["id"] = "";
	$fieldLabelssupply_modes["English"]["value"] = "Value";
	$fieldToolTipssupply_modes["English"]["value"] = "";
	$fieldLabelssupply_modes["English"]["language_type"] = "Language Type";
	$fieldToolTipssupply_modes["English"]["language_type"] = "";
	if (count($fieldToolTipssupply_modes["English"])){
		$tdatasupply_modes[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelssupply_modes["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipssupply_modes["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelssupply_modes["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipssupply_modes["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelssupply_modes["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipssupply_modes["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelssupply_modes["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipssupply_modes["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipssupply_modes["Chinese (Hong Kong S.A.R.)"])){
		$tdatasupply_modes[".isUseToolTips"]=true;
	}
}


	
	$tdatasupply_modes[".NCSearch"]=true;

	

$tdatasupply_modes[".shortTableName"] = "supply_modes";
$tdatasupply_modes[".nSecOptions"] = 0;
$tdatasupply_modes[".recsPerRowList"] = 1;	
$tdatasupply_modes[".tableGroupBy"] = "0";
$tdatasupply_modes[".mainTableOwnerID"] = "";
$tdatasupply_modes[".moveNext"] = 1;




$tdatasupply_modes[".showAddInPopup"] = false;

$tdatasupply_modes[".showEditInPopup"] = false;

$tdatasupply_modes[".showViewInPopup"] = false;


$tdatasupply_modes[".fieldsForRegister"] = array();
	
$tdatasupply_modes[".listAjax"] = false;

	$tdatasupply_modes[".audit"] = false;

	$tdatasupply_modes[".locking"] = false;
	
$tdatasupply_modes[".listIcons"] = true;




$tdatasupply_modes[".showSimpleSearchOptions"] = false;

$tdatasupply_modes[".showSearchPanel"] = true;


$tdatasupply_modes[".isUseAjaxSuggest"] = true;

$tdatasupply_modes[".rowHighlite"] = true;


// button handlers file names

$tdatasupply_modes[".addPageEvents"] = false;

$tdatasupply_modes[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatasupply_modes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasupply_modes[".isUseTimeForSearch"] = false;

$tdatasupply_modes[".isUseiBox"] = false;




$tdatasupply_modes[".isUseInlineJs"] = $tdatasupply_modes[".isUseInlineAdd"] || $tdatasupply_modes[".isUseInlineEdit"];

$tdatasupply_modes[".allSearchFields"] = array();

$tdatasupply_modes[".globSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatasupply_modes[".allSearchFields"]))
{
	$tdatasupply_modes[".allSearchFields"][] = "value";	
}
$tdatasupply_modes[".globSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatasupply_modes[".allSearchFields"]))
{
	$tdatasupply_modes[".allSearchFields"][] = "language_type";	
}


$tdatasupply_modes[".googleLikeFields"][] = "id";
$tdatasupply_modes[".googleLikeFields"][] = "value";
$tdatasupply_modes[".googleLikeFields"][] = "language_type";



$tdatasupply_modes[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatasupply_modes[".allSearchFields"])) 
{
	$tdatasupply_modes[".allSearchFields"][] = "id";	
}
$tdatasupply_modes[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdatasupply_modes[".allSearchFields"])) 
{
	$tdatasupply_modes[".allSearchFields"][] = "value";	
}
$tdatasupply_modes[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdatasupply_modes[".allSearchFields"])) 
{
	$tdatasupply_modes[".allSearchFields"][] = "language_type";	
}

$tdatasupply_modes[".isTableType"] = "list";


	

$tdatasupply_modes[".isDisplayLoading"] = true;

$tdatasupply_modes[".isResizeColumns"] = false;





$tdatasupply_modes[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasupply_modes[".strOrderBy"] = $gstrOrderBy;
	
$tdatasupply_modes[".orderindexes"] = array();

$tdatasupply_modes[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdatasupply_modes[".sqlFrom"] = "FROM supply_modes";
$tdatasupply_modes[".sqlWhereExpr"] = "";
$tdatasupply_modes[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatasupply_modes[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatasupply_modes[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatasupply_modes[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "supply_modes";
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
	
				
		
				
		
		
		
			$tdatasupply_modes["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "supply_modes";
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
	
		
				
		
		
		
			$tdatasupply_modes["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "supply_modes";
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
	
		
				
		
		
		
			$tdatasupply_modes["language_type"]=$fdata;

	
$tables_data["supply_modes"]=&$tdatasupply_modes;
$field_labels["supply_modes"] = &$fieldLabelssupply_modes;
$fieldToolTips["supply_modes"] = &$fieldToolTipssupply_modes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["supply_modes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["supply_modes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto102=array();
$proto102["m_strHead"] = "SELECT";
$proto102["m_strFieldList"] = "id,   `value`,   language_type";
$proto102["m_strFrom"] = "FROM supply_modes";
$proto102["m_strWhere"] = "";
$proto102["m_strOrderBy"] = "";
$proto102["m_strTail"] = "";
$proto103=array();
$proto103["m_sql"] = "";
$proto103["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto103["m_column"]=$obj;
$proto103["m_contained"] = array();
$proto103["m_strCase"] = "";
$proto103["m_havingmode"] = "0";
$proto103["m_inBrackets"] = "0";
$proto103["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto103);

$proto102["m_where"] = $obj;
$proto105=array();
$proto105["m_sql"] = "";
$proto105["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto105["m_column"]=$obj;
$proto105["m_contained"] = array();
$proto105["m_strCase"] = "";
$proto105["m_havingmode"] = "0";
$proto105["m_inBrackets"] = "0";
$proto105["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto105);

$proto102["m_having"] = $obj;
$proto102["m_fieldlist"] = array();
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "supply_modes"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto102["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "supply_modes"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto102["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "supply_modes"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto102["m_fieldlist"][]=$obj;
$proto102["m_fromlist"] = array();
												$proto113=array();
$proto113["m_link"] = "SQLL_MAIN";
			$proto114=array();
$proto114["m_strName"] = "supply_modes";
$proto114["m_columns"] = array();
$proto114["m_columns"][] = "id";
$proto114["m_columns"][] = "value";
$proto114["m_columns"][] = "language_type";
$obj = new SQLTable($proto114);

$proto113["m_table"] = $obj;
$proto113["m_alias"] = "";
$proto115=array();
$proto115["m_sql"] = "";
$proto115["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto115["m_column"]=$obj;
$proto115["m_contained"] = array();
$proto115["m_strCase"] = "";
$proto115["m_havingmode"] = "0";
$proto115["m_inBrackets"] = "0";
$proto115["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto115);

$proto113["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto113);

$proto102["m_fromlist"][]=$obj;
$proto102["m_groupby"] = array();
$proto102["m_orderby"] = array();
$obj = new SQLQuery($proto102);

$queryData_supply_modes = $obj;
$tdatasupply_modes[".sqlquery"] = $queryData_supply_modes;

$tableEvents["supply_modes"] = new eventsBase;

?>
