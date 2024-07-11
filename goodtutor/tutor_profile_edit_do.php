<?php
	session_start();

	require('./lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './smarty/templates';
	$smarty->compile_dir = './smarty/templates_c';
	$smarty->cache_dir = './smarty/cache';
	$smarty->config_dir = './smarty/configs';
	
	if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];		
		
		unset($_SESSION['email']);		
		session_destroy();		
		
		if($email != "")
		{
			include_once ('./inc/config.inc.php');
			include_once ('./lib/MySQLConnector.php');
			$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
			if($connector)
			{
				$connector->Execute("SET NAMES 'utf8';");
								
				$tutor = array();				
				
				include_once ('./lib/TTutor.php');
				$tutor_class = new TTutor();
				$tutor['si_photo'] = $tutor_class->MoveUploadedTutorPhoto($_FILES['si_photo']);
				
				$tutor_class->GetTutorInfoFromPost($_REQUEST, $tutor);
				$tutor_class->GetSubRegionsFromPost($_REQUEST, $tutor, $connector);
				$tutor_class->GetTimeSlotsFromPost($_REQUEST, $tutor);
				$tutor_class->GetLanguagesFromPost($_REQUEST, $tutor, $connector);
				$tutor_class->GetInstrumentsFromPost($_REQUEST, $tutor, $connector);
				
				$tutor['i_email'] = $email;
				$tutor['modified_date'] = date("Y-m-d H:i:s");
				
				if($connector->Insert($tutor, "tutors_mp") > 0)
				{					
					$smarty->display('tutor_profile_edit_ok.tpl');
				}
				else
					$smarty->display('tutor_profile_edit_failed.tpl');				
			}
			else
				$smarty->display('tutor_profile_edit_failed.tpl');	
		}
		else
			$smarty->display('tutor_profile_edit_failed.tpl');
	}
	else
		$smarty->display('tutor_profile_edit_failed.tpl');
?>