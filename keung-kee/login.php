<?php session_start(); if(isset($_SESSION['login_id'])) header("location: main.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>QBIS</title>


  <script language="Javascript">
function checkform (form)
{
if( form.login_id.value== ""){
alert( "Please enter the 用戶名稱" );
form.login_id.focus();
return false ;
}
if( form.password.value== ""){
alert( "Please enter the 密碼" );
form.password.focus();
return false ;
}
return true ;
}
  </script>
  <script language="javascript">
parent.leftFrame.location.reload();
parent.topFrame.location.reload();
  </script>
</head>




<body>

<form id="form1" name="form1" method="post" action="check_admin.php" onsubmit="return checkform(this);">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">

    <tbody>

      <tr>

        <td colspan="3">
        <div align="center">用戶登入</div>

        </td>

      </tr>

      <tr>

        <td width="20">&nbsp;</td>

        <td width="180">&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>用戶名稱：</td>

        <td><label> <input name="login_id" id="login_id" value="<?php if(isset($_REQUEST['name'])) echo urldecode($_REQUEST['name']); ?>" type="text" /><?php if(isset($_REQUEST['is_fail']) && $_REQUEST['is_fail']==1) echo "Incorrect username or password."?> </label></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>密碼：</td>

        <td><label> <input name="password" id="password" type="password" /> </label></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">

          <tbody>

            <tr>

              <td width="11%"> <input name="button2" id="button2" value="重設" type="reset" /></td>

              <td width="89%"> <input name="button" id="button" value="登入" type="submit" /></td>

            </tr>

          </tbody>
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

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

    </tbody>
  </table>

</form>

</body>
</html>
