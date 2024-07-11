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
		
		$all_price_count = $_REQUEST['all_price_count'];
		
		$name = $_POST['name'];
		$code = $_POST['code'];
		$type = $_POST['type'];
		$data = array();
		$db_connector->GetRows($data, "WHERE i_category=$type", "product");
		$count1 =0;
		$count2 =0;

		for($i=0; $i<count($data); $i++){
				 if(strtoupper($data[$i]['product_code'])==strtoupper($code))
		    $count2=2;
		}
		if($count1==0 && $count2==0)
		{								
			$category_data = array();
			$db_connector->GetOneRow($category_data, "WHERE ID=$type", "product_category");
			
			$data1['product_name']=$name;
			$data1['product_code']=strtoupper($code);
			$data1['i_category']=$type;
			$data1['f_code'] = strtoupper($category_data['i_code'].$code);
			$product_id = $db_connector->Insert($data1, "product");
			
			for($i = 0; $i < $all_price_count; $i++)
			{
				$price = 0;
				if(isset($_REQUEST['price'.$i]))
					$price = floatval($_REQUEST['price'.$i]);
					
				$group_id = 0;
				if(isset($_REQUEST['group_id'.$i]))
					$group_id = intval($_REQUEST['group_id'.$i]);
				
				$unit = 0;
				if(isset($_REQUEST['unit'.$i]))
					$unit = intval($_REQUEST['unit'.$i]);				
				
				if($group_id > 0 && $product_id > 0)
				{
					$price_data = array();
					$price_data['price'] = $price;
					$price_data['unit'] = $unit;
					$price_data['i_product'] = $product_id;
					$price_data['i_group'] = $group_id;
					$price_data['edit_by'] = $user_id;
					$price_data['last_edit_time'] = date('Y-m-d H:i:s');
					
					$db_connector->Insert($price_data, "price");
				}
			}
			
			header("Location: list_product.php");
		}
		else
		{
			header("Location: add_product_form.php?no=$count1&no2=$count2&name=".urlencode($name)."&code=$code&type=$type");
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
