<?php
$strTableName="supplies";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="supplies";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   estate,   zone_id,   district_id,   supply_mode_id,   support_type_id,   area,   address,   unit_price,   years,   rc,   hc,   sf,   height_id,   ps_id,   feature,   remark,   icon,   pic1,   pic2,   pic3,   pic4,   pic5,   pic6,   pic7,   pic8,   user_id,   creation_date,   modified_date";
$gsqlFrom="FROM supplies";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/supplies_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_supplies;
$eventObj = &$tableEvents["supplies"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>