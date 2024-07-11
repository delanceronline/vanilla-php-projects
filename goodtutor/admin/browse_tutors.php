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
		
		$qf_names = array();
		$qf_ids = array();	
		$common->GetEducationLevels($connector, $qf_names, $qf_ids);		
		
		$hm_ids = array();
		$hm_names = array();
		$common->GetHighSchoolMajor($connector, $hm_names, $hm_ids);		
		
		$college_ids = array();
		$college_names = array();
		$common->GetColleges($connector, $college_names, $college_ids);		
		
		$st_ids = array();
		$st_names = array();
		$common->GetServiceTargetsFromDatabase($connector, $st_names, $st_ids);
		
		$sub_region = 0;
		if(isset($_REQUEST['sub_region']) && is_numeric($_REQUEST['sub_region']))
			$sub_region = $_REQUEST['sub_region'];
		
		$region = 0;
		if(isset($_REQUEST['sub_region']))
		{
			if($_REQUEST['sub_region'] == "region1")
				$region = 1;
			else if($_REQUEST['sub_region'] == "region2")
				$region = 2;
			else if($_REQUEST['sub_region'] == "region3")
				$region = 3;			
			else if($_REQUEST['sub_region'] == "region100")
				$region = 100;
		}
		
		$gender = 0;
		if(isset($_REQUEST['gender']) && is_numeric($_REQUEST['gender']))
			$gender = $_REQUEST['gender'];
		
		$aq = 0;
		if(isset($_REQUEST['aq']) && is_numeric($_REQUEST['aq']))
			$aq = $_REQUEST['aq'];
		
		$hs_major = 0;
		if(isset($_REQUEST['hs_major']) && is_numeric($_REQUEST['hs_major']))
			$hs_major = $_REQUEST['hs_major'];
		
		$college = 0;
		if(isset($_REQUEST['college']) && is_numeric($_REQUEST['college']))
			$college = $_REQUEST['college'];		
		
		$st = 0;
		if(isset($_REQUEST['st']) && is_numeric($_REQUEST['st']))
			$st = $_REQUEST['st'];
		
		$smarty->assign('region', $region);
		$smarty->assign('sub_region', $sub_region);
		$smarty->assign('gender', $gender);
		$smarty->assign('aq', $aq);
		$smarty->assign('hs_major', $hs_major);
		$smarty->assign('college', $college);
		$smarty->assign('st', $st);
		
		if($region > 0 || $sub_region > 0 || $gender > 0 || $aq > 0 || $hs_major > 0 || $college > 0 || $st > 0)
		{			
			$tutors = array();
			$tutors_front = array();
			
			if($common->GetTutorsWithConditions($connector, $region, $sub_region, $gender, $aq, $hs_major, $college, $st, -1, -1, $tutors) > 0)
			{
				foreach($tutors as $tutor)
				{
					if($tutor['pi_gender'] == 1)
						$tutor['pi_gender'] = "男";
					else if($tutor['pi_gender'] == 2)
						$tutor['pi_gender'] = "女";
					else
						$tutor['pi_gender'] = "N/A";
					
					foreach($qf_ids as $index => $qf_id)
					{
						if($tutor['aq_el'] == $qf_id)
						{
							$tutor['aq_el'] = $qf_names[$index];
							break;
						}
					}
					
					foreach($college_ids as $index => $college_id)
					{
						if($tutor['aq_college'] == $college_id)
						{
							$tutor['aq_college'] = $college_names[$index];
							break;
						}
					}
					
					$tutors_front[] = $tutor;
				}			
				
				$smarty->assign('tutors', $tutors_front);
			}
		}
		
		$smarty->assign('nt_names', $nt_names);
		$smarty->assign('nt_ids', $nt_ids);
		$smarty->assign('kn_names', $kn_names);
		$smarty->assign('kn_ids', $kn_ids);
		$smarty->assign('hki_names', $hki_names);
		$smarty->assign('hki_ids', $hki_ids);
		$smarty->assign('qf_ids', $qf_ids);
		$smarty->assign('qf_names', $qf_names);
		$smarty->assign('college_ids', $college_ids);
		$smarty->assign('college_names', $college_names);
		$smarty->assign('hm_ids', $hm_ids);
		$smarty->assign('hm_names', $hm_names);
		$smarty->assign('st_ids', $st_ids);
		$smarty->assign('st_names', $st_names);		
		
		$smarty->display('admin_browse_tutors.tpl');
	}
	

?>