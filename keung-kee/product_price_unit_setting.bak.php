<?php 

	session_start();
	


		include_once("db_info.php");
		include_once("MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
		
		$data3 = array();
		$db_connector->GetRows($data3, "", "product_category");
		
		$data = array();
		
		if(isset($_REQUEST['type2']) && $_REQUEST['type2']!=0)
			$db_connector->GetRows($data, "WHERE i_category={$_REQUEST['type2']} ORDER BY i_category ASC", "product");
		else if(isset($_REQUEST['hidden2']) && $_REQUEST['hidden2']!=0)
			$db_connector->GetRows($data, "WHERE i_category={$_REQUEST['hidden2']} ORDER BY i_category ASC", "product");
		else
			$db_connector->GetRows($data, "WHERE i_category={$data3[0]['ID']} ORDER BY i_category ASC", "product");
		
		
		if(isset($_REQUEST['type']) && $_REQUEST['type']!=0)
		{	
			$data2 = array();
			//$data2['price.i_product'] = "";
			//$data2['price.price'] = "";
			//$data2['price.unit'] = "";
			$hhh = $db_connector->GetRows($data2, "WHERE i_group={$_REQUEST['type']}", "price");
		}
		else if(isset($_REQUEST['hidden1']) && $_REQUEST['hidden1']!=0)
		{	
			$data2 = array();
			//$data2['price.i_product'] = "";
			//$data2['price.price'] = "";
			//$data2['price.unit'] = "";
			$hhh = $db_connector->GetRows($data2, "WHERE i_group={$_REQUEST['hidden1']}", "price");
		}
		else
		{	
			$data8 = array();
			$db_connector->GetRows($data8, "", "client_group");
			$data2 = array();
			//$data2['price.i_product'] = "";
			//$data2['price.price'] = "";
			//$data2['price.unit'] = "";
			$hhh = $db_connector->GetRows($data2, "WHERE i_group={$data8[0]['ID']}", "price");
		}

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
<style type="text/css">
.style1 {
	color: #FF0000;
}
</style>
</head>
<script language = "Javascript">
	function checkform (form, form2)
{
  /*if( form2.type.value== 0){
     alert( "Please select the Group and press the 顯示  before edit" );
    form2.type.focus();
    return false ;
	}
  if( form.textfield.value== ""){
     alert( "Please enter the price" );
    form.textfield.focus();
    return false ;
	}*/

   return true ;
}
</script>
<SCRIPT language=JavaScript>
function reload(form)
{
	if(form != null)
	{
		form.action = 'product_price_unit_setting.php';	
		form.submit();
	}

//var val=form.cat.options[form.cat.options.selectedIndex].value;
//self.location='add_client_department_form.php?cat=' + val ;


}

</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form method="post" action="save_product_price_unit.php" name="form4" onsubmit="return checkform(this, form2);">
  <tr>
    <td colspan="7"><div align="center">貨品清單</div></td>
  </tr>
  <tr>
    <td width="10">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>集團：</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74%"><select name="type" id="type" onchange="reload (this.form)">
      <?php $db_connector->GetRows($data1, " ", "client_group");
      for($i=0; $i<count($data1); $i++){ ?>
		 <option value="<?php echo $data1[$i]['ID']; ?>" <?php if (isset($_REQUEST['type'])) $ggg = $_REQUEST['type']; else if(isset($_REQUEST['hidden1'])) $ggg = $_REQUEST['hidden1']; else $ggg = ""; if($ggg==$data1[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data1[$i]['group_code']." ".$data1[$i]['group_name']."(".$data1[$i]['i_code'].")"; ?></option>
<?php }?>
        </select><input name="hidden2" id="hidden2" type="hidden" value="<?php if(isset($_REQUEST['hidden2'])) echo $_REQUEST['hidden2']; else echo $_REQUEST['type2'];?>"></td>
        <td width="26%"></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 

  <tr>
    <td>&nbsp;</td>
    <td>種類：    </td>
    <td><label></label>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="74%"><select name="type2" id="type2" onchange="reload (this.form)">
      <?php 
			for($i=0; $i<count($data3); $i++){ ?>
		 <option value="<?php echo $data3[$i]['ID']; ?>" <?php if (isset($_REQUEST['type2'])) $ggg = $_REQUEST['type2']; else if(isset($_REQUEST['hidden2'])) $ggg = $_REQUEST['hidden2']; if($ggg==$data3[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data3[$i]['category_code']." ".$data3[$i]['category_name']."(".$data3[$i]['i_code'].")"; ?></option>
		<?php }?>
    </select></td>
          <td width="26%" class="style1"><?php if(isset($_REQUEST['finish']) && $_REQUEST['finish']==1) echo "更改完成";?></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="309">&nbsp;</td>
    <td width="128">&nbsp;</td>
    <td width="156">&nbsp;</td>
    <td width="427">&nbsp;</td>
    <td width="427">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>貨品編碼</td>
    <td>貨品名稱</td>
    <td>價錢</td>
    <td>單位</td>
    <td>最後更改</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label></label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php for($i=0; $i<count($data); $i++) {?>
 
  <tr>
    <td>&nbsp;</td>
    <td><?php $db_connector->GetOneRow($row, "WHERE ID='{$data[$i]['i_category']}'", "product_category");
 		echo $row['i_code'].$data[$i]['product_code'];?></td>
    <td><?php echo $data[$i]['product_name'];?></td>
    <td width="128" height="10"><label>
      
      <input name="textfield<?php echo $i;?>" type="text" id="textfield<?php echo $i;?>" size="10" maxlength="10" 
      value="<?php if(isset($hhh) && $hhh==true ) { for($m=0;$m<count($data2);$m++) { 
      if($data[$i]['ID']==$data2[$m]['i_product']) echo $data2[$m]['price']; } }?>" />
    </label></td>
    <td><label>
      <select name="select<?php echo $i;?>" id="select<?php echo $i;?>">
        <?php for($k=0;$k<count($global_zzz);$k++) {?>
        <option value="<?php echo $k;?>" 
        <?php if(isset($hhh) && $hhh==true ) { for($m=0;$m<count($data2);$m++) { 
        if($data[$i]['ID']==$data2[$m]['i_product']) { if($k==$data2[$m]['unit']) {?> 
        selected="selected" <?php }} } }?> ><?php echo $global_zzz[$k];?></option>
        <?php }?>
      </select>
    </label></td>
    <td><?php echo $data2[$i]['edit_by'];?> (<?php echo $data2[$i]['last_edit_time'];?>)</td>
    <td></td>
  </tr><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <input name="haha<?php echo $i;?>" id="haha<?php echo $i;?>" type="hidden" value="<?php echo $data[$i]['ID']; ?>" /> 
 </tr><?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php if((isset($_SESSION['login_id']) && ($_SESSION['i_level']==1 || $_SESSION['i_level']==2))) { ?>
<input type="submit" name="button2" id="button2" value="更改" />
    <input name="hidden6" id="hidden6" type="hidden" value="<?php echo $data[0]['ID']; ?>" />
    <input name="hidden7" id="hidden7" type="hidden" value="<?php 	 if(isset($_REQUEST['type']))
		echo $_REQUEST['type'];
	else
		echo $data8[0]['ID'];
?>" /><?php } ?></td>
  </tr>
  </form>   
  <tr>
    <td>&nbsp;</td>
    <td><a href="main.php">返回主頁</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
