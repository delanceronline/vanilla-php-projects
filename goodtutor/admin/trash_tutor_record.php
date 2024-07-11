<?php

	// put full path to Smarty.class.php
	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';

	$id = 0;
	if(isset($_REQUEST['id']))
		$id = $_REQUEST['id'];

	if($id > 0)
	{
		include_once ('./../inc/config.inc.php');
		include_once ('./../lib/MySQLConnector.php');
		$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
		if($connector)
		{
			$tutor['is_trash'] = 1;
			if($connector->Update($tutor, "WHERE id = $id", "tutors"))
			{
				$smarty->display('admin_trash_tutor_record.tpl');
			}
		}
	}
?>