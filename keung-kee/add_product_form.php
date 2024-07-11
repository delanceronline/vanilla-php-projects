<?php

      	
	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");

	
      
	 include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$data = array();
	$db_connector->GetRows($data, "", "product_category");

	$groups = array();
	$db_connector->GetRows($groups, "", "client_group");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
</head>
<script language = "Javascript">

	function checkform (form)
{
  if( form.type.value== ""){
     alert( "Please select the 貨品種類" );
    form.type.focus();
    return false ;
	}

  if( form.name.value== ""){
     alert( "Please enter the 貨品名稱" );
    form.name.focus();
    return false ;
	}


 if( form.code.value== ""){
     alert( "Please enter the 貨品編碼" );
    form.code.focus();
    return false ;
	}
  return true ;
}

function set_all_price(num)
{
	for(var i = 0; i < num; i++)
	{
		var textfield = document.getElementById('price' + i);
		textfield.value = document.getElementById('all_price').value;
	}
}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_product.php" >
  <input type="hidden" name="all_price_count" id="all_price_count" value="<?php echo count($groups); ?>" />
  <tr>
    <td colspan="3"><div align="center">新增貨品</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品種類：</td>
    <td><label>
      <select name="type" id="type">
      <?php for($i=0;$i<count($data);$i++) {?>
      <option value="<?php echo $data[$i]['ID'];?>" <?php if(isset($_GET['type'])) $ggg = $_GET['type']; else $ggg = $row['i_category']; if($ggg==$data[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data[$i]['category_code']." ".$data[$i]['category_name']." (".$data[$i]['i_code'].")";?></option>
      <?php }?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品名稱：</td>
    <td><label>
      <input name="name" type="text" id="name" value="<?php echo urldecode($_REQUEST['name']); ?>" />
    <?php if($_GET['no']==1) echo "The name have been used"; ?> </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品編碼：</td>
    <td><label>
      <input type="text" name="code" id="code" value="<?php echo $_REQUEST['code']; ?>" />
    <?php if($_GET['no2']==2) echo "The code have been used"; ?> </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>全部設定為：</td>
    <td>$<input name="all_price" type="text" id="all_price" />
      <label>
      <input type="button" name="button3" id="button3" value="設定" onclick="set_all_price(<?php echo count($groups); ?>);" />
      </label></td>
  </tr>    
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
<?php
	foreach($groups as $key => $group)
	{
?>  
  <tr>
    <td></td>
    <td>價錢：</td>
    <td>$<input type="text" name="price<?php echo $key; ?>" id="price<?php echo $key; ?>" value="0" /> (<?php echo $group['group_name']; ?>)<input type="hidden" name="group_id<?php echo $key; ?>" id="group_id<?php echo $key; ?>" value="<?php echo $group['ID']; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>單位：</td>
    <td>
<select name="unit<?php echo $key;?>" id="unit<?php echo $key;?>">
        <?php 
			foreach($global_zzz as $key2 => $unit)
			{		
		?>
        <option value="<?php echo $key2;?>"><?php echo $unit;?></option>
        <?php 
			}
		?>
      </select>    
    </td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
 <?php
 	}
 ?>  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="11%">
		<input type="reset" name="button2" id="button2" value="重設" /></td>
        <td width="89%"><input type="submit" name="button" id="button" value="加入" /></td>
      </tr>
    </table>      
    <label></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="main.php">返回主頁</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
