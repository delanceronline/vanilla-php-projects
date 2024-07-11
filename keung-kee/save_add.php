<?php 
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		$name = $_POST['name'];
		$code = $_POST['code'];
		$i_code = $_POST['i_code'];
		
		$data = array();
		$db_connector->GetRows($data, " ", "product_category");
		$count1 =0;
		$count2 =0;
		$count3 =0;
		for($i=0; $i<count($data); $i++){
		 if(strtoupper($data[$i]['category_name'])==strtoupper($name))
		    $count1=1;
		 if(strtoupper($data[$i]['category_code'])==strtoupper($code))
		    $count2=2;
		 if(strtoupper($data[$i]['i_code'])==strtoupper($i_code))
		    $count3=3;
		}
		if($count1==0 && $count2==0 && $count3==0){
		$data1['category_name']=$name;
		$data1['category_code']=strtoupper($code);
		$data1['i_code']=strtoupper($i_code);
		$db_connector->Insert($data1, "product_category");
		header("Location: list_product_category.php");
		}
		else
		{
		header("Location: add_product_category_form.php?no=$count1&no2=$count2&no3=$count3&name=".urlencode($name)."&code=$code&i_code=$i_code");
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
