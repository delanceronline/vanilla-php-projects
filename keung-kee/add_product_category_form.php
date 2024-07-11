<?php 
	
	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
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
  if( form.name.value== ""){
     alert( "Please enter the 種類名稱" );
    form.name.focus();
    return false ;
	}


 if( form.code.value== ""){
     alert( "Please enter the 種類編碼" );
    form.code.focus();
    return false ;
	}

 if( form.i_code.value== ""){
     alert( "Please enter the 貨品字首編碼" );
    form.i_code.focus();
    return false ;
	}
  return true ;
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_add.php" >

  <tr>
    <td colspan="3"><div align="center">新增貨品種類</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>種類名稱：</td>
    <td><label>
      <input type="text" name="name" id="name" value="<?php echo urldecode($_REQUEST['name']); ?>"/>
    <?php if($_GET['no']==1) echo "The name have been used"; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>種類編碼：</td>
    <td><label>
      <input type="text" name="code" id="code" value="<?php echo $_REQUEST['code']; ?>"/>
     <?php if($_GET['no2']==2) echo "The code have been used"; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品字首編碼：</td>
    <td><label>
      <input type="text" name="i_code" id="i_code" value="<?php echo $_REQUEST['i_code']; ?>"/>
    <?php if($_GET['no3']==3) echo "The product code have been used"; ?> </label></td>
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
		<input type="reset" name="button2" id="button2" value="重設" /></td>
        <td width="89%"><input type="submit" name="button" id="button" value="加入" /></td>
      </tr>
    </table>      
    <label></label></td>
  </tr>
  <tr>
    <td style="height: 19px"></td>
    <td style="height: 19px"></td>
    <td style="height: 19px"></td>
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
  </tr> </form>
</table>
</body>
</html>
