<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{
	}else header( "Location: index.php");*/
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	$type = $_REQUEST['type'];
	$type2 = $_REQUEST['type2'];
	$no = $_GET['ccc'];
	$category_id = $_POST['pid'];
	if($no==1){
	$db_connector->Delete("WHERE ID=$category_id", "client_department");
	$db_connector->Delete("WHERE i_dept=$category_id", "shop_dept");
	header( "Location: list_client_department.php");
	}
	else if($no==0){
	$db_connector->Delete("WHERE ID=$category_id", "shop_dept");
	header( "Location: list_client_department.php?type=$type&type2=$type2");

	}
	
	

?>