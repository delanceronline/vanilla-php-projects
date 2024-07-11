<?php
		session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	$data = array();
	$db_connector->GetRows($data, "", "product_category");
	$row = array();
	$db_connector->GetOneRow($row, "WHERE  ID={$_POST['pid']}", "product");
	
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
  if( form.textfield.value== ""){
     alert( "Please enter the product name." );
    form.textfield.focus();
    return false ;
	}
  if( form.textfield3.value== ""){
     alert( "Please enter the product code." );
    form.textfield3.focus();
    return false ;
	}
   return true ;
}
</script>

<body><form method="post" action="save_edit_product.php" onsubmit="return checkform(this);" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center">更改貨品資料</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>種類： </td>
    <td><select name="select" id="select">
      <?php for($i=0;$i<count($data);$i++) {?>
      <option value="<?php echo $data[$i]['ID'];?>" <?php if(isset($_GET['i_code'])) $ggg = $_GET['i_code']; else $ggg = $row['i_category']; if($ggg==$data[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data[$i]['category_code']." ".$data[$i]['category_name']." (".$data[$i]['i_code'].")";?></option>
      <?php }?>
    </select></td>
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
      <input name="textfield" type="text" id="textfield" value="<?php if(isset($_GET['name'])) echo urldecode($_GET['name']); else echo $row['product_name']; ?>" />
    <?php if($_GET['is_fail']==1) echo "It is being used."; ?></label></td>
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
      <input name="textfield3" type="text" id="textfield3" value="<?php if(isset($_GET['code'])) echo $_GET['code']; else echo $row['product_code']; ?>" />
    <?php if($_GET['is_fail2']==2) echo "It is being used."; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
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
        <input name="ppid" type="hidden" id="ppid" value="<?php if(isset($_GET['cpid'])) echo $_GET['cpid']; else echo $_POST['pid'];?>">
		<input name="cctype" type="hidden" id="cctype" value="<?php if(isset($_GET['type2'])) echo $_GET['type2']; else echo $_POST['ctype'];?>">

		<input type="reset" name="button2" id="button2" value="重設" /></td>
        <td width="89%"><input type="submit" name="button" id="button" value="更改" /></td>
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
</table></form>
</body>
</html>