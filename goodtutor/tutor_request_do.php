<?php

session_start();

if(!isset($_SESSION['email']))
{
	header("Location: tutor_login.php");
}

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

$ci = 0;
if(isset($_REQUEST['ci']))
	$ci = $_REQUEST['ci'];

$tutor_email = $_SESSION['email'];

$message = "";
if(isset($_REQUEST['message']))
	$message = $_REQUEST['message'];

if(is_numeric($ci))
{
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);		
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		if($connector->GetCount("WHERE i_client = $ci AND tutor_email = '$tutor_email'", "tutor_requests") == 0)
		{		
			$request = array();
			$request['i_client'] = $ci;
			$request['tutor_email'] = $tutor_email;
			$request['message'] = $message;
			$request['creation_date'] = date("Y-m-d H:i:s");
			
			$tutor_info = array();
			if($connector->GetOneRow($tutor_info, "WHERE email = '$tutor_email'", "tutors"))
			{
				$request['i_tutor'] = $tutor_info['id'];
				
				if($connector->Insert($request, "tutor_requests"))
				{
					$smarty->display('tutor_request_ok.tpl');
				}
				else
					$smarty->display('tutor_request_failed.tpl');				
			}
			else
				$smarty->display('tutor_request_failed.tpl');
		}
		else
			$smarty->display('tutor_request_failed.tpl');
	}		
}

?>
