<?php
	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	$row = array();
	$db_connector->GetOneRow($row, "WHERE  ID={$_POST['cid']}", "client_group");
	
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
     alert( "Please enter the Group's name." );
    form.textfield.focus();
    return false ;
	}
  if( form.textfield3.value== ""){
     alert( "Please enter the Group code." );
    form.textfield3.focus();
    return false ;
	}
  return true ;
}
</script>

<body><form method="post" action="save_edit_group.php" onsubmit="return checkform(this);" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center">更改集團資料</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>集團名稱：</td>
    <td><label>
      <input name="textfield" type="text" id="textfield" value="<?php if(isset($_GET['name'])) echo urldecode($_GET['name']); else echo $row['group_name']; ?>" />
    <?php if($_GET['is_fail']==1) echo "It is being used."; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>集團編碼：</td>
    <td><label>
      <input name="textfield3" type="text" id="textfield3" value="<?php  if(isset($_GET['code'])) echo $_GET['code']; else echo $row['group_code'];?>" />
    <?php if($_GET['is_fail2']==2) echo "It is being used."; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>分店字首編碼：</td>
    <td><input type="text" name="textfield2" id="textfield2" value="<?php  if(isset($_GET['i_code'])) echo $_GET['i_code']; else echo $row['i_code'];?>" />
    <?php if($_GET['is_fail3']==3) echo "It is being used."; ?></td>
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
        <td width="11%"><input name="ccid" type="hidden" id="ccid" value="<?php if(isset($_GET['pcid'])) echo $_GET['pcid']; else echo $_POST['cid'];?>">
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
