<?php
	session_start();
	
	$user_id = "";	
	if((isset($_SESSION['login_id'])))
		$user_id = $_SESSION['login_id'];
	else if(isset($_COOKIE['login_id']))
		$user_id = $_COOKIE['login_id'];
	else
    	header( "Location: index.php");
	

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$price_count = $_REQUEST['price_count'];
	if($price_count > 0)
	{
		for($i = 0; $i < $price_count; $i++)
		{
			if($_REQUEST['edited'.$i] == 1)
			{			
				$pi = $_REQUEST['pi'.$i];
				$price = $_REQUEST['price'.$i];
				$unit = $_REQUEST['unit'.$i];
				
				$data['price'] = $price;
				$data['unit'] = $unit;
				$data['edit_by'] = $user_id;
				$data['last_edit_time'] = date('Y-m-d H:i:s');
							
				$db_connector->Update($data, "WHERE ID = $pi", "price");
			}
		}
	}
	
	/*
	$row2 = array();
	$db_connector->GetOneRow($row2, "WHERE ID={$_REQUEST['hidden6']}", "product");
	
	$row3 = array();
	$db_connector->GetRows($row3, "WHERE i_category={$row2['i_category']}", "product");

	for($i=0;$i<count($row3);$i++)
	{
		$row = array();
		$aaa = $db_connector->GetRows($row, "WHERE i_product={$_REQUEST['haha'.$i]} AND i_group={$_REQUEST['hidden7']}", "price");
	
		if($aaa)
		{	
			if($_REQUEST['textfield'.$i]!="") 
			{
				$data = array();
				$data['price'] = $_REQUEST['textfield'.$i];
				$data['unit'] = $_REQUEST['select'.$i];
				$data['i_product'] = $_REQUEST['haha'.$i];
				$data['i_group'] = $_REQUEST['hidden7'];
				$data['edit_by'] = $user_id;
				$data['last_edit_time'] = date('Y-m-d H:i:s');
				$db_connector->Update($data, "WHERE i_product={$_REQUEST['haha'.$i]} AND i_group={$_REQUEST['hidden7']}", "price");
			}
			else 
				$db_connector->Delete("WHERE i_product={$_REQUEST['haha'.$i]} AND i_group={$_REQUEST['hidden7']}", "price");
		}
		else 
		{
			if($_REQUEST['textfield'.$i]!="") 
			{
				$data = array();
				$data['price'] = $_REQUEST['textfield'.$i];
				$data['unit'] = $_REQUEST['select'.$i];
				$data['i_product'] = $_REQUEST['haha'.$i];
				$data['i_group'] = $_REQUEST['hidden7'];
				$data['edit_by'] = $user_id;
				$data['last_edit_time'] = date('Y-m-d H:i:s');
				$db_connector->Insert($data, "price");
			}
		}
	}
	*/
	
//header("location : product_price_unit_setting.php?finish=1");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
    </head>
    <body>
    <br /><br />
    <p>貨品清單已被儲存．</p>
    <p><a href="main.php">按此返回主頁</a></p>
    </body>
</html>