<?php

session_start();

$ci = 0;
if(isset($_REQUEST['ci']))
	$ci = $_REQUEST['ci'];

if(!isset($_SESSION['email']))
{
	header("Location: tutor_login.php?target=".urlencode("tutor_request.php?ci=".$ci));
}



// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';
	
$smarty->assign('ci', $ci);

if(is_numeric($ci) && $ci > 0)
{
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		include_once ('./lib/TCommon.php');
		$common = new TCommon();
		if($common->GetClientDetail($connector, $ci, $data))
		{
			$smarty->assign('client', $data);
			$smarty->display('tutor_request.tpl');			
		}
	}
}
?>