<?php
if(isset($_REQUEST['recaptcha_response_field']) && isset($_REQUEST['recaptcha_challenge_field']))
{
	$recaptcha_response_field = $_REQUEST['recaptcha_response_field'];
 	$recaptcha_challenge_field = $_REQUEST['recaptcha_challenge_field'];
 
 	require_once('./../lib/recaptcha/recaptchalib.php');
	$publickey = "6LdMMAwAAAAAAMyIgHVbbstu2SvNo8KQGmwwLsok"; // you got this from the signup page		
	$privatekey = "6LdMMAwAAAAAAM3gekq1uldRCZ2U9w0eM_IBYgpu";

		
	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $recaptcha_challenge_field, $recaptcha_response_field);				
	if ($resp->is_valid)
	{
		include_once ('./../inc/config.inc.php');
		include_once ('./../lib/MySQLConnector.php');
		$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
		
		if($connector)
		{
			$connector->Execute("SET NAMES 'utf8';");
			$vcp['hash'] = $recaptcha_challenge_field;
			$vcp['words'] = $recaptcha_response_field;
			if($connector->Insert($vcp, "rvc"))			
				echo "1";
			else
				echo "0";
		}
		else
			echo "0";
	}			
	else
		echo "0";
}
else
{
	echo "0";
}

?>