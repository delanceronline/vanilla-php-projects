<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{
	}else header( "Location: index.php");*/
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$product_id = $_POST['pid'];
	$db_connector->Delete("WHERE ID = $product_id", "product");
	$db_connector->Delete("WHERE i_product = $product_id", "price");
	
	$type = $_POST['ctype'];
	header( "Location: list_product.php?type=$type");
	

?>