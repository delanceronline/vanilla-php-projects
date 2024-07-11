<?php
	
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);	
	
	include_once ('./inc/config.inc.php');
	
	$oid = 0;
	if(isset($_REQUEST['oid']) && is_numeric($_REQUEST['oid']))
		$oid = $_REQUEST['oid'];
	
	$uid = "";
	if(isset($_REQUEST['uid']))
		$uid = $_REQUEST['uid'];	
	
	$qid = 0;
	$rid = 0;
	if($oid > 0 && $uid != '')
	{
		$link = mysql_connect($global_db_location, $global_db_login_id, $global_db_password);
		if ($link) 
		{
			$db_selected = mysql_select_db($global_db_name, $link);
			if ($db_selected) 
			{
				mysql_query("SET NAMES 'utf8';");
				$result = mysql_query("SELECT cc, cr FROM campaigns WHERE id = $oid AND status = 1 AND TIMESTAMP(start_date, start_time) <= NOW() AND TIMESTAMP(end_date, end_time) >= NOW()");
				if(mysql_num_rows($result) > 0)
				{
					$r2 = mysql_query("SELECT COUNT(*) FROM coupons_released WHERE fb_uid = '$uid' AND oid = $oid");
					$rr2 = mysql_fetch_row($r2);
					
					//if($rr2[0] == 0)
					{
						$row = mysql_fetch_row($result);
						if($row[1] < $row[0])
						{
							$qid = $row[1] + 1;
							mysql_query("UPDATE campaigns SET cr = $qid WHERE id = $oid");
							
							mysql_query("INSERT INTO coupons_released (oid, coupon_id, fb_uid) VALUES ($oid, $qid, $uid)");
							$rid = mysql_insert_id();
						}
					}
					/*
					else
					{
						// user already got the coupon
						$qid = -1;
						$rid = -1;
					}
					*/
				}
			}
		}
		mysql_close($link);
	}
	
	echo $qid.",".$rid;
?>