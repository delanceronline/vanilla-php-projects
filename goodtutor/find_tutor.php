<?php

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';


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
		
	$qf_ids = array();
	$qf_names = array();	
	$common->GetEducationLevels($connector, $qf_names, $qf_ids);
	
	$service_ids = array();
	$service_names = array();
	$common->GetServices($connector, $service_names, $service_ids);	
	

	if(isset($_REQUEST['sf_contact_name']))
		$smarty->assign('contact_name', $_REQUEST['sf_contact_name']);	

	if(isset($_REQUEST['sf_contact_no']))
		$smarty->assign('contact_no', $_REQUEST['sf_contact_no']);	
	
	if(isset($_REQUEST['sf_sub_region']))
		$smarty->assign('sub_region', $_REQUEST['sf_sub_region']);	

	if(isset($_REQUEST['sf_service']))
		$smarty->assign('service', $_REQUEST['sf_service']);
	
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
	
	$smarty->display('find_tutor.tpl');
}
?>