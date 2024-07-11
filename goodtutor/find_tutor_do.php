<?php
	require('./lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './smarty/templates';
	$smarty->compile_dir = './smarty/templates_c';
	$smarty->cache_dir = './smarty/cache';
	$smarty->config_dir = './smarty/configs';
	

	$client = array();

	$client['contact_name'] = "";
	if(isset($_REQUEST['contact_name']))
		$client['contact_name'] = $_REQUEST['contact_name'];

	$client['contact_no'] = "";
	if(isset($_REQUEST['contact_no']))
		$client['contact_no'] = $_REQUEST['contact_no'];

	$client['service'] = 0;
	if(isset($_REQUEST['service']))
		$client['service'] = $_REQUEST['service'];

	$client['sub_region'] = 0;
	if(isset($_REQUEST['sub_region']))
		$client['sub_region'] = $_REQUEST['sub_region'];




	$client['contact_time'] = "";
	if(isset($_REQUEST['contact_time']))
		$client['contact_time'] = $_REQUEST['contact_time'];

	$client['student_age'] = "";
	if(isset($_REQUEST['student_age']))
		$client['student_age'] = $_REQUEST['student_age'];

	$client['student_gender'] = 0;
	if(isset($_REQUEST['student_gender']))
		$client['student_gender'] = $_REQUEST['student_gender'];


	$client['estate'] = "";
	if(isset($_REQUEST['estate']))
		$client['estate'] = $_REQUEST['estate'];

	$client['service_detail'] = "";
	if(isset($_REQUEST['service_detail']))
		$client['service_detail'] = $_REQUEST['service_detail'];
	
	$client['lesson_count'] = "";
	if(isset($_REQUEST['lesson_count']))
		$client['lesson_count'] = $_REQUEST['lesson_count'];
	
	$client['lesson_length'] = "";
	if(isset($_REQUEST['lesson_length']))
		$client['lesson_length'] = $_REQUEST['lesson_length'];
	
	$client['hour_rate'] = "";
	if(isset($_REQUEST['hour_rate']))
		$client['hour_rate'] = $_REQUEST['hour_rate'];
	
	$client['mq'] = 0;
	if(isset($_REQUEST['mq']))
		$client['mq'] = $_REQUEST['mq'];
	
	$client['mq_detail'] = "";
	if(isset($_REQUEST['mq_detail']))
		$client['mq_detail'] = $_REQUEST['mq_detail'];
	
	$client['tutor_gender'] = 0;
	if(isset($_REQUEST['tutor_gender']))
		$client['tutor_gender'] = $_REQUEST['tutor_gender'];
	
	$client['special_request'] = "";
	if(isset($_REQUEST['special_request']))
		$client['special_request'] = $_REQUEST['special_request'];
		
	$client['know_way'] = 0;
	if(isset($_REQUEST['know_way']))
		$client['know_way'] = $_REQUEST['know_way'];
	

	if($client['contact_name'] != "" && $client['contact_no'] != "" && $client['service'] > 0 && $client['sub_region'] > 0)
	{	
		include_once ('./inc/config.inc.php');
		include_once ('./lib/MySQLConnector.php');
		$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);		
		if($connector)
		{
			include_once ('./lib/TTutor.php');
			$tutor_class = new TTutor();			
			$tutor_class->GetTimeSlotsFromPost($_REQUEST, $client);
			
			$client['creation_date'] = date("Y-m-d H:i:s");
			
			if($connector->Insert($client, "clients"))
			{
				$smarty->display('find_tutor_ok.tpl');
			}
		}		
	}
	
?>