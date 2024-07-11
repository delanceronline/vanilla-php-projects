<?php
$tdataidentity=array();
	$tdataidentity[".NumberOfChars"]=80; 
	$tdataidentity[".ShortName"]="identity";
	$tdataidentity[".OwnerID"]="";
	$tdataidentity[".OriginalTable"]="identity";


	
//	field labels
$fieldLabelsidentity = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsidentity["English"]=array();
	$fieldToolTipsidentity["English"]=array();
	$fieldLabelsidentity["English"]["id"] = "User ID";
	$fieldToolTipsidentity["English"]["id"] = "";
	$fieldLabelsidentity["English"]["value"] = "Value";
	$fieldToolTipsidentity["English"]["value"] = "";
	$fieldLabelsidentity["English"]["language_type"] = "Language Type";
	$fieldToolTipsidentity["English"]["language_type"] = "";
	if (count($fieldToolTipsidentity["English"])){
		$tdataidentity[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelsidentity["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipsidentity["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelsidentity["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipsidentity["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelsidentity["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipsidentity["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelsidentity["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipsidentity["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipsidentity["Chinese (Hong Kong S.A.R.)"])){
		$tdataidentity[".isUseToolTips"]=true;
	}
}


	
	$tdataidentity[".NCSearch"]=true;

	

$tdataidentity[".shortTableName"] = "identity";
$tdataidentity[".nSecOptions"] = 0;
$tdataidentity[".recsPerRowList"] = 1;	
$tdataidentity[".tableGroupBy"] = "0";
$tdataidentity[".mainTableOwnerID"] = "";
$tdataidentity[".moveNext"] = 1;




$tdataidentity[".showAddInPopup"] = false;

$tdataidentity[".showEditInPopup"] = false;

$tdataidentity[".showViewInPopup"] = false;


$tdataidentity[".fieldsForRegister"] = array();
	
$tdataidentity[".listAjax"] = false;

	$tdataidentity[".audit"] = false;

	$tdataidentity[".locking"] = false;
	
$tdataidentity[".listIcons"] = true;




$tdataidentity[".showSimpleSearchOptions"] = false;

$tdataidentity[".showSearchPanel"] = true;


$tdataidentity[".isUseAjaxSuggest"] = true;

$tdataidentity[".rowHighlite"] = true;


// button handlers file names

$tdataidentity[".addPageEvents"] = false;

$tdataidentity[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdataidentity[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataidentity[".isUseTimeForSearch"] = false;

$tdataidentity[".isUseiBox"] = false;




$tdataidentity[".isUseInlineJs"] = $tdataidentity[".isUseInlineAdd"] || $tdataidentity[".isUseInlineEdit"];

$tdataidentity[".allSearchFields"] = array();



$tdataidentity[".googleLikeFields"][] = "id";
$tdataidentity[".googleLikeFields"][] = "value";
$tdataidentity[".googleLikeFields"][] = "language_type";



$tdataidentity[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdataidentity[".allSearchFields"])) 
{
	$tdataidentity[".allSearchFields"][] = "id";	
}
$tdataidentity[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdataidentity[".allSearchFields"])) 
{
	$tdataidentity[".allSearchFields"][] = "value";	
}
$tdataidentity[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdataidentity[".allSearchFields"])) 
{
	$tdataidentity[".allSearchFields"][] = "language_type";	
}

$tdataidentity[".isTableType"] = "list";


	

$tdataidentity[".isDisplayLoading"] = true;

$tdataidentity[".isResizeColumns"] = false;





$tdataidentity[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataidentity[".strOrderBy"] = $gstrOrderBy;
	
$tdataidentity[".orderindexes"] = array();

$tdataidentity[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdataidentity[".sqlFrom"] = "FROM `identity`";
$tdataidentity[".sqlWhereExpr"] = "";
$tdataidentity[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataidentity[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataidentity[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdataidentity[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "identity";
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
	
				
		
				
		
		
		
			$tdataidentity["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "identity";
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
	
				
		
				
		
		
		
			$tdataidentity["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "identity";
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
			
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				
		
				
		
		
		
			$tdataidentity["language_type"]=$fdata;

	
$tables_data["identity"]=&$tdataidentity;
$field_labels["identity"] = &$fieldLabelsidentity;
$fieldToolTips["identity"] = &$fieldToolTipsidentity;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["identity"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["identity"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto15=array();
$proto15["m_strHead"] = "SELECT";
$proto15["m_strFieldList"] = "id,   `value`,   language_type";
$proto15["m_strFrom"] = "FROM `identity`";
$proto15["m_strWhere"] = "";
$proto15["m_strOrderBy"] = "";
$proto15["m_strTail"] = "";
$proto16=array();
$proto16["m_sql"] = "";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "";
$proto16["m_havingmode"] = "0";
$proto16["m_inBrackets"] = "0";
$proto16["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto16);

$proto15["m_where"] = $obj;
$proto18=array();
$proto18["m_sql"] = "";
$proto18["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto18["m_column"]=$obj;
$proto18["m_contained"] = array();
$proto18["m_strCase"] = "";
$proto18["m_havingmode"] = "0";
$proto18["m_inBrackets"] = "0";
$proto18["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto18);

$proto15["m_having"] = $obj;
$proto15["m_fieldlist"] = array();
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "identity"
));

$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto15["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "identity"
));

$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto15["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "identity"
));

$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto15["m_fieldlist"][]=$obj;
$proto15["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "identity";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "id";
$proto27["m_columns"][] = "value";
$proto27["m_columns"][] = "language_type";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_alias"] = "";
$proto28=array();
$proto28["m_sql"] = "";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "";
$proto28["m_havingmode"] = "0";
$proto28["m_inBrackets"] = "0";
$proto28["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto15["m_fromlist"][]=$obj;
$proto15["m_groupby"] = array();
$proto15["m_orderby"] = array();
$obj = new SQLQuery($proto15);

$queryData_identity = $obj;
$tdataidentity[".sqlquery"] = $queryData_identity;

$tableEvents["identity"] = new eventsBase;

?>
