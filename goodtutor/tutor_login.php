<?php
// put full path to Smarty.class.php

session_start();

require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

$email = "";
$message = "";

$target = "";
if(isset($_REQUEST['target']))
	$target = $_REQUEST['target'];

$smarty->assign('target', $target);

if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
{
	$email = $_REQUEST['email'];
	$passcode = $_REQUEST['password'];
	
	$message = "登入資料不正確，請確定識別密碼是正確．";
	
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		if($connector->GetCount("WHERE email = '$email' AND passcode = '$passcode' AND is_reviewed = 1", "tutors") > 0)
		{
			$_SESSION['email'] = $email;			

			if($target == "")
				header("Location: tutor_profile_edit.php");
			else
				header("Location: ".urldecode($target));
		}
	}	
}

$smarty->assign('email', $email);
$smarty->assign('message', $message);

$smarty->display('tutor_login.tpl');

?>