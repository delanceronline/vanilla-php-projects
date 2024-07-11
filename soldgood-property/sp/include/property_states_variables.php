<?php
$strTableName="property_states";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="property_states";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   `value`,   language_type";
$gsqlFrom="FROM property_states";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/property_states_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_property_states;
$eventObj = &$tableEvents["property_states"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>