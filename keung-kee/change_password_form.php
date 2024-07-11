<?php 
session_start();

	if(!isset($_SESSION['login_id']))
	header("location: logout.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>

<script language = "Javascript">

	function checkform (form)
{
  if( form.pass.value== ""){
     alert( "Please enter the 現有密碼" );
    form.pass.focus();
    return false ;
	}

 if( form.new_pass.value== ""){
     alert( "Please enter the 新密碼" );
    form.new_pass.focus();
    return false ;
	}
	if( form.new_pass.value.length < 6){
     alert( "Password length should be more than 6." );
    form.new_pass.focus();
    return false ;
	}

 if( form.c_new.value== ""){
     alert( "Please enter the 確認新密碼" );
    form.c_new.focus();
    return false ;
	}
  return true ;
}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_c_password.php" >

  <tr>
    <td colspan="3"><div align="center">更改登入密碼</div></td>
  </tr>
  
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>現有密碼：</td>
    <td><label>
      <input name="pass" type="password" id="pass" />
    <?php if($no1==1) echo "This password is incorrect"?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>新密碼：</td>
    <td><label>
      <input type="password" name="new_pass" id="new_pass" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>確認新密碼：</td>
    <td><input type="password" name="c_new" id="c_new" />
    <?php if($no==1) echo "This confirm password is incorrect"?></td>
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
  </tr></form>
</table>
</body>
</html>
