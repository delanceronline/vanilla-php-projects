<?php

session_start();

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';


$email = "";
if(isset($_SESSION['email']))
{
	$email = strtolower($_SESSION['email']);
}

if($email != "")
{
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
	
		$tutor = array();
		if($connector->GetOneRow($tutor, "WHERE email = '$email'", "tutors"))
		{
			$smarty->assign('tutor_id', $tutor['id']);
		
			include_once ('./lib/TCommon.php');
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
			
			$language_ids = array();
			$language_names = array();
			$common->GetLanguages($connector, $language_names, $language_ids);
			
			$instrument_ids = array();
			$instrument_names = array();
			$common->GetInstruments($connector, $instrument_names, $instrument_ids);
			
			$college_ids = array();
			$college_names = array();
			$common->GetColleges($connector, $college_names, $college_ids);			

			$smarty->assign('nt_names', $nt_names);
			$smarty->assign('nt_ids', $nt_ids);
			$smarty->assign('kn_names', $kn_names);
			$smarty->assign('kn_ids', $kn_ids);
			$smarty->assign('hki_names', $hki_names);
			$smarty->assign('hki_ids', $hki_ids);
			$smarty->assign('college_ids', $college_ids);
			$smarty->assign('college_names', $college_names);
			$smarty->assign('qf_ids', $qf_ids);
			$smarty->assign('qf_names', $qf_names);
			$smarty->assign('hm_ids', $hm_ids);
			$smarty->assign('hm_names', $hm_names);
			$smarty->assign('language_ids', $language_ids);
			$smarty->assign('language_names', $language_names);
			$smarty->assign('instrument_ids', $instrument_ids);
			$smarty->assign('instrument_names', $instrument_names);			
		
		
		
		
			$smarty->assign('si_title', $tutor['si_title']);
			$smarty->assign('si_detail', $tutor['si_detail']);
			$smarty->assign('si_photo', $tutor['si_photo']);
			$smarty->assign('si_movie_embed_raw', $tutor['si_movie_embed']);
			$smarty->assign('si_movie_embed', htmlentities($tutor['si_movie_embed']));
			
			
			$smarty->assign('pi_nickname', $tutor['pi_nickname']);
			$smarty->assign('pi_english_name', $tutor['pi_english_name']);
			$smarty->assign('pi_chinese_name', $tutor['pi_chinese_name']);
			$smarty->assign('pi_hkid', $tutor['pi_hkid']);
			$smarty->assign('pi_contact_no', $tutor['pi_contact_no']);
			$smarty->assign('pi_live_region', $tutor['pi_live_region']);
			$smarty->assign('pi_gender', $tutor['pi_gender']);			
			
			$smarty->assign('ec_name', $tutor['ec_name']);
			$smarty->assign('en_contact_no', $tutor['en_contact_no']);
			
			
			$smarty->assign('lt_additional', $tutor['lt_additional']);
			$smarty->assign('tf_detail', $tutor['tf_detail']);
			$smarty->assign('aq_el', $tutor['aq_el']);
			$smarty->assign('aq_college', $tutor['aq_college']);
			
			$smarty->assign('aq_college_others', $tutor['aq_college_others']);
			$smarty->assign('aq_major', $tutor['aq_major']);
			$smarty->assign('aq_hs_major', $tutor['aq_hs_major']);
			$smarty->assign('aq_professional', $tutor['aq_professional']);
			$smarty->assign('aq_hkcee_mark', $tutor['aq_hkcee_mark']);
			$smarty->assign('aq_tutor_year', $tutor['aq_tutor_year']);
			$smarty->assign('pe_result_detail', $tutor['pe_result_detail']);
			
			// sub regions
			$tr_region_sets = array();
			$tr_regions_nt_selected = array();
			$tr_regions_kn_selected = array();
			$tr_regions_hki_selected = array();			
			$common->GetTeachingRegionSets($tutor['tr_region_sets'], $tutor['tr_regions_nt'], $tutor['tr_regions_kn'], $tutor['tr_regions_hki'], $nt_ids, $kn_ids, $hki_ids, $tr_region_sets, $tr_regions_nt_selected, $tr_regions_kn_selected, $tr_regions_hki_selected);

			$smarty->assign('tr_region_sets', $tr_region_sets);
			$smarty->assign('tr_regions_nt_selected', $tr_regions_nt_selected);
			$smarty->assign('tr_regions_kn_selected', $tr_regions_kn_selected);			
			$smarty->assign('tr_regions_hki_selected', $tr_regions_hki_selected);

			// time slots
			$is_all = 0;
			$days_selected = array();
			$common->GetDays($tutor['tt_days'], $tutor['tt_slots'], $is_all, $days_selected);
			$smarty->assign('is_all_day', $is_all);
			$smarty->assign('days_selected', $days_selected);			
			
			// service targets
			$service_targets = array();
			$common->GetServiceTargets($tutor['service_targets'], $service_targets);
			for($i = 1; $i <= 5; $i++)
				$smarty->assign('st_'.$i, $service_targets['st_'.$i]);
			
			
			// languages
			$languages = explode("-", $tutor['languages']);
			$languages_selected = array();
			foreach($language_ids as $id)
			{
				if(array_search($id, $languages) !== FALSE)
					$languages_selected[] = 1;
				else
					$languages_selected[] = 0;
			}
			$smarty->assign('languages_selected', $languages_selected);
		
			// instruments
			$instruments = explode("-", $tutor['instruments']);
			$instruments_selected = array();
			foreach($instrument_ids as $id)
			{
				if(array_search($id, $instruments) !== FALSE)
					$instruments_selected[] = 1;
				else
					$instruments_selected[] = 0;
			}
			$smarty->assign('instruments_selected', $instruments_selected);
			
			$smarty->display('tutor_profile_edit.tpl');			
		}
	}
}
?>