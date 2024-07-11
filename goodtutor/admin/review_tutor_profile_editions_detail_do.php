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
				
				$tutor_mp = array();
				if($connector->GetOneRow($tutor_mp, "WHERE id = $tutor_id", "tutors_mp"))
				{
					$email = $tutor_mp['i_email'];
					unset($tutor_mp['i_email']);
					unset($tutor_mp['id']);
										
					if($tutor_mp['si_photo'] != "")
					{
						$tutor_org = array();
						if($connector->GetOneRow($tutor_org, "WHERE email = '$email'", "tutors"))
						{
							if($tutor_org['si_photo'] != "")
							{
								unlink("./../tutor_photos/s_".$tutor_org['si_photo']);
								unlink("./../tutor_photos/".$tutor_org['si_photo']);
							}
						}
					}
					else
					{
						unset($tutor_mp['si_photo']);
					}
					
					if($connector->Update($tutor_mp, "WHERE email = '$email'", "tutors"))
					{
						if($connector->Delete("WHERE id = $tutor_id", "tutors_mp"))
							$smarty->display('admin_review_tutor_profile_editions_detail_ok.tpl');					
					}					
				}
			}
		}
	}

?>