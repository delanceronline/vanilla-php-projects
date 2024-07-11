<?php

	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';
	
	$action = 0;
	if(isset($_REQUEST['action']) && is_numeric($_REQUEST['action']))
		$action = $_REQUEST['action'];
	
	$id = 0;
	if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
		$id = $_REQUEST['id'];
	
	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		if($action > 0 && $id > 0)
		{
			if($action == 1)
			{
				$mp_info['is_trash'] = 1;
				$connector->Update($mp_info, "WHERE id = $id", "tutors_mp");
			}	
		}	
	
		$tutors = array();
		
		$tutors['id'] = 0;
		$tutors['i_email'] = '';
		$tutors['pi_gender'] = 0;
		$tutors['modified_date'] = '';		
		
		$connector->GetRows($tutors, "WHERE id > 0 AND is_trash = 0 ORDER BY modified_date DESC", "tutors_mp");
		$smarty->assign('tutors', $tutors);
		$smarty->display('admin_review_tutor_profile_editions.tpl');		
	}	

?>