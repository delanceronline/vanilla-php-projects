<?php 

	
		session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && ($_SESSION['i_level']==1 || $_SESSION['i_level']==0)))
		header("location: logout.php");




		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$data = array();
		$db_connector->GetRows($data, " ", "member");
		

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
    <td colspan="4"><div align="center">用戶清單</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="715">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>用戶名稱</td>
    <td>階級</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> <?php 
  for($i=0; $i<count($data); $i++){
  ?>

  <tr>
    <td>&nbsp;</td>
    <td><?php echo $data[$i]['name']; ?></td>
    <td><?php if($data[$i]['i_level']==0) echo "唯讀"; else if($data[$i]['i_level']==1) echo "編輯"; else if($data[$i]['i_level']==2) echo "管理";?></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <form id="form" name="form" method="post" action="edit_user_form.php">
 <td width="11%"><input type="submit" name="button3" id="button3" value="更改" /><input name="cid" id="cid" type="hidden" value="<?php echo $data[$i]['ID']; ?>"></td> </form>
       <form id="form1" name="form1" method="post" action="delete_user.php">
 <td width="89%"><input type="submit" name="button4" id="button4" value="刪除" onClick="return confirm( 'Really want to Delete it?' )"/><input name="cid" id="cid" type="hidden" value="<?php echo $data[$i]['ID']; ?>"></td> </form>
      </tr>
    </table></td>
  </tr>  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr><?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr>
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
