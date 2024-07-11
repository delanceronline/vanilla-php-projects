<?php
	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';
	

	$case = 0;
	if(isset($_REQUEST['case']) && is_numeric($_REQUEST['case']))
		$case = $_REQUEST['case'];

	$is_generated = 0;
	if(isset($_REQUEST['is_generated']) && is_numeric($_REQUEST['is_generated']))
		$is_generated = $_REQUEST['is_generated'];


	$smarty->assign('case', $case);
	$smarty->assign('is_generated', $is_generated);
	
	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$action = 0;
		if(isset($_REQUEST['action']) && is_numeric($_REQUEST['action']))
			$action = $_REQUEST['action'];

		$id = 0;
		if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
			$id = $_REQUEST['id'];	
	
		if($action > 0 && $id > 0)
		{
			$request['is_archived'] = 1;
			$connector->Update($request, "WHERE id = $id", "tutor_requests");
		}
		

		$client_ids = array();
		
		if($case == 0)
			$sql = "SELECT DISTINCT clients.id FROM clients, tutor_requests WHERE tutor_requests.i_client = clients.id AND clients.is_generated = $is_generated AND tutor_requests.is_archived = 0 ORDER BY tutor_requests.i_client ASC";		
		else if($case > 0)
			$sql = "SELECT DISTINCT clients.id FROM clients, tutor_requests WHERE tutor_requests.i_client = $case AND tutor_requests.i_client = clients.id AND clients.is_generated = $is_generated AND tutor_requests.is_archived = 0";
		
		$result = $connector->Execute($sql);		
		if($result)
		{
			while($row = mysql_fetch_array($result))
				$client_ids[] = $row[0];
		}		
		$smarty->assign('client_ids', $client_ids);
		
		
		$requests = array();
		foreach($client_ids as $client_id)
		{
			$raws = array();			
			if($connector->GetRows($raws, "WHERE is_archived = 0 AND i_client = $client_id ORDER BY i_client ASC", "tutor_requests") > 0)
			{
				foreach($raws as $raw)
				{
					$requests[] = $raw;
				}
			}
		}
		
		$smarty->assign('requests', $requests);
		$smarty->display('admin_tutor_requests.tpl');		
	}	
?>