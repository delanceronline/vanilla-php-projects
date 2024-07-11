<?php

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

$id = 0;
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
	$id = $_REQUEST['id'];
	
if($id > 0)
{
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		include_once ('./lib/TTutor.php');
		$tutor_class = new TTutor();
				
		$tutor = array();
		$tutor_class->GetTutorDetailPublic($connector, $id, $tutor);
		
		$smarty->assign('tutor', $tutor);
		$smarty->display('tutor_detail.tpl');
	}	
}

?>