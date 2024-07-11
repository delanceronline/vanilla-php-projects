<?php
	/*session_start();
	if((isset($_SESSION['login_id'])) || (isset($_COOKIE['login_id'])))
	{		
	} 
    else  header( "Location: index.php");*/

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

	$bPrintUnit = 0;
	if(isset($_REQUEST['print_unit']))
		$bPrintUnit = 1;
	
	$row4 = array();
	$db_connector->GetOneRow($row4,"WHERE ID={$_POST['select']}", "client_group");
	$aaa = $row4['i_code'].$_POST['textfield3'];

	$row = array();
	$row['client_shop.shop_code'] ="";
	$row['client_group.i_code'] ="";
	$db_connector->JoinGetRows($row, "WHERE client_shop.ID!={$_POST['ppid']} AND client_group.ID=client_shop.i_group", "client_group,client_shop");
	$counter1=0;
	$counter2=0;
	$counter3=0;
	$path="";
	for ($i=0;$i<count($row);$i++)
	{
		$bbb = $row[$i]['client_group.i_code'].$row[$i]['client_shop.shop_code'];
		 if(strtoupper($bbb)==strtoupper($aaa))
		    $counter2=2;
	}
	$row1 = array();
		$db_connector->GetRows($row1,"", "client_department");
	for($k=0; $k<count($row1); $k++){
		if(isset($_REQUEST['dept'.$k]))
			{	
				$path .= "&box".$k."=1";
}
	
	}
	if ($counter1==0 && $counter2==0 && $counter3==0)
	{
		$group_data = array();
		$db_connector->GetOneRow($group_data, "WHERE ID={$_POST['select']}", "client_group");

		$data = array();
		$data['shop_name'] = $_POST['textfield'];
		$data['shop_code'] = strtoupper($_POST['textfield3']);
		$data['i_group'] = $_POST['select'];
		$data['is_unit_printing'] = $bPrintUnit;
		
        if(isset($group_data['i_code']))
            $data['f_code'] = strtoupper($group_data['i_code'].$_POST['textfield3']);
           
		$db_connector->Update($data, "WHERE ID={$_POST['ppid']}", "client_shop");
		
		

		for($k=0; $k<count($row1); $k++){
			
			$row7 = array();
			$rrr = $db_connector->GetOneRow($row7,"WHERE i_dept={$row1[$k]['ID']} AND i_shop={$_POST['ppid']}", "shop_dept");
			
			if(isset($_REQUEST['dept'.$k]) && !$rrr)
			{	
				$row2 = array();
				$row2['i_dept'] = $row1[$k]['ID'];
				$row2['i_shop'] = $_POST['ppid'];
				$db_connector->Insert($row2, "shop_dept");
				
			}
			else if(!isset($_REQUEST['dept'.$k]) && $rrr)
			{
				$db_connector->Delete("WHERE i_dept={$row1[$k]['ID']} AND i_shop={$_POST['ppid']}", "shop_dept");
			}
		}
			
		$type = $_REQUEST['cctype'];
		header( "Location: list_client_shop.php?type=$type");

	}
	else 		
		header("Location: edit_client_shop_form.php?is_fail=".$counter1."&is_fail2=".$counter2."&is_fail3=".$counter3."&name=".urlencode($_POST['textfield'])."&i_code=".$_POST['select']."&code=".$_POST['textfield3']."&type2=".$_REQUEST['cctype']."&cpid=".$_POST['ppid'].$path);

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
