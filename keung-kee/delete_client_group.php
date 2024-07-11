<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{
	}else header( "Location: index.php");*/
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$category_id = $_POST['cid'];
	
	$data3 = array();
	$db_connector->GetOneRow($data3, "WHERE i_group=$category_id", "client_shop");
	$aaa = $data3['ID'];
	
	$data = array();
	$data['i_group'] = 0;
	$db_connector->Update($data, "WHERE i_group=$category_id", "client_shop");
	
	$data2 = array();
	$data2['i_shop'] = 0;
	$db_connector->Update($data, "WHERE i_shop=$aaa", "shop_dept");
	
	/*
	$data4 = array();
	$data4['i_group'] = 0;
	$db_connector->Update($data4, "WHERE i_group=$category_id", "price");
*/
	$db_connector->Delete("WHERE i_group=$category_id", "price");

	$db_connector->Delete("WHERE ID=$category_id", "client_group");
	
	header( "Location: list_client_group.php");
	

?>