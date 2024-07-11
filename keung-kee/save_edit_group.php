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
	$db_connector->GetRows($row, "WHERE ID!={$_POST['ccid']}", "client_group");
	$counter1=0;
	$counter2=0;
	$counter3=0;
	for ($i=0;$i<count($row);$i++)
	{
		if (strtoupper($_POST['textfield3']) == strtoupper($row[$i]['group_code']))
			$counter2=2;
	
	}
	
	if ($counter1==0 && $counter2==0 && $counter3==0)
	{		
		$data = array();
		$data['group_name'] = $_POST['textfield'];
		$data['group_code'] = strtoupper($_POST['textfield3']);
		$data['i_code'] = strtoupper($_POST['textfield2']);
		$db_connector->Update($data, "WHERE ID={$_POST['ccid']}", "client_group");
		header("Location: list_client_group.php");
	}
	else 		
		header("Location: edit_client_group_form.php?is_fail=".$counter1."&is_fail2=".$counter2."&is_fail3=".$counter3."&name=".urlencode($_POST['textfield'])."&code=".$_POST['textfield3']."&i_code=".$_POST['textfield2']."&pcid=".$_POST['ccid']);

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
