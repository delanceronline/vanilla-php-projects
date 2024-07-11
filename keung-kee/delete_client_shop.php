<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{
	}else header( "Location: index.php");*/
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$category_id = $_POST['pid'];
	$db_connector->Delete("WHERE i_shop=$category_id", "shop_dept");
	$db_connector->Delete("WHERE ID=$category_id", "client_shop");
	$type = $_POST['ctype'];
	header( "Location: list_client_shop.php?type=$type");

	

?>