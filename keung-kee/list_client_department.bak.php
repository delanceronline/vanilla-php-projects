<?php 
		session_start();
		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		
	/*	$data = array();
		$data['client_department.ID'] ="";
		$data['client_shop.i_code'] ="";
		$data['client_shop.i_group'] ="";
		$data['client_department.department_name'] ="";
		$data['client_department.department_code'] ="";
		if(isset($_GET['type2']) && $_GET['type2']!=0)
			$db_connector->JoinGetRows($data, "WHERE client_department.i_shop={$_GET['type2']} AND client_shop.ID=client_department.i_shop ORDER BY client_shop.i_group", "client_shop, client_department");
		else if(isset($_GET['type']) && $_GET['type']!=0)
			$db_connector->JoinGetRows($data, "WHERE client_shop.i_group={$_GET['type']} AND client_shop.ID=client_department.i_shop ORDER BY client_shop.i_group", "client_shop, client_department");
		else if(isset($_GET['hidden1']) && $_GET['hidden1']!=0)
			$db_connector->JoinGetRows($data, "WHERE client_shop.i_group={$_GET['hidden1']} AND client_shop.ID=client_department.i_shop ORDER BY client_shop.i_group", "client_shop, client_department");
		else
		$db_connector->JoinGetRows($data, "WHERE client_department.i_shop!=0 AND client_shop.ID=client_department.i_shop ORDER BY client_shop.i_group", "client_shop, client_department");
*/   
		$data = array();
		if(isset($_GET['type'])){
		$type=$_GET['type'];
	//	echo $type;
		}
 	if(isset($_GET['type2']) && $_GET['type2']!=0){
 	$count=0;
	$db_connector->GetRows($data, "WHERE i_shop='{$_GET['type2']}'", "shop_dept");
	$number = count($data);
		}
	else {
	$count = 1;
	$db_connector->GetRows($aaa, "", "client_department");
	$number = count($aaa);
	}

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
		form.action = 'list_client_department.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><div align="center">部門清單</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <form id="form2" name="form2" method="get"  action="list_client_department.php" >
  <tr>
    <td>&nbsp;</td>
    <td>集團：</td>
    <td><select name="type" id="type" onchange="reload (this.form)">
      <option value="0">All</option>

      <?php $db_connector->GetRows($data1, " ", "client_group");
      for($i=0; $i<count($data1); $i++){ ?>
		 <option value="<?php echo $data1[$i]['ID']; ?>" <?php if(isset($_GET['type'])) $ggg = $_GET['type']; else if(isset($_GET['hidden1'])) $ggg = $_GET['hidden1']; else $ggg = ""; if($ggg==$data1[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data1[$i]['group_code']." ".$data1[$i]['group_name']."(".$data1[$i]['i_code'].")"; ?></option>
<?php }?>
    </select></td>
    <td></td>
  </tr>
  </form>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      <form id="form2" name="form2" method="get"  action="list_client_department.php" >

  <tr>
    <td>&nbsp;</td>
    <td>分店：</td>
    <td><select name="type2" id="type2" onchange="reload (this.form)">
      <option value="0">All</option>

      <?php $data3 = array();
		if($_GET['type']!=0 && isset($_GET['type']))
		$db_connector->GetRows($data3, "WHERE i_group={$_GET['type']} ORDER BY i_group", "client_shop");
		else if ($_GET['hidden1']!=0 && isset($_GET['hidden1']))
		$db_connector->GetRows($data3, "WHERE i_group={$_GET['hidden1']} ORDER BY i_group", "client_shop");
		if(($_GET['type']!=0 && isset($_GET['type'])) || ($_GET['hidden1']!=0 && isset($_GET['hidden1']))) {
	     for($i=0; $i<count($data3); $i++){ ?>
		 <option value="<?php echo $data3[$i]['ID']; ?>" <?php if(isset($_GET['type2'])) $ggg = $_GET['type2']; else $ggg = ""; if($ggg==$data3[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data3[$i]['shop_code']." ".$data3[$i]['shop_name']."(".$data3[$i]['i_code'].")"; ?></option>
<?php }}?>
    </select><input name="hidden1" type="hidden" value="<?php if(isset($_GET['hidden1'])) echo $_GET['hidden1']; else echo $_GET['type']; ?>"/></td>
    <td></td>
  </tr>
  </form>
  <tr>
    <td>&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="715">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門名稱</td>
    <td>部門編碼</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr>
   <?php      
  for($i=0; $i<$number; $i++) {
   

    
  ?>

  <tr>
    <td>&nbsp;</td>
    <td><?php if($count==0){
    $no= $data[$i]['i_dept'];
    $db_connector->GetOneRow($row, "WHERE ID=$no", "client_department");
    echo $row['department_name'];
    }
    else if($count==1){
    echo $aaa[$i]['department_name']; 
    }?></td>
    <td><?php if($count==0){
    $no= $data[$i]['i_dept'];
    $db_connector->GetOneRow($row, "WHERE ID=$no", "client_department");
    echo $row['code'];
    }
    else if($count==1){
    echo $aaa[$i]['code']; 
    }?></td>
    <td><?php if(isset($_SESSION['login_id']) && $_SESSION['i_level'] != 0) {?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <?php if($count==1){ ?> <form id="form" name="form" method="post" action="edit_client_department_form.php">
 <td width="11%"><input type="submit" name="button3" id="button3" value="更改" /><input name="pid" id="pid" type="hidden" value="<?php echo $aaa[$i]['ID']; ?>"></td> </form> <?php } ?>
       <form id="form1" name="form1" method="post" action="<?php if($count==1) echo "delete_client_department.php?ccc=1"; else if ($count==0) echo "delete_client_department.php?ccc=0&type=$hidden1&type2=$type2";?>">
 <td width="89%"><input type="submit" name="button4" id="button4" value="刪除" onClick="return confirm( 'Really want to Delete it?' )"/><input name="pid" id="pid" type="hidden" value="<?php if($count==1) echo $aaa[$i]['ID']; else if ($count==0) echo $data[$i]['ID'];?>"></td> </form>
      </tr>
    </table><?php }?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
  </tr> <?php } ?>
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
