<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("include/users_variables.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
$t_captcha="";
$email="";
$password="";
$userName="";
$field = postvalue('field');
$val = postvalue('val');
if($field == 'login')
	$userName = $val;
else if($field == 'password')
	$password = $val;
else if($field == 'email')
	$email = $val;
else if($field == 'captcha')
	$t_captcha = $val;

if(strlen($t_captcha) && @strtolower($t_captcha)!=strtolower(@$_SESSION["captcha"]))
	echo mlang_message("SEC_INVALID_CAPTCHA_CODE");

//	check if entered username already exists
if(strlen($userName))
{
	$strSQL="select count(*) from `users` where `login`=".add_db_quotes("login",$userName);
   	$rs=db_query($strSQL,$conn);
	$data=db_fetch_numarray($rs);
	if($data[0]>0)
		echo mlang_message("USERNAME_EXISTS1")." <i>".$userName."</i> ".mlang_message("USERNAME_EXISTS2");
}


	if(strlen($password) && !checkpassword($password))
	{
		$msg="";
		$fmt=mlang_message("SEC_PWD_LEN");
		$fmt=str_replace("%%","8",$fmt);
		$msg.="<br>".$fmt;
		if($msg)
			$msg=substr($msg,4);
		echo $msg;
	}

?>