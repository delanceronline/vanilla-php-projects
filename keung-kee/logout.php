<?php

	session_start();

	if(isset($_SESSION['login_id']))
	{
		unset($_SESSION['login_id']);
		unset($_SESSION['i_level']);	
		unset($_SESSION['user_code']);			
	}
	
	header("location: login.php");	
?>