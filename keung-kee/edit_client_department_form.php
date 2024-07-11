<?php
	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
/*	$data = array();
	$db_connector->GetRows($data, "", "client_group");
	if(isset($_REQUEST['cat']))
	{
		$data2 = array();
		$db_connector->GetRows($data2, "WHERE i_group={$_REQUEST['cat']}", "client_shop");
	}
	if(isset($_POST['pid']))
	{
		$data3 = array();
		$data3['client_shop.i_group'] = "";
		$db_connector->JoinGetRows($data3, "WHERE client_department.ID={$_POST['pid']} AND client_department.i_shop=client_shop.ID", "client_shop, client_department");
		$data2 = array();
		$db_connector->GetRows($data2, "WHERE i_group={$data3[0]['client_shop.i_group']}", "client_shop");
	}

	$ppp = $_POST['pid'];
	$row = array();
	$row['client_department.i_shop'] = "";
	$row['client_department.department_name'] = "";
	$row['client_department.department_code'] = "";
	$row['client_shop.i_group'] = "";
	$row['client_shop.shop_name'] = "";
	$row['client_shop.shop_code'] = "";
	$row['client_shop.i_code'] = "";
	$row['client_shop.ID'] = "";
	$db_connector->JoinGetRows($row, "WHERE client_department.ID=$ppp AND client_department.i_shop=client_shop.ID", "client_shop, client_department");
	*/
		$row = array();
		$db_connector->GetOneRow($row, "WHERE ID={$_REQUEST['pid']}", "client_department");

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
  if( form.cat.value== 0){
     alert( "Please select the Group" );
    form.cat.focus();
    return false ;
	}
 if( form.subcat.value== ""){
     alert( "Please select the Shop" );
    form.subcat.focus();
    return false ;
	}

  if( form.textfield.value== ""){
     alert( "Please enter the Department's name." );
    form.textfield.focus();
    return false ;
	}
  if( form.textfield3.value== ""){
     alert( "Please enter the Department's code." );
    form.textfield3.focus();
    return false ;
	}

   return true ;
}
</script>
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.textfield.value;
var val3=form.textfield3.value;
var val4=form.ppid.value;
self.location='edit_client_department_form.php?cat=' + val + '&name=' + val2 + '&code=' + val3 + '&cpid=' + val4;
}

</script>

<body><form name="form" id="form" method="post" action="save_edit_department.php" onsubmit="return checkform(this);" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center">更改部門資料</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門名稱：</td>
    <td><label>
      <input name="textfield" type="text" id="textfield" value="<?php if(isset($_REQUEST['name'])) echo urldecode($_REQUEST['name']); else echo $row['department_name']; ?>" />
    <?php if($_REQUEST['is_fail']==1) echo "It is being used."; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門編碼：</td>
    <td><input type="text" name="code" id="code" value="<?php if(isset($_REQUEST['code'])) echo urldecode($_REQUEST['code']); else echo $row['code']; ?>"/>
    </td>
  </tr>

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <input name="ppid" type="hidden" id="ppid" value="<?php if(isset($_REQUEST['cpid'])) echo $_REQUEST['cpid']; else echo $_POST['pid'];?>">
	 <td width="11%">
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
