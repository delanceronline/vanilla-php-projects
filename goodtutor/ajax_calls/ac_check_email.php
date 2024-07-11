<?php
if(isset($_REQUEST['email']))
{
	$email = strtolower($_REQUEST['email']);
 
    include_once ('./../inc/config.inc.php');
    include_once ('./../lib/MySQLConnector.php');
    $connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
    if($connector)
    {
		$connector->Execute("SET NAMES 'utf8';");
    	if(IsValidEmail($email) && $connector->GetCount("WHERE email = '$email' AND is_verified = 1", "tutors") == 0)
        	echo "1";
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

function IsValidEmail($email)
{
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}
?>