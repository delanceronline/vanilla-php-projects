<?php 
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$c_pass = $_POST['c_pass'];
		$type = $_POST['type'];
		$count = 0;
		if($pass!=$c_pass)
		$count=1;
		
		$data = array();
		$db_connector->GetRows($data, " ", "member");
		$count1 =0;
		for($i=0; $i<count($data); $i++){
		 if(strtoupper($data[$i]['name'])==strtoupper($name))
		    $count1=1;
		    
		}
		if($count1==0 && $count ==0 ){
		$data1['name']=$name;
		$data1['password']=$pass;
		$data1['i_code']=$i_code;
		$data1['i_level']=$type;
		$db_connector->Insert($data1, "member");
		header("Location: list_user.php");
		}
		else
		{
		header("Location: add_user_form.php?no=$count&no1=$count1&name=".urlencode($name)."&type=$type");
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
