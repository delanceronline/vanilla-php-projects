<?php

	session_start();
	
	if(isset($_POST['login_id']) && isset($_POST['password']))
	{
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$data = array();
		$db_connector->GetRows($data, "", "member");
		
		for($k=0;$k<count($data);$k++) {
		if($_POST['login_id'] == $data[$k]['name'] && $_POST['password'] == $data[$k]['password'])
		{
			$_SESSION['login_id'] = $data[$k]['name'];
			$_SESSION['i_level'] =  $data[$k]['i_level'];
			$_SESSION['user_code'] = $data[$k]['ID'];
			
			header("location: main.php?reload_left=1");
		}
		else
			header("location: login.php?is_fail=1&name=".urlencode($_POST['login_id']));
		}	
	}
	else	
		header("location: login.php");
?>