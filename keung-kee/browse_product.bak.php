<?php 
		session_start();
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		$data = array();
		if($_GET['type']!=0)
		$db_connector->GetRows($data, "WHERE i_category={$_GET['type']} ORDER BY i_category", "product");
		else
		$db_connector->GetRows($data, "WHERE i_category!=0 ORDER BY i_category", "product");



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
		form.action = 'browse_product.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><div align="center">貨品清單</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <form id="form2" name="form2" method="get"  action="browse_product.php" >
  <tr>
    <td>&nbsp;</td>
    <td>種類：    </td>
    <td><label>
      <select name="type" id="type" onchange="reload (this.form)">
      <option value="0">All</option>

      <?php $db_connector->GetRows($data1, " ", "product_category");
      for($i=0; $i<count($data1); $i++){ ?>
		 <option value="<?php echo $data1[$i]['ID']; ?>" <?php if(isset($_GET['type'])) $ggg = $_GET['type']; else $ggg = ""; if($ggg==$data1[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data1[$i]['category_code']." ".$data1[$i]['category_name']."(".$data1[$i]['i_code'].")"; ?></option>
<?php }?>
        </select>
    </label></td>
    <td></td>
  </tr> </form>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="715">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品編碼</td>
    <td>貨品名稱</td>
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
    <td><?php $db_connector->GetOneRow($row, "WHERE ID='{$data[$i]['i_category']}'", "product_category");
 		echo $row['i_code'].$data[$i]['product_code']; ?></td>
    <td><?php echo $data[$i]['product_name']; ?></td>
    <td></td>
  </tr> 
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td><a href="javascript: window.close();">關閉</a></td>
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
