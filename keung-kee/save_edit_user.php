<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{		
	} 
    else  header( "Location: index.php");*/

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

	$row = array();
	$db_connector->GetRows($row, "WHERE ID!={$_REQUEST['ccid']}", "member");
	$counter1=0;
	$counter2=0;
	
	for ($i=0;$i<count($row);$i++)
	{
		if (strtoupper($_REQUEST['textfield']) == strtoupper($row[$i]['name']))
			$counter1=1;		
	}

		if($_REQUEST['textfield3']!=$_REQUEST['textfield2'])
		$counter2=2;
	
	if ($counter1==0 && $counter2==0 && $counter3==0)
	{		
		$data = array();
		$data['name'] = $_REQUEST['textfield'];
		$data['password'] = $_REQUEST['textfield3'];
		$data['i_level'] = $_REQUEST['radio1'];
		$db_connector->Update($data, "WHERE ID={$_REQUEST['ccid']}", "member");
		header("Location: list_user.php");
	}
	else 		
		header("Location: edit_user_form.php?is_fail=".$counter1."&is_fail2=".$counter2."&name=".urlencode($_REQUEST['textfield'])."&level=".$_REQUEST['radio1']."&code=".$_REQUEST['textfield3']."&code2=".$_REQUEST['textfield2']."&pcid=".$_REQUEST['ccid']);

?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
