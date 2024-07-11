<?php
$strTableName="supply_modes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="supply_modes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   `value`,   language_type";
$gsqlFrom="FROM supply_modes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/supply_modes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_supply_modes;
$eventObj = &$tableEvents["supply_modes"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>