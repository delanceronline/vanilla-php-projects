<?php

	session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && $_SESSION['i_level']==0))
		header("location: logout.php");

	

	 include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$data = array();
	$db_connector->GetRows($data, " ", "client_group");

	$data2 = array();
	$db_connector->GetRows($data2, " ", "client_department");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
<script language = "Javascript">

	function checkform (form)
{
  if( form.type.value== ""){
     alert( "Please select the 集團" );
    form.type.focus();
    return false ;
	}

  if( form.name.value== ""){
     alert( "Please enter the 分店名稱" );
    form.name.focus();
    return false ;
	}


 if( form.code.value== ""){
     alert( "Please enter the 分店編碼" );
    form.code.focus();
    return false ;
	}

  return true ;
}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_add_shop.php" >
  <tr>
    <td colspan="3"><div align="center">新增分店</div></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>集團：</td>
    <td><label>
       <select name="type" id="type">
      <?php for($i=0;$i<count($data);$i++) {?>
      <option value="<?php echo $data[$i]['ID'];?>" <?php if(isset($_REQUEST['type'])) $ggg = $_REQUEST['type']; else $ggg = $row['i_group']; if($ggg==$data[$i]['ID']){?> selected="selected" <?php }?> ><?php echo $data[$i]['group_code']." ".$data[$i]['group_name']." (".$data[$i]['i_code'].")";?></option>
      <?php }?>
      </select>

    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>分店名稱：</td>
    <td><label>
      <input name="name" type="text" id="name" value="<?php echo urldecode($_REQUEST['name']); ?>"/>
    <?php if($_GET['no']==1) echo "The name have been used"; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>分店編碼：</td>
    <td><label>
      <input type="text" name="code" id="code" value="<?php echo $_REQUEST['code']; ?>"/>
     <?php if($_GET['no2']==2) echo "The code have been used"; ?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門名稱</td>
    <td>可選多項&nbsp;&nbsp;</td>
  </tr>
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <?php for ($y=0;$y<count($data2);$y++) {?>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $data2[$y]['department_name']; ?></td>
    <td><input name="dept<?php echo $y; ?>" id="dept<?php echo $y; ?>" type="checkbox" value="<?php echo $data2[$y]['ID']; ?>" <?php if($_REQUEST['box'.$y] == 1) echo "checked";?>/></td>
  </tr>
  <?php }?>
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
  </tr></form>
</table>
</body>
</html>
