<?php
$tdataheights=array();
	$tdataheights[".NumberOfChars"]=80; 
	$tdataheights[".ShortName"]="heights";
	$tdataheights[".OwnerID"]="";
	$tdataheights[".OriginalTable"]="heights";


	
//	field labels
$fieldLabelsheights = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsheights["English"]=array();
	$fieldToolTipsheights["English"]=array();
	$fieldLabelsheights["English"]["id"] = "User ID";
	$fieldToolTipsheights["English"]["id"] = "";
	$fieldLabelsheights["English"]["value"] = "Value";
	$fieldToolTipsheights["English"]["value"] = "";
	$fieldLabelsheights["English"]["language_type"] = "Language Type";
	$fieldToolTipsheights["English"]["language_type"] = "";
	if (count($fieldToolTipsheights["English"])){
		$tdataheights[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelsheights["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipsheights["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelsheights["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipsheights["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelsheights["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipsheights["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelsheights["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipsheights["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	if (count($fieldToolTipsheights["Chinese (Hong Kong S.A.R.)"])){
		$tdataheights[".isUseToolTips"]=true;
	}
}


	
	$tdataheights[".NCSearch"]=true;

	

$tdataheights[".shortTableName"] = "heights";
$tdataheights[".nSecOptions"] = 0;
$tdataheights[".recsPerRowList"] = 1;	
$tdataheights[".tableGroupBy"] = "0";
$tdataheights[".mainTableOwnerID"] = "";
$tdataheights[".moveNext"] = 1;




$tdataheights[".showAddInPopup"] = false;

$tdataheights[".showEditInPopup"] = false;

$tdataheights[".showViewInPopup"] = false;


$tdataheights[".fieldsForRegister"] = array();
	
$tdataheights[".listAjax"] = false;

	$tdataheights[".audit"] = false;

	$tdataheights[".locking"] = false;
	
$tdataheights[".listIcons"] = true;




$tdataheights[".showSimpleSearchOptions"] = false;

$tdataheights[".showSearchPanel"] = true;


$tdataheights[".isUseAjaxSuggest"] = true;

$tdataheights[".rowHighlite"] = true;


// button handlers file names

$tdataheights[".addPageEvents"] = false;

$tdataheights[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdataheights[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataheights[".isUseTimeForSearch"] = false;

$tdataheights[".isUseiBox"] = false;




$tdataheights[".isUseInlineJs"] = $tdataheights[".isUseInlineAdd"] || $tdataheights[".isUseInlineEdit"];

$tdataheights[".allSearchFields"] = array();



$tdataheights[".googleLikeFields"][] = "id";
$tdataheights[".googleLikeFields"][] = "value";
$tdataheights[".googleLikeFields"][] = "language_type";



$tdataheights[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdataheights[".allSearchFields"])) 
{
	$tdataheights[".allSearchFields"][] = "id";	
}
$tdataheights[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdataheights[".allSearchFields"])) 
{
	$tdataheights[".allSearchFields"][] = "value";	
}
$tdataheights[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdataheights[".allSearchFields"])) 
{
	$tdataheights[".allSearchFields"][] = "language_type";	
}

$tdataheights[".isTableType"] = "list";


	

$tdataheights[".isDisplayLoading"] = true;

$tdataheights[".isResizeColumns"] = false;





$tdataheights[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataheights[".strOrderBy"] = $gstrOrderBy;
	
$tdataheights[".orderindexes"] = array();

$tdataheights[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdataheights[".sqlFrom"] = "FROM heights";
$tdataheights[".sqlWhereExpr"] = "";
$tdataheights[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataheights[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataheights[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdataheights[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "heights";
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
	
				
		
				
		
		
		
			$tdataheights["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "heights";
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
	
				
		
				
		
		
		
			$tdataheights["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "heights";
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
	
				
		
				
		
		
		
			$tdataheights["language_type"]=$fdata;

	
$tables_data["heights"]=&$tdataheights;
$field_labels["heights"] = &$fieldLabelsheights;
$fieldToolTips["heights"] = &$fieldToolTipsheights;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["heights"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["heights"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto30=array();
$proto30["m_strHead"] = "SELECT";
$proto30["m_strFieldList"] = "id,   `value`,   language_type";
$proto30["m_strFrom"] = "FROM heights";
$proto30["m_strWhere"] = "";
$proto30["m_strOrderBy"] = "";
$proto30["m_strTail"] = "";
$proto31=array();
$proto31["m_sql"] = "";
$proto31["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto31["m_column"]=$obj;
$proto31["m_contained"] = array();
$proto31["m_strCase"] = "";
$proto31["m_havingmode"] = "0";
$proto31["m_inBrackets"] = "0";
$proto31["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto31);

$proto30["m_where"] = $obj;
$proto33=array();
$proto33["m_sql"] = "";
$proto33["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto33["m_column"]=$obj;
$proto33["m_contained"] = array();
$proto33["m_strCase"] = "";
$proto33["m_havingmode"] = "0";
$proto33["m_inBrackets"] = "0";
$proto33["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto33);

$proto30["m_having"] = $obj;
$proto30["m_fieldlist"] = array();
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "heights"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto30["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "heights"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto30["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "heights"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto30["m_fieldlist"][]=$obj;
$proto30["m_fromlist"] = array();
												$proto41=array();
$proto41["m_link"] = "SQLL_MAIN";
			$proto42=array();
$proto42["m_strName"] = "heights";
$proto42["m_columns"] = array();
$proto42["m_columns"][] = "id";
$proto42["m_columns"][] = "value";
$proto42["m_columns"][] = "language_type";
$obj = new SQLTable($proto42);

$proto41["m_table"] = $obj;
$proto41["m_alias"] = "";
$proto43=array();
$proto43["m_sql"] = "";
$proto43["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto43["m_column"]=$obj;
$proto43["m_contained"] = array();
$proto43["m_strCase"] = "";
$proto43["m_havingmode"] = "0";
$proto43["m_inBrackets"] = "0";
$proto43["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto43);

$proto41["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto41);

$proto30["m_fromlist"][]=$obj;
$proto30["m_groupby"] = array();
$proto30["m_orderby"] = array();
$obj = new SQLQuery($proto30);

$queryData_heights = $obj;
$tdataheights[".sqlquery"] = $queryData_heights;

$tableEvents["heights"] = new eventsBase;

?>
