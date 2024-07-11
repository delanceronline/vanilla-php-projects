<?php 
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$name = $_POST['name'];

		$data = array();
		$db_connector->GetRows($data, "", "client_department");
		$count1 =0;
		$count2 =0;
		for($i=0; $i<count($data); $i++){
			 if(strtoupper($data[$i]['department_name'])==strtoupper($name))
		    $count2=2;
		}
		
		//echo $name;
		if($count1==0 && $count2==0){
		$data1['department_name']=filter_textnode_xml($name);
		$data1['code']=strtoupper($_REQUEST['code']);
		$db_connector->Insert($data1, "client_department");
		header("Location: list_client_department.php");
		}
		else
		{
		header("Location: add_client_department_form.php?no=$count1&no2=$count2&name=$name");
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
