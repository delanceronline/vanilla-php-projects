<?php

	include_once ('./inc/config.inc.php');

	$uid = "";
	if(isset($_POST['uid']))
		$uid = $_POST['uid'];

	$name = "";
	if(isset($_POST['name']))
		$name = $_POST['name'];	
		
	$dui = "";
	if(isset($_POST['dui']))
		$dui = $_POST['dui'];			
			
	$gender = "";
	if(isset($_POST['gender']))
		$gender = $_POST['gender'];	

	$id = 0;
	if($uid != '')
	{
		$id = $uid;
		$link = mysql_connect($global_db_location, $global_db_login_id, $global_db_password);
		if ($link) 
		{
			$db_selected = mysql_select_db($global_db_name, $link);
			if ($db_selected) 
			{
				mysql_query("SET NAMES 'utf8';");
				
				$result = mysql_query("SELECT COUNT(*) FROM users WHERE fb_uid = '$uid'");
				$row = mysql_fetch_row($result);
				if($row[0] == 0)
				{
					$sql = "INSERT INTO users (name, fb_uid, dui, gender) VALUES ('$name', '$uid', '$dui', '$gender')";
					mysql_query($sql);
				}
			}
			
			mysql_close($link);
		}
	}

	echo $id;
?>