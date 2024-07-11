<?php 

	session_start();
	
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		$prices = array();
		
		if(isset($_REQUEST['i_group']) && isset($_REQUEST['i_category']))
		{
			$prices['product.product_name'] = "";
			$prices['product.f_code'] = "";
			$prices['price.ID'] = 0;
			$prices['price.unit'] = 0;
			$prices['price.price'] = 0;
			$prices['price.edit_by'] = "";
			$prices['price.last_edit_time'] = "";
		
			$db_connector->JoinGetRows($prices, "WHERE product.ID = price.i_product AND price.i_group = {$_REQUEST['i_group']} AND product.i_category = {$_REQUEST['i_category']} ORDER BY product.f_code ASC", "product, price");
		}		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
<style type="text/css">
.style1 {
	color: #FF0000;
}
</style>
</head>
<script language = "Javascript">
	function checkform (form, form2)
{
  /*if( form2.type.value== 0){
     alert( "Please select the Group and press the 顯示  before edit" );
    form2.type.focus();
    return false ;
	}
  if( form.textfield.value== ""){
     alert( "Please enter the price" );
    form.textfield.focus();
    return false ;
	}*/

   return true ;
}
</script>
<script language=JavaScript>
function reload(form)
{
	if(form != null)
	{
		form.action = 'product_price_unit_setting.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

	function do_view()
	{
		var group_id = document.getElementById('i_group').value;
		var category_id = document.getElementById('i_category').value;
		window.location = 'product_price_unit_setting.php?i_group=' + group_id + '&i_category=' + category_id;
	}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form method="post" action="save_product_price_unit.php" name="form4" onsubmit="return checkform(this, form2);">
    <input type="hidden" name="price_count" id="price_count" value="<?php echo count($prices); ?>" />
  <tr>
    <td colspan="7"><div align="center">貨品清單</div></td>
  </tr>
  <tr>
    <td width="10">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>集團：</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74%">
        <select name="i_group" id="i_group" >
      <?php 
		  $db_connector->GetRows($data1, " ", "client_group");
		  for($i=0; $i<count($data1); $i++)
		  { 
	  ?>
		 <option value="<?php echo $data1[$i]['ID']; ?>" <?php if (isset($_REQUEST['i_group']) && $data1[$i]['ID'] == $_REQUEST['i_group']) echo "selected"; ?>><?php echo $data1[$i]['group_code']." ".$data1[$i]['group_name']."(".$data1[$i]['i_code'].")"; ?></option>
		<?php 
			}
		?>
        </select>
        </td>
        <td width="26%"></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 

  <tr>
    <td>&nbsp;</td>
    <td>種類：    </td>
    <td><label></label>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="74%"><select name="i_category" id="i_category">
      <?php 
			$data3 = array();
			$db_connector->GetRows($data3, "", "product_category");
	  
			for($i=0; $i<count($data3); $i++){ ?>
		 <option value="<?php echo $data3[$i]['ID']; ?>" <?php if (isset($_REQUEST['i_category']) && $data3[$i]['ID'] == $_REQUEST['i_category']) echo "selected"; ?>><?php echo $data3[$i]['category_code']." ".$data3[$i]['category_name']."(".$data3[$i]['i_code'].")"; ?></option>
		<?php }?>
    </select></td>
          <td width="26%" class="style1"></td>
        </tr>
      </table></td>
    <td><label>
      <input type="button" name="view_button" id="view_button" value="查看" onclick="do_view();" />
    </label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="309">&nbsp;</td>
    <td width="128">&nbsp;</td>
    <td width="156">&nbsp;</td>
    <td width="427">&nbsp;</td>
    <td width="427">&nbsp;</td>
  </tr>
<?php
	if(count($prices) > 0)
	{
?>  
  <tr>
    <td>&nbsp;</td>
    <td>貨品編碼</td>
    <td>貨品名稱</td>
    <td>價錢</td>
    <td>單位</td>
    <td>最後更改</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  	}
  	   
  	$i = 0;
  	foreach($prices as $price)
	{  
  ?>
 
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $price['product.f_code']; ?></td>
    <td><?php echo $price['product.product_name'];?></td>
    <td width="128" height="10">
      <input type="hidden" name="pi<?php echo $i;?>" id="pi<?php echo $i;?>" value="<?php echo $price['price.ID']; ?>" /><input type="hidden" name="edited<?php echo $i;?>" id="edited<?php echo $i;?>" value="0" /><input name="price<?php echo $i;?>" type="text" id="price<?php echo $i;?>" size="10" maxlength="10" value="<?php echo $price['price.price'];?>" onchange="document.getElementById('edited<?php echo $i;?>').value = 1;" /></td>
    <td><label>
      <select name="unit<?php echo $i;?>" id="unit<?php echo $i;?>" onchange="document.getElementById('edited<?php echo $i;?>').value = 1;">
        <?php 
			foreach($global_zzz as $key => $unit)
			{		
		?>
        <option value="<?php echo $key;?>" <?php if($key == $price['price.unit']) echo "selected"; ?>><?php echo $unit;?></option>
        <?php 
			}
		?>
      </select>
    </label></td>
    <td><?php echo $price['price.edit_by'];?> (<?php echo $price['price.last_edit_time'];?>)</td>
    <td></td>
  </tr>
 <?php 
 		$i++;
 	} 
	
	if(count(prices) > 0)
	{
 ?> 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php if((isset($_SESSION['login_id']) && ($_SESSION['i_level']==1 || $_SESSION['i_level']==2))) { ?>
<input type="submit" name="button2" id="button2" value="更改" /><?php } ?></td>
  </tr>
<?php
	}
?>  
  </form>   
  <tr>
    <td>&nbsp;</td>
    <td><a href="main.php">返回主頁</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
