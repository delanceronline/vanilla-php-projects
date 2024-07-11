<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{
	}else header( "Location: index.php");*/
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$category_id = $_POST['cid'];
	$data = array();
	$data['i_category'] = 0;
	$db_connector->Update($data, "WHERE i_category=$category_id", "product");
	$db_connector->Delete("WHERE ID=$category_id", "product_category");
	header( "Location: list_product_category.php");
	

?>