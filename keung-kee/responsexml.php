<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	//A date in the past
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$q=$_GET["q"];
	
	/*
	$data = array();
	$data['product.product_code'] = "";
	$data['product.ID'] = "";
	$data['product_category.i_code'] = "";	
	$db_connector->JoinGetRows($data,"WHERE product_category.ID=product.i_category ","product, product_category");
	for($i=0;$i<count($data);$i++)
	{
		$c = $data[$i]['product_category.i_code'].$data[$i]['product.product_code'];
		if($c==$q)
		{
			$e=$data[$i]['product.ID'];
		}
	}
	*/
	
	$e = 0;
	$product_data = array();
	if($db_connector->GetOneRow($product_data, "WHERE f_code = '$q'", "product"))
	{
		$e = $product_data['ID'];
	}
		
	echo '<person>';

	if($q!="")
	{	
		$num=explode("-",$_GET["id"]);
		$id=$num[1];
		$group=$num[0];
		$row = array();
		$aaa = $db_connector->GetOneRow($row,"WHERE i_group=$group AND i_product=$e","price");
		$row1 = array();
		$ccc = $db_connector->GetOneRow($row1,"WHERE ID=$e","product");
		for($k=0;$k<count($global_zzz);$k++) 
		{
			if($row['unit']==$k)
			$bbb = $global_zzz[$k];
		}
		if($aaa && $bbb)
		{
			echo "<id>" . $id . "</id>";
			echo "<name>" . $row1['product_name'] . "</name>";		
			echo "<price>" ."$ ".$row['price']." ".$bbb. "</price>";
		}
		else if($ccc && !$aaa)
		{
			echo "<id>" . $id . "</id>";
			echo "<name>" . $row1['product_name'] . "</name>";
			echo "<price>" . "沒有設定" . "</price>";
		}
		else if(!$ccc && !$aaa)
		{
			echo "<id>" . $id . "</id>";
			echo "<name>" . "錯誤編碼". "</name>";
			echo "<price>" . "" . "</price>";
		}
	}
	else
	{
		echo "<id>" . $id . "</id>";
		echo "<name>" . "" . "</name>";		
		echo "<price>" ."". "</price>";
	}
	echo "</person>";
?>
