<?php
	session_start();
	
	if((!isset($_SESSION['login_id'])) || (isset($_SESSION['login_id']) && $_SESSION['i_level'] != 2))
		header("location: logout.php");
	
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	$row = array();
	$db_connector->GetOneRow($row, "WHERE  ID={$_REQUEST['cid']}", "member");
	
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
     alert( "Please enter the User's name." );
    form.textfield.focus();
    return false ;
	}
  if( form.textfield3.value== ""){
     alert( "Please enter the password." );
    form.textfield3.focus();
    return false ;
	}
  if( form.textfield3.value.length < 6){
     alert( "Password length should be more than 6." );
    form.textfield3.focus();
    return false ;
	}
	if( form.textfield2.value== ""){
     alert( "Please enter the confirm password." );
    form.textfield2.focus();
    return false ;
	}
  

  return true ;
}
</script>

<body><form method="post" action="save_edit_user.php" onsubmit="return checkform(this);" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center">更改用戶資料</div></td>
  </tr>
  
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>用戶名稱：</td>
    <td><label>
      <input name="textfield" type="text" id="textfield" value="<?php if(isset($_REQUEST['name'])) echo urldecode($_REQUEST['name']); else echo $row['name']; ?>" />
    <?php if($_REQUEST['is_fail']==1) echo "It is being used."; ?>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>密碼：</td>
    <td><label>
      <input type="password" name="textfield3" id="textfield3" value="<?php if(isset($_REQUEST['code'])) echo urldecode($_REQUEST['code']); else echo $row['password']; ?>"/>
      
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>確認密碼：</td>
    <td><input type="password" name="textfield2" id="textfield2" value="<?php if(isset($_REQUEST['code2'])) echo urldecode($_REQUEST['code2']); else echo $row['password']; ?>"/>
    <?php if($_REQUEST['is_fail2']==2) echo "Password does not match."; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>階級：</td>
    <td><label><input type="radio" name="radio1" id="radio1" value="0" <?php if($row['i_level']==0 || (isset($_REQUEST['level']) && $_REQUEST['level']==0 )) echo "checked";?>/>
      唯讀</label> 
      <label><input type="radio" name="radio1" id="radio1" value="1" <?php if($row['i_level']==1 || (isset($_REQUEST['level']) && $_REQUEST['level']==1 )) echo "checked";?>/>
    編輯</label> 
    <label><input type="radio" name="radio1" id="radio1" value="2" <?php if($row['i_level']==2 || (isset($_REQUEST['level']) && $_REQUEST['level']==2 )) echo "checked";?>/>
    管理</label></td>
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
        <td width="11%">&nbsp;</td>
        <td width="89%">
        <input name="ccid" type="hidden" id="ccid" value="<?php if(isset($_REQUEST['pcid'])) echo $_REQUEST['pcid']; else echo $_REQUEST['cid'];?>">
		<input type="submit" name="button" id="button" value="更改" /></td>
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
