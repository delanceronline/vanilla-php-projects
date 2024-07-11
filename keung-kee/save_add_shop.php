<?php 
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$type = $_POST['type'];
		$name = $_POST['name'];
		$code = $_POST['code'];
		$row = array();
		$db_connector->GetOneRow($row,"WHERE ID={$_POST['type']}", "client_group");
		$aaa = $row['i_code'].$code;
		
		$data = array();
		$data['client_shop.shop_code'] ="";
		$data['client_group.i_code'] ="";
		$db_connector->JoinGetRows($data, "WHERE client_group.ID=client_shop.i_group", "client_group,client_shop");
		$count1 =0;
		$count2 =0;
		$count3 =0;
		$path="";
		for($i=0; $i<count($data); $i++){
		$bbb = $data[$i]['client_group.i_code'].$data[$i]['client_shop.shop_code'];
		 if(strtoupper($bbb)==strtoupper($aaa))
		    $count2=2;
		}
		
		$row1 = array();
		$db_connector->GetRows($row1,"", "client_department");
	for($k=0; $k<count($row1); $k++){
		if(isset($_REQUEST['dept'.$k]))
			{	
				$path .= "&box".$k."=1";
}}


		//echo $name;
		if($count1==0 && $count2==0 && $count3==0){

        $group_data = array();
        $db_connector->GetOneRow($group_data, "WHERE ID=$type", "client_group");

        $data1['shop_name']=$name;
		$data1['shop_code']=strtoupper($code);
		$data1['i_group'] = $type;

        if(isset($group_data['i_code']))
            $data1['f_code'] = strtoupper($group_data['i_code'].$code);
        
		$db_connector->Insert($data1, "client_shop");
		
		$row3 = array();
		$db_connector->GetOneRow($row3,"WHERE shop_code=$code AND i_group=$type", "client_shop");
		

		for($k=0; $k<count($row1); $k++){
			
			if(isset($_REQUEST['dept'.$k]))
			{
			$row2 = array();
			$row2['i_dept'] = $row1[$k]['ID'];
			$row2['i_shop'] = $row3['ID'];
			$db_connector->Insert($row2, "shop_dept");
			}
		}
		
		header("Location: list_client_shop.php");
		}
		else
		{
		header("Location: add_client_shop_form.php?no=$count1&no2=$count2&no3=$count3&type=$type&name=$name&code=$code&i_code=$i_code".$path);
		}
		
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
