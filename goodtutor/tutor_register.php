<?php
// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';


require_once('./lib/recaptcha/recaptchalib.php');
$publickey = "6LdMMAwAAAAAAMyIgHVbbstu2SvNo8KQGmwwLsok"; // you got this from the signup page		
$privatekey = "6LdMMAwAAAAAAM3gekq1uldRCZ2U9w0eM_IBYgpu";

$recaptcha = recaptcha_get_html($publickey);


include_once ('./inc/config.inc.php');
include_once ('./lib/MySQLConnector.php');
$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
if($connector)
{
	$connector->Execute("SET NAMES 'utf8';");
	
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
	
	$service_ids = array();
	$service_names = array();
	$common->GetServices($connector, $service_names, $service_ids);	
	
	
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
	$smarty->assign('service_ids', $service_ids);
	$smarty->assign('service_names', $service_names);
	
	
	$smarty->assign('recaptcha', $recaptcha);
	
	if(isset($_REQUEST['is_generated']) && $_REQUEST['is_generated'] == 1)
		$smarty->assign('is_generated', 1);
	else
		$smarty->assign('is_generated', 0);	
	
	$smarty->display('tutor_register.tpl');
}
?>