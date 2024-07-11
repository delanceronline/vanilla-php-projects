<?php
	
	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");

	
	
	 include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$data = array();
	$db_connector->GetRows($data, "", "client_group");
	if(isset($_REQUEST['cat']))
	{
		$data2 = array();
		$db_connector->GetRows($data2, "WHERE i_group={$_REQUEST['cat']}", "client_shop");
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
<SCRIPT language=JavaScript>
function reload(form)
{
	if(form != null)
	{
		form.action = 'add_client_department_form.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

</script>
<script language = "Javascript">

	function checkform (form)
{
  if( form.cat.value== 0){
     alert( "Please select the 集團" );
    form.cat.focus();
    return false ;
	}
 if( form.subcat.value== ""){
     alert( "Please select the 分店" );
    form.subcat.focus();
    return false ;
	}
 if( form.name.value== ""){
     alert( "Please enter the 部門名稱" );
    form.name.focus();
    return false ;
	}


 if( form.code.value== ""){
     alert( "Please enter the 部門編碼" );
    form.code.focus();
    return false ;
	}
 

  return true ;
}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_add_department.php" >
  <tr>
    <td colspan="3"><div align="center">新增部門</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">部門名稱：</td>
    <td><input type="text" name="name" id="name" value="<?php if(isset($_REQUEST['name'])) echo urldecode($_REQUEST['name']); ?>" />
    <?php if($_GET['no2']==2) echo "The name have been used"; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>部門編碼：</td>
    <td><input type="text" name="code" id="code" value="<?php echo $_REQUEST['code']; ?>"/>
    </td>
  </tr>
<tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
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
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px"><a href="main.php">返回主頁</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 129px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr></form>
</table>
</body>
</html>
