<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	if(isset($_SESSION['login_id']))
	{
?>
<p><strong>發票</strong></p>
<?php if($_SESSION['i_level'] !=0 ) {?>
-<a href="add_invoice.php" target="mainFrame">新增發票</a>
<?php }?>
<br />
-<a href="list_invoice.php" target="mainFrame">發票清單<br />
</a>
-<a href="monthly_balance_form.php" target="mainFrame">下載月結檔案<br /></a>
<br />
<p><strong>貨品種類</strong></p>
-<a href="list_product_category.php" target="mainFrame">種類清單<br />
</a>
<?php if($_SESSION['i_level'] !=0 ) {?>
-<a href="add_product_category_form.php" target="mainFrame">新增種類</a>
<?php }?>
<p><strong>貨品資料</strong></p>
-<a href="list_product.php" target="mainFrame">貨品清單</a><br />
<?php if($_SESSION['i_level'] !=0 ) {?>
-<a href="add_product_form.php" target="mainFrame">新增貨品<br />
</a>
<?php }?>
-<a href="product_price_unit_setting.php" target="mainFrame">貨品價目</a>
<p><strong>客戶資料</strong></p>
-<a href="list_client_group.php" target="mainFrame">集團清單</a><br /> 
-<a href="list_client_shop.php" target="mainFrame">分店清單</a><br /> 
-<a href="list_client_department.php" target="mainFrame">部門清單</a>
<?php if($_SESSION['i_level'] !=0 ) {?>
<br />
-<a href="add_client_group_form.php" target="mainFrame">新增集團</a><br /> 
-<a href="add_client_shop_form.php" target="mainFrame">新增分店</a> <br />
-<a href="add_client_department_form.php" target="mainFrame">新增部門</a>
<?php }?>
<p><strong>用戶</strong></p>
<?php if($_SESSION['i_level'] ==2 ) {?>
-<a href="list_user.php" target="mainFrame">用戶清單<br />
</a> -<a href="add_user_form.php" target="mainFrame">新增用戶<br />
</a>
<?php }?>
-<a href="change_password_form.php" target="mainFrame">更改密碼<br />
</a> -<a href="logout.php" target="mainFrame">登出</a>
<?php
	}
?>
</body>
</html>
