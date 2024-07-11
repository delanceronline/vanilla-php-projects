<?php 
	session_start();
	if(!isset($_SESSION['login_id']))
		header("location: login.php");

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
	$categories = array();
	$categories['ID'] = 0;
	$num_catgeory = $db_connector->GetRows($categories, "WHERE ID > 0 ORDER BY ID ASC", "product_category");
	
	$all = array();
	$max = 0;
	foreach($categories as $category)
	{
		$products = array();
		$products['f_code'] = '';
		$products['product_name'] = '';
		$num = $db_connector->GetRows($products, "WHERE ID > 0 AND i_category = {$category['ID']} ORDER BY ID ASC", "product");
		if($num > 0)
		{
			$all[] = $products;
			if($num > $max)
				$max = $num;
		}
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>貨品清單</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td><div align="center">貨品清單</div></td>
  </tr>
</table>
<br />
<table width="<?php echo $num_catgeory * 200; ?>" border="1" cellpadding="0" cellspacing="0">
  <tr>
<?php 
	for($i = 0; $i < $num_catgeory; $i++)
	{
?>  
    <td width="100">貨品編碼</td>
    <td width="100">貨品名稱</td>
<?php
	}
?>    
  </tr>
<?php
	for($j = 0; $j < $max; $j++)
	{
?>  
  <tr>
<?php 
		foreach($all as $products)
		{
			$pc = "";
			if(isset($products[$j]) && isset($products[$j]['f_code']))
				$pc = $products[$j]['f_code'];
			
			$pn = "";
			if(isset($products[$j]) && isset($products[$j]['product_name']))
				$pn = $products[$j]['product_name'];						
?>  
    <td width="100"><?php echo $pc; ?></td>
    <td width="100"><?php echo $pn; ?></td>
<?php
		}
?>        
  </tr>
<?php
	}
?>  
</table>
</body>
</html>
