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
	$db_connector->GetRows($row, "WHERE ID!={$_POST['ccid']}", "product_category");
	$counter1=0;
	$counter2=0;
	$counter3=0;
	for ($i=0;$i<count($row);$i++)
	{
		if (strtoupper($_POST['category_code']) == strtoupper($row[$i]['category_code']))
			$counter2=2;
		if (strtoupper($_POST['i_code']) == strtoupper($row[$i]['i_code']))
			$counter3=3;	
	}
	
	if ($counter1==0 && $counter2==0 && $counter3==0)
	{		
		$data = array();
		$data['category_name'] = $_POST['category_name'];
		$data['category_code'] = strtoupper($_POST['category_code']);
		$data['i_code'] = strtoupper($_POST['i_code']);
		$db_connector->Update($data, "WHERE ID={$_POST['ccid']}", "product_category");
		header("Location: list_product_category.php");
	}
	else 		
		header("Location: edit_product_category_form.php?is_fail=".$counter1."&is_fail2=".$counter2."&is_fail3=".$counter3."&name=".urlencode($_POST['category_name'])."&code=".$_POST['category_code']."&i_code=".$_POST['i_code']."&pcid=".$_POST['ccid']);

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
