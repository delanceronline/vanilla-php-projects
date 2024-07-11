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
	$db_connector->GetRows($row, "WHERE ID!={$_POST['ppid']} AND i_category={$_POST['select']}", "product");
	$counter1=0;
	$counter2=0;
	for ($i=0;$i<count($row);$i++)
	{
		if (strtoupper($_POST['textfield3']) == strtoupper($row[$i]['product_code']))
			$counter2=2;
	}

	if ($counter1==0 && $counter2==0)
	{
		$category_data = array();
		$db_connector->GetOneRow($category_data, "WHERE ID={$_POST['select']}", "product_category");
		
		$data = array();
		$data['product_name'] = $_POST['textfield'];
		$data['product_code'] = strtoupper($_POST['textfield3']);
		$data['i_category'] = $_POST['select'];
		$data['f_code'] = strtoupper($category_data['i_code'].$_POST['textfield3']);
		$db_connector->Update($data, "WHERE ID={$_POST['ppid']}", "product");
			
		$type = $_REQUEST['cctype'];
		header( "Location: list_product.php?type=$type");

	}
	else 		
		header("Location: edit_product_form.php?is_fail=".$counter1."&is_fail2=".$counter2."&name=".urlencode($_POST['textfield'])."&code=".$_POST['textfield3']."&i_code=".$_POST['select']."&type2=".$_REQUEST['cctype']."&cpid=".$_POST['ppid']);

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
