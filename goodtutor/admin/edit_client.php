<?php
	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';

	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		$id = 0;
		if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
			$id = $_REQUEST['id'];
		
		$action = 0;
		if(isset($_REQUEST['action']) && is_numeric($_REQUEST['action']))
			$action = $_REQUEST['action'];
		
		if($id > 0)
		{
			if($action == 1)
			{
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
					
				include_once ('./../lib/TTutor.php');
				$tutor_class = new TTutor();			
				$tutor_class->GetTimeSlotsFromPost($_REQUEST, $client);
				
				if($connector->Update($client, "WHERE id = $id", "clients"))
				{
					$smarty->display('admin_edit_client_ok.tpl');
				}
			}
			else
			{
				$client = array();
				if($connector->GetOneRow($client, "WHERE id = $id", "clients"))
				{
					include_once ('./../lib/TCommon.php');
					$common = new TCommon();
					
					$nt_names = array();
					$nt_ids = array();	
					$common->GetSubRegions($connector, 1, $nt_names, $nt_ids);
				
					$kn_names = array();
					$kn_ids = array();
					$common->GetSubRegions($connector, 2, $kn_names, $kn_ids);
					
					$hki_names = array();
					$hki_ids = array();
					$common->GetSubRegions($connector, 3, $hki_names, $hki_ids);
						
					$qf_ids = array();
					$qf_names = array();	
					$common->GetEducationLevels($connector, $qf_names, $qf_ids);
					
					$service_ids = array();
					$service_names = array();
					$common->GetServices($connector, $service_names, $service_ids);	
	
	
					$timeslots = array();
					$is_all_time = 0;					
					if($client['tt_slots'] != '')
						$is_all_time = $common->TranslateTimeSlots($client['tt_slots'], $timeslots);
					else if($client['tt_days'] != '')
						$is_all_time = $common->TranslateDaySlots($client['tt_days'], $timeslots);
					
					$smarty->assign('is_all_time', $is_all_time);
					$smarty->assign('timeslots', $timeslots);
	
	
					$smarty->assign('nt_names', $nt_names);
					$smarty->assign('nt_ids', $nt_ids);
					$smarty->assign('kn_names', $kn_names);
					$smarty->assign('kn_ids', $kn_ids);
					$smarty->assign('hki_names', $hki_names);
					$smarty->assign('hki_ids', $hki_ids);
					$smarty->assign('qf_ids', $qf_ids);
					$smarty->assign('qf_names', $qf_names);
					$smarty->assign('service_ids', $service_ids);
					$smarty->assign('service_names', $service_names);				
	
					$smarty->assign('client', $client);			
					$smarty->display('admin_edit_client.tpl');
				}
			}
		}
	}	
?>