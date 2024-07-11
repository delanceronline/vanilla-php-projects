<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
.STYLE2 {color: #FF0000; font-size: 36px;}
-->
</style>
</head>

<body>
<?php
	if(isset($_SESSION['login_id']))
	{
?>
<div align="center" class="STYLE2">強記</div>
<?php
	}
?>
</body>

</html>
