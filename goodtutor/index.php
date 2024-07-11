<?php

// put full path to Smarty.class.php
require('./lib/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

$ri = 0;
if(isset($_REQUEST['ri']))
	$ri = intval($_REQUEST['ri']);

if($ri <= 0 || $ri > 3)
	$ri = 1;

$smarty->assign('ri', $ri);

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

	$featured_tutors = array();
	$common->GetFeaturedTutors($connector, $featured_tutors, 10);
	$smarty->assign('featured_tutors', $featured_tutors);

	$clients = array();
	$common->GetClientListing($connector, $ri, 0, 10, $clients);
	$smarty->assign('clients', $clients);	


	$smarty->assign('nt_names', $nt_names);
	$smarty->assign('nt_ids', $nt_ids);
	$smarty->assign('kn_names', $kn_names);
	$smarty->assign('kn_ids', $kn_ids);
	$smarty->assign('hki_names', $hki_names);
	$smarty->assign('hki_ids', $hki_ids);
	$smarty->assign('service_ids', $service_ids);
	$smarty->assign('service_names', $service_names);	
}

$smarty->display('index.tpl');

?>