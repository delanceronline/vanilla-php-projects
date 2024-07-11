<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

	$invoices = array();
	$db_connector->GetRows($invoices, "WHERE ID > 0", "invoice");
	
	foreach($invoices as $invoice)
	{
		$data = array();		
		if($db_connector->GetOneRow($data, "WHERE f_code = '{$invoice['shop_f_code']}'", "client_shop"))
		{
			$update = array();
			$update['group_id'] = $data['i_group'];
			$db_connector->Update($update, "WHERE ID = {$invoice['ID']}", "invoice");
		}				
	}
		
/*
	$products = array();
	$products['ID'] = 0;
	$products['product_code'] = "";
	$products['i_category'] = 0;
	$count = $db_connector->GetRows($products, "WHERE ID > 0", "product");

	foreach($products as $product)
	{
		$catgeory_data = array();
		$db_connector->GetOneRow($catgeory_data, "WHERE ID = {$product['i_category']}", "product_category");
		
		$update_data = array();		
		$update_data['f_code'] = $catgeory_data['i_code'].$product['product_code'];

		echo $product['ID']."<br>";

		$db_connector->Update($update_data, "WHERE ID = {$product['ID']}", "product");
	}
	*/
?>
<body>
</body>
</html>
