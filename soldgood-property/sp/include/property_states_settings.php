<?php
$tdataproperty_states=array();
	$tdataproperty_states[".NumberOfChars"]=80; 
	$tdataproperty_states[".ShortName"]="property_states";
	$tdataproperty_states[".OwnerID"]="";
	$tdataproperty_states[".OriginalTable"]="property_states";


	
//	field labels
$fieldLabelsproperty_states = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsproperty_states["English"]=array();
	$fieldToolTipsproperty_states["English"]=array();
	$fieldLabelsproperty_states["English"]["id"] = "User ID";
	$fieldToolTipsproperty_states["English"]["id"] = "";
	$fieldLabelsproperty_states["English"]["value"] = "Value";
	$fieldToolTipsproperty_states["English"]["value"] = "";
	$fieldLabelsproperty_states["English"]["language_type"] = "Language Type";
	$fieldToolTipsproperty_states["English"]["language_type"] = "";
	$fieldLabelsproperty_states["English"][""] = "";
	$fieldToolTipsproperty_states["English"][""] = "";
	$fieldLabelsproperty_states["English"][""] = "Property States";
	$fieldToolTipsproperty_states["English"][""] = "";
	$fieldLabelsproperty_states["English"][""] = "";
	$fieldToolTipsproperty_states["English"][""] = "";
	$fieldLabelsproperty_states["English"][""] = "Property States";
	$fieldToolTipsproperty_states["English"][""] = "";
	$fieldLabelsproperty_states["English"][""] = "";
	$fieldToolTipsproperty_states["English"][""] = "";
	$fieldLabelsproperty_states["English"][""] = "";
	$fieldToolTipsproperty_states["English"][""] = "";
	if (count($fieldToolTipsproperty_states["English"])){
		$tdataproperty_states[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"]["id"] = "Id";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"]["value"] = "Value";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"]["value"] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"]["language_type"] = "Language Type";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"]["language_type"] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "Property States";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "Property States";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldLabelsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	$fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"][""] = "";
	if (count($fieldToolTipsproperty_states["Chinese (Hong Kong S.A.R.)"])){
		$tdataproperty_states[".isUseToolTips"]=true;
	}
}


	
	$tdataproperty_states[".NCSearch"]=true;

	

$tdataproperty_states[".shortTableName"] = "property_states";
$tdataproperty_states[".nSecOptions"] = 0;
$tdataproperty_states[".recsPerRowList"] = 1;	
$tdataproperty_states[".tableGroupBy"] = "0";
$tdataproperty_states[".mainTableOwnerID"] = "";
$tdataproperty_states[".moveNext"] = 1;




$tdataproperty_states[".showAddInPopup"] = false;

$tdataproperty_states[".showEditInPopup"] = false;

$tdataproperty_states[".showViewInPopup"] = false;


$tdataproperty_states[".fieldsForRegister"] = array();
	
$tdataproperty_states[".listAjax"] = false;

	$tdataproperty_states[".audit"] = false;

	$tdataproperty_states[".locking"] = false;
	
$tdataproperty_states[".listIcons"] = true;




$tdataproperty_states[".showSimpleSearchOptions"] = false;

$tdataproperty_states[".showSearchPanel"] = true;


$tdataproperty_states[".isUseAjaxSuggest"] = true;

$tdataproperty_states[".rowHighlite"] = true;


// button handlers file names

$tdataproperty_states[".addPageEvents"] = false;


// use datepicker for search panel
$tdataproperty_states[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataproperty_states[".isUseTimeForSearch"] = false;

$tdataproperty_states[".isUseiBox"] = false;




$tdataproperty_states[".isUseInlineJs"] = $tdataproperty_states[".isUseInlineAdd"] || $tdataproperty_states[".isUseInlineEdit"];

$tdataproperty_states[".allSearchFields"] = array();



$tdataproperty_states[".googleLikeFields"][] = "id";
$tdataproperty_states[".googleLikeFields"][] = "value";
$tdataproperty_states[".googleLikeFields"][] = "language_type";



$tdataproperty_states[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdataproperty_states[".allSearchFields"])) 
{
	$tdataproperty_states[".allSearchFields"][] = "id";	
}
$tdataproperty_states[".advSearchFields"][] = "value";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("value", $tdataproperty_states[".allSearchFields"])) 
{
	$tdataproperty_states[".allSearchFields"][] = "value";	
}
$tdataproperty_states[".advSearchFields"][] = "language_type";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("language_type", $tdataproperty_states[".allSearchFields"])) 
{
	$tdataproperty_states[".allSearchFields"][] = "language_type";	
}

$tdataproperty_states[".isTableType"] = "list";


	

$tdataproperty_states[".isDisplayLoading"] = true;

$tdataproperty_states[".isResizeColumns"] = false;





$tdataproperty_states[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataproperty_states[".strOrderBy"] = $gstrOrderBy;
	
$tdataproperty_states[".orderindexes"] = array();

$tdataproperty_states[".sqlHead"] = "SELECT id,   `value`,   language_type";
$tdataproperty_states[".sqlFrom"] = "FROM property_states";
$tdataproperty_states[".sqlWhereExpr"] = "";
$tdataproperty_states[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataproperty_states[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataproperty_states[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tdataproperty_states[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "property_states";
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
	
				
		
				
		
		
		
			$tdataproperty_states["id"]=$fdata;
//	value
	$fdata = array();
	$fdata["strName"] = "value";
	$fdata["ownerTable"] = "property_states";
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
			$fdata["EditParams"].= " maxlength=32";
		
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				
		
				
		
		
		
			$tdataproperty_states["value"]=$fdata;
//	language_type
	$fdata = array();
	$fdata["strName"] = "language_type";
	$fdata["ownerTable"] = "property_states";
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
			$fdata["EditParams"].= " maxlength=64";
		
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
				//End validation
	
				
		
				
		
		
		
			$tdataproperty_states["language_type"]=$fdata;

	
$tables_data["property_states"]=&$tdataproperty_states;
$field_labels["property_states"] = &$fieldLabelsproperty_states;
$fieldToolTips["property_states"] = &$fieldToolTipsproperty_states;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["property_states"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["property_states"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   `value`,   language_type";
$proto0["m_strFrom"] = "FROM property_states";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "property_states"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "property_states"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "language_type",
	"m_strTable" => "property_states"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "property_states";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "id";
$proto12["m_columns"][] = "value";
$proto12["m_columns"][] = "language_type";
$obj = new SQLTable($proto12);

$proto11["m_table"] = $obj;
$proto11["m_alias"] = "";
$proto13=array();
$proto13["m_sql"] = "";
$proto13["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
$proto13["m_strCase"] = "";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "0";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

$proto11["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto11);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

$queryData_property_states = $obj;
$tdataproperty_states[".sqlquery"] = $queryData_property_states;

$tableEvents["property_states"] = new eventsBase;

?>
