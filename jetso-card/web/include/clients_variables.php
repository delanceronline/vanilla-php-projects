<?php
$strTableName="clients";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="clients";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,  name,  password,  email,  logo,  sn,  cp,  tn,  fb_page,  fb_page_id,  industry,  status,  added_by,  `group`,  creation_date,  modified_date,  website";
$gsqlFrom="FROM clients";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/clients_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_clients;
$eventObj = &$tableEvents["clients"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>