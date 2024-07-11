<?php
	require('./lib/Smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = './smarty/templates';
	$smarty->compile_dir = './smarty/templates_c';
	$smarty->cache_dir = './smarty/cache';
	$smarty->config_dir = './smarty/configs';


	$email = "";
	if(isset($_REQUEST['email']))
		$email = strtolower($_REQUEST['email']);

	include_once ('./lib/TTutor.php');
	$tutor_class = new TTutor();
	$si_photo = $tutor_class->MoveUploadedTutorPhoto($_FILES['si_photo']);	
	
	$passcode = md5(time().uniqid());
	
	include_once ('./inc/config.inc.php');
	include_once ('./lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		$rrf = "";
		if(isset($_REQUEST['recaptcha_response_field']))
			$rrf = $_REQUEST['recaptcha_response_field'];

		$rcf = "";
		if(isset($_REQUEST['recaptcha_challenge_field']))
			$rcf = $_REQUEST['recaptcha_challenge_field'];		
		
		if($email != "" && $connector->GetCount("WHERE email = '$email' AND is_verified = 1", "tutors") == 0 && $connector->GetCount("WHERE hash = '$rcf' AND words = '$rrf'", "rvc") > 0)
		{
			$tutor = array();
			$tutor['email'] = $email;
			$tutor['passcode'] = $passcode;
			$tutor['si_photo'] = $si_photo;

			if(isset($_REQUEST['is_generated']) && $_REQUEST['is_generated'] == 1)
				$tutor['is_generated'] = 1;
			
			$tutor_id = $connector->Insert($tutor, "tutors");
			if($tutor_id > 0)
			{
				$tutor_class->GetTutorInfoFromPost($_REQUEST, $tutor);				
				$tutor_class->GetSubRegionsFromPost($_REQUEST, $tutor, $connector);
				$tutor_class->GetTimeSlotsFromPost($_REQUEST, $tutor);
				$tutor_class->GetLanguagesFromPost($_REQUEST, $tutor, $connector);				
				$tutor_class->GetInstrumentsFromPost($_REQUEST, $tutor, $connector);				
				$tutor['creation_date'] = date("Y-m-d H:i:s");
				$tutor['modified_date'] = $tutor['creation_date'];
				
				if($connector->Update($tutor, "WHERE id = $tutor_id", "tutors"))
				{
					include_once ('./lib/TCommon.php');
					$common = new TCommon();
					$common->VerifyTutorByEmail($connector, $tutor_id, $email, $passcode);
					
					$smarty->display('tutor_register_ok.tpl');
				}
				else
					$smarty->display('tutor_register_failed.tpl');	
			}
			else
			{
				$smarty->display('tutor_register_failed.tpl');
			}
		}
	}	

	function IsValidEmail($email)
	{
		return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
	}
?>