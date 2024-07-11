<?php
	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';	

	$service = 0;
	if(isset($_REQUEST['service']) && is_numeric($_REQUEST['service']))
		$service = $_REQUEST['service'];	

	$smarty->assign('service', $service);
	
	$is_reviewed = -1;
	if(isset($_REQUEST['is_reviewed']) && is_numeric($_REQUEST['is_reviewed']))
		$is_reviewed = $_REQUEST['is_reviewed'];		

	$smarty->assign('is_reviewed', $is_reviewed);

	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
	
		$services = array();
		$service_ids = array();
		$service_names = array();
		if($connector->GetRows($services, "WHERE id > 0 ORDER BY display_order ASC", "services") > 0)
		{
			foreach($services as $value)
			{
				$service_names[] = $value['name'];
				$service_ids[] = $value['id'];
			}	
		}		
		$smarty->assign('service_ids', $service_ids);
		$smarty->assign('service_names', $service_names);
		
		$smarty->assign('is_reviewed_ids', array(1, 0));
		$smarty->assign('is_reviewed_names', array('是', '否'));

		
		$action = 0;
		if(isset($_REQUEST['action']) && is_numeric($_REQUEST['action']))
			$action = $_REQUEST['action'];
		
		$ci = 0;
		if(isset($_REQUEST['ci']) && is_numeric($_REQUEST['ci']))
			$ci = $_REQUEST['ci'];
		
		if($action > 0 && $ci > 0)
		{			
			if($action == 1)
			{
				$info['is_reviewed'] = 1;
				$connector->Update($info, "WHERE id = $ci", "clients");
			}
			else if($action == 2)
			{
				$info['is_drawn'] = 1;
				$connector->Update($info, "WHERE id = $ci", "clients");			
			}
			else if($action == 3)
			{
				$info['is_trash'] = 1;
				$connector->Update($info, "WHERE id = $ci", "clients");			
			}
		}
		

		$condition = "WHERE is_generated = 0 AND is_trash = 0";
		if($service > 0)
			$condition .= " AND service = $service";
		if($is_reviewed > -1)
			$condition .= " AND is_reviewed = $is_reviewed";
		
		$clients = array();
		$connector->GetRows($clients, $condition, "clients");
		$smarty->assign('clients', $clients);

		$smarty->display('admin_manage_clients.tpl');
	}
?>