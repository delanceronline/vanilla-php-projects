<?php

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

$action = 0;
if(isset($_REQUEST['action']) && is_numeric($_REQUEST['action']))
	$action = $_REQUEST['action'];

$email = "";
if(isset($_REQUEST['email']))
	$email = strtolower($_REQUEST['email']);

if($action > 0 && $email != '')
{
	$bOk = 0;

	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);		
	if($connector)
	{
		$tutor = array();
		if($connector->GetOneRow($tutor, "WHERE email = '$email' AND is_reviewed = 1 AND is_verified = 1", "tutors"))
		{
			$tutor_info['passcode'] = md5(uniqid());			
			if($connector->Update($tutor_info, "WHERE id = {$tutor['id']}", "tutors"))
			{
				$bOk = 1;
				
				$smarty->assign('email', $email);
				$smarty->display('reset_passcode_ok.tpl');
				
				include_once ('./lib/TCommon.php');
				$common = new TCommon();
				$common->SendPasscodeResetEmail($email, $tutor_info['passcode']);				
			}
		}
	}
	
	if($bOk == 0)
		$smarty->display('reset_passcode.tpl');
}
else
{
	$smarty->display('reset_passcode.tpl');
}

?>