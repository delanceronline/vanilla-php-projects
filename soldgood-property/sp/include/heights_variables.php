<?php
$strTableName="heights";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="heights";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   `value`,   language_type";
$gsqlFrom="FROM heights";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/heights_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_heights;
$eventObj = &$tableEvents["heights"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>