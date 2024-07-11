<?php
	
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);	
	
	include_once ('./inc/config.inc.php');
	
	$cid = 0;
	if(isset($_REQUEST['cid']) && is_numeric($_REQUEST['cid']))
		$cid = $_REQUEST['cid'];
	
	$rid = 0;
	if(isset($_REQUEST['rid']) && is_numeric($_REQUEST['rid']))
		$rid = $_REQUEST['rid'];
	
	$uid = "";
	if(isset($_REQUEST['uid']))
		$uid = $_REQUEST['uid'];
	
	$result = 0;
	
	if($cid > 0 && $rid > 0 && $uid != "")
	{
		$link = mysql_connect($global_db_location, $global_db_login_id, $global_db_password);
		if ($link) 
		{
			$db_selected = mysql_select_db($global_db_name, $link);
			if ($db_selected) 
			{
				mysql_query("SET NAMES 'utf8';");
				
				$sql = "UPDATE coupons_released SET is_used = 1 WHERE id = $rid AND coupon_id = $cid AND fb_uid = '$uid'";
				if(mysql_query($sql) && mysql_affected_rows() > 0)
				{
					$result = 1;
				}
			}
		}
		mysql_close($link);
	}
	
	echo $result;
?>