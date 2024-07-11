<?php

	require('./../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './../smarty/templates';
	$smarty->compile_dir = './../smarty/templates_c';
	$smarty->cache_dir = './../smarty/cache';
	$smarty->config_dir = './../smarty/configs';
	
	if(isset($_REQUEST['tutor_id']))
	{
		$tutor_id = $_REQUEST['tutor_id'];
		
		if($tutor_id > 0)
		{
			include_once ('./../inc/config.inc.php');
			include_once ('./../lib/MySQLConnector.php');
			$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
			if($connector)
			{
				$connector->Execute("SET NAMES 'utf8';");
				
				$info['is_reviewed'] = 1;				
				if($connector->Update($info, "WHERE id = $tutor_id", "tutors"))
				{
					$tutor = array();
					if($connector->GetOneRow($tutor, "WHERE id = $tutor_id", "tutors"))
					{
						include_once ('./../lib/TCommon.php');
						$common = new TCommon();				
						$common->SendTutorActivationEmail($tutor['email'], $tutor['passcode']);
					}
				
					$smarty->display('admin_review_new_tutor_detail_ok.tpl');
				}
			}
		}
	}

?>