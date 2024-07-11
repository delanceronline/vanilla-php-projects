<?php
$strTableName="supply_types";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="supply_types";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   `value`,   language_type";
$gsqlFrom="FROM supply_types";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/supply_types_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_supply_types;
$eventObj = &$tableEvents["supply_types"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>