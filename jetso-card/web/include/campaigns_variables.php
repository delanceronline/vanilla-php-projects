<?php
$strTableName="campaigns";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="campaigns";

$gstrOrderBy="ORDER BY modified_date DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(19, (0 ? "ASC" : "DESC"), "modified_date");
$gsqlHead="SELECT owner,  id,  coupon,  cn_offset,  cn_prefix,  cc,  cr,  pt,  pd,  pi,  terms,  ti,  start_date,  start_time,  end_date,  end_time,  status,  creation_date,  modified_date";
$gsqlFrom="FROM campaigns";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/campaigns_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_campaigns;
$eventObj = &$tableEvents["campaigns"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>