<?php 
		session_start();
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$data = array();
		if($_GET['type']!=0)
		$db_connector->GetRows($data, "WHERE i_group={$_GET['type']} ORDER BY f_code ASC", "client_shop");
		else
		$db_connector->GetRows($data, "WHERE i_group!=0 ORDER BY f_code ASC", "client_shop");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
</head>
<SCRIPT language=JavaScript>
function reload(form)
{
	if(form != null)
	{
		form.action = 'list_client_shop.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><div align="center">分店清單</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><form id="form2" name="form2" method="get"  action="list_client_shop.php" >

  <tr>
    <td>&nbsp;</td>
    <td>集團：</td>
    <td><select name="type" id="type" onchange="reload (this.form)">
      <option value="0">All</option>

      <?php $db_connector->GetRows($data1, " ", "client_group");
      for($i=0; $i<count($data1); $i++){ ?>
		 <option value="<?php echo $data1[$i]['ID']; ?>" <?php if(isset($_GET['type'])) $ggg = $_GET['type']; else $ggg = ""; if($ggg==$data1[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data1[$i]['group_code']." ".$data1[$i]['group_name']."(".$data1[$i]['i_code'].")"; ?></option>
<?php }?>
        </select>
</td>
    <td></td>
  </tr></form>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="715">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>分店編碼</td>
    <td>分店名稱</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr>
   <?php 
  for($i=0; $i<count($data); $i++){
  ?>
  <tr>
    <td>&nbsp;</td>
    <td><?php $db_connector->GetOneRow($row, "WHERE ID='{$data[$i]['i_group']}'", "client_group");
    	echo $row['i_code'].$data[$i]['shop_code']; ?></td>
    <td><?php echo $data[$i]['shop_name']; ?></td>
    <td><?php if(isset($_SESSION['login_id']) && $_SESSION['i_level'] != 0) {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <form id="form" name="form" method="post" action="edit_client_shop_form.php">
 <td width="11%"><input type="submit" name="button3" id="button3" value="更改" /><input name="pid" id="pid" type="hidden" value="<?php echo $data[$i]['ID']; ?>"><input name="ctype" id="ctype" type="hidden" value="<?php if (isset($_GET['type'])) echo $_GET['type']; else echo "0"; ?>"></td> </form>
      </tr>
    </table><?php }?></td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr><?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="main.php">返回主頁</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
