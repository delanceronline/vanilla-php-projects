<?php

	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';
	
	$is_verified = -1;
	if(isset($_REQUEST['is_verified']) && is_numeric($_REQUEST['is_verified']))
		$is_verified = $_REQUEST['is_verified'];

	$smarty->assign('is_verified', $is_verified);

	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
	
		$tutors = array();
		$tutors['id'] = 0;
		$tutors['email'] = '';
		$tutors['pi_gender'] = 0;
		$tutors['is_generated'] = 0;
		$tutors['creation_date'] = '';
		$tutors['is_verified'] = 0;
		
		$condition = "WHERE is_reviewed = 0 AND is_trash = 0";
		if($is_verified > -1)
			$condition .= " AND is_verified = $is_verified";	
		
		$condition .= " ORDER BY creation_date DESC";
		
		$connector->GetRows($tutors, $condition, "tutors");
		
		$smarty->assign('tutors', $tutors);
		$smarty->display('admin_review_new_tutors.tpl');		
	}	

?>