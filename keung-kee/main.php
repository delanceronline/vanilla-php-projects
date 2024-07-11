<?php

	session_start();
	
	if(!isset($_SESSION['login_id']))
		header("location: login.php");
	
	$bbb = $_SESSION['i_level'];
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
<style type="text/css">
<!--
.STYLE2 {
	font-size: 24px;
	color: #6666FF;
}
.style1 {
	color: #008000;
}
-->
</style>
<script language="javascript">
parent.leftFrame.location.reload();
parent.topFrame.location.reload();
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center" class="STYLE2">QBPOS</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="160">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><strong>貨品資料</strong></td>
        <td colspan="2"><strong>貨品種類</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="list_product.php">貨品清單</a></td>
        <td><a href="product_price_unit_setting.php">貨品價目</a></td>
        <td><a href="list_product_category.php">種類清單</a></td>
        <td><?php if($bbb!=0) { ?><a href="add_product_category_form.php">新增種類</a><?php } ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="1050">&nbsp;</td>
        <td width="1050">&nbsp;</td>
        <td width="1050">&nbsp;</td>
        <td width="1050">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php if($bbb!=0) { ?><a href="add_product_form.php">新增貨品</a><?php } ?></td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="list_product_category.php"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><strong>客戶資料</strong></td>
        <td colspan="2"><strong>發票</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="list_client_group.php">集團清單</a></td>
        <td><a href="list_client_shop.php">分店清單</a></td>
        <td><a href="list_invoice.php">發票清單</a></td>
        <td><?php if($bbb!=0) { ?><a href="add_invoice.php">新增發票</a><?php } ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="list_client_department.php">部門清單</a></td>
        <td>&nbsp;</td>
        <td><a href="monthly_balance_form.php">下載月結檔案</a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php if($bbb!=0) { ?><a href="add_client_group_form.php">新增集團</a><?php } ?></td>
        <td><?php if($bbb!=0) { ?><a href="add_client_shop_form.php">新增分店</a><?php } ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php if($bbb!=0) { ?><a href="add_client_department_form.php">新增部門</a><?php } ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="add_product_category_form.php"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>用戶</strong></td>
        <td>&nbsp;</td>
        <td><a href="#"></a></td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="logout.php">登出</a></td>
        <td><a href="change_password_form.php">更改密碼</a><?php if(isset($_REQUEST['ok']) && $_REQUEST['ok']==1) { ?><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp; 密碼已被更改<?php } ?></span></td> 
        <td></td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php if($bbb==2) { ?><a href="list_user.php">用戶清單</a><?php } ?></td>
        <td><?php if($bbb==2) { ?><a href="add_user_form.php">新增用戶</a><?php } ?></td>  
        <td>&nbsp;</td>
        <td><div align="center"><a href="#"></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>