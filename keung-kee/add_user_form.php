<?php 
	
		session_start();
	
	if(!isset($_SESSION['login_id']) || (isset($_SESSION['login_id']) && ($_SESSION['i_level']==1 || $_SESSION['i_level']==0)))
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
     alert( "Please enter the 用戶名稱" );
    form.name.focus();
    return false ;
	}

 if( form.pass.value== ""){
     alert( "Please enter the 自選密碼" );
    form.pass.focus();
    return false ;
	}
  if( form.pass.value.length < 6){
     alert( "Password length should be more than 6." );
    form.pass.focus();
    return false ;
	}

 if( form.c_pass.value== ""){
     alert( "Please enter the 確認密碼" );
    form.c_pass.focus();
    return false ;
	}
  return true ;
}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form id="form" name="form" method="post" onSubmit="return checkform(this);" action="save_add_user.php" >

  <tr>
    <td colspan="3"><div align="center">新增用戶</div></td>
  </tr>
  
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>用戶名稱：</td>
    <td><label>
      <input name="name" type="text" id="name" value="<?php if(isset($_REQUEST['name'])) echo $_REQUEST['name']; ?>"/>
    <?php if($no1==1) echo "This user name have been used"?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>自選密碼：</td>
    <td><label>
      <input type="password" name="pass" id="pass" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>確認密碼：</td>
    <td><input type="password" name="c_pass" id="c_pass" />
    <?php if($no==1) echo "This confirm password is incorrect"?></td>
  </tr>
  <tr>
    <td style="height: 19px"></td>
    <td style="height: 19px"></td>
    <td style="height: 19px"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>階級：</td>
    <td><label>
      <input type="radio" name="type" id="type" value="0" <?php if($type==0)  echo "checked"?>/>
      唯讀</label> <label>
      <input type="radio" name="type" id="type" value="1" <?php if($type==1)  echo "checked"?>/>
    編輯</label> <label>
    <input type="radio" name="type" id="type" value="2" <?php if($type==2)  echo "checked"?>/>
    管理</label></td>
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
  </tr> </form>
</table>
</body>
</html>
