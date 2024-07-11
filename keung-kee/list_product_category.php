<?php 
		session_start();
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$data = array();
		$db_connector->GetRows($data, " ", "product_category");
		

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><div align="center">貨品種類清單</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="715">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>種類編碼</td>
    <td>種類名稱</td>
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
    <td><?php echo $data[$i]['category_code']; ?></td>
    <td><?php echo $data[$i]['category_name']; ?></td>
    <td><?php if(isset($_SESSION['login_id']) && $_SESSION['i_level'] != 0) {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <form id="form" name="form" method="post" action="edit_product_category_form.php">
 <td width="11%"><input type="submit" name="button3" id="button3" value="更改" /><input name="cid" id="cid" type="hidden" value="<?php echo $data[$i]['ID']; ?>"></td> </form>
       <form id="form1" name="form1" method="post" action="delete_product_category.php">
 <td width="89%"><input type="submit" name="button4" id="button4" value="刪除" onClick="return confirm( 'Really want to Delete it?' )"/><input name="cid" id="cid" type="hidden" value="<?php echo $data[$i]['ID']; ?>"></td> </form>
      </tr>
    </table><?php }?></td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> <?php } ?>
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
