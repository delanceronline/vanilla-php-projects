<?php 
		session_start();

	if(!isset($_SESSION['login_id']))
	header("location: logout.php");

		$name = $_SESSION['login_id'];
		$level=$_SESSION['i_level'];
		
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		$pass = $_POST['pass'];
		$new_pass = $_POST['new_pass'];
		$c_new = $_POST['c_new'];
		$count = 0;
		if($new_pass!=$c_new)
		$count=1;
		
		
		$count1 = 1;
		$data = array();
		$db_connector->GetOneRow($data, "WHERE name='$name' ", "member");
		//echo $data['password'];
		if($data['password']==$pass){
		$count1 =0;
		}
		
		if($count ==0 && $count1 ==0){
		$data1['password']=$c_new;
		$db_connector->Update($data1,"WHERE name='$name'" , "member");
		header("Location: main.php?ok=1");

		
		}
		else
		{
		header("Location: change_password_form.php?no=$count&no1=$count1");
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
