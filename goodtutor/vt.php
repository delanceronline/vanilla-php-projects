<?php
	require('./lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './smarty/templates';
	$smarty->compile_dir = './smarty/templates_c';
	$smarty->cache_dir = './smarty/cache';
	$smarty->config_dir = './smarty/configs';


	$ti = "";
	if(isset($_REQUEST['ti']))
		$ti = $_REQUEST['ti'];

	$code = "";
	if(isset($_REQUEST['code']))
		$code = $_REQUEST['code'];
	
	$bSuccess = 0;
	
	if($ti != "" && $code != "")
	{
		include_once ('./inc/config.inc.php');
		include_once ('./lib/MySQLConnector.php');
		$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
		if($connector)
		{
			$vt = array();
			if($connector->GetOneRow($vt, "WHERE ti_md5 = '$ti' AND code = '$code'", "vt_hash"))
			{
				$tutor_info['is_verified'] = 1;
				if($connector->Update($tutor_info, "WHERE id = {$vt['i_tutor']}", "tutors"))
				{				
					$vt_info['is_verified'] = 1;
					if($connector->Update($vt_info, "WHERE id = {$vt['id']}", "vt_hash"))
					{
						$bSuccess = 1;
						$smarty->display('vt_ok.tpl');
					}
				}
			}
		}
	}
	
	if($bSuccess == 0)
		$smarty->display('vt_failed.tpl');
?>
