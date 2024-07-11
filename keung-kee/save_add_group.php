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
		
		$name = $_POST['name'];
		$code = $_POST['code'];
		$i_code = $_POST['i_code'];
		$type = $_POST['type'];
		$data = array();
		$db_connector->GetRows($data, " ", "client_group");
		$count1 =0;
		$count2 =0;
		$count3 =0;

		for($i=0; $i<count($data); $i++){
		 if(strtoupper($data[$i]['group_name'])==strtoupper($name))
		    $count1=1;
		 if(strtoupper($data[$i]['group_code'])==strtoupper($code))
		    $count2=2;

		}
		if($count1==0 && $count2==0 && $count3==0){
		$data1['group_name']=$name;
		$data1['group_code']=strtoupper($code);
		$data1['i_code']=strtoupper($i_code);
		$db_connector->Insert($data1, "client_group");
		$row = array();
		$db_connector->GetOneRow($row, "WHERE group_name='$name' AND group_code='$code'", "client_group");
		if($type!=0)
		{
			$data2 = array();
			$db_connector->GetRows($data2, "WHERE i_group=$type", "price");
			for($i=0;$i<count($data2);$i++)
			{
				$data3 = array();
				$data3['price'] = $data2[$i]['price'];
				$data3['unit'] = $data2[$i]['unit'];
				$data3['i_product'] = $data2[$i]['i_product'];
				$data3['i_group'] = $row['ID'];
				$data3['edit_by'] = $user_id;
				$data3['last_edit_time'] = date('Y-m-d H:i:s');
				
				$db_connector->Insert($data3, "price");
			}	
		}
		header("Location: list_client_group.php");
		}
		else
		{
		header("Location: add_client_group_form.php?no=$count1&no2=$count2&no3=$count3&name=$name&code=$code&i_code=$i_code&type=$type");
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
