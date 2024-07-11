<?php
	
	$pt = "";
	if(isset($_REQUEST['pt']))
		$pt = $_REQUEST['pt'];	

	$pd = "";
	if(isset($_REQUEST['pd']))
		$pd = $_REQUEST['pd'];	
	
	$pi = "";
	if(isset($_REQUEST['pi']))
		$pi = $_REQUEST['pi'];
	
	$coupon = "";
	if(isset($_REQUEST['coupon']))
		$coupon = $_REQUEST['coupon'];
		
	$terms = "";
	if(isset($_REQUEST['terms']))
		$terms = nl2br($_REQUEST['terms']);
	
	$ti = "";
	if(isset($_REQUEST['ti']))
		$ti = $_REQUEST['ti'];	
	
	$start_date = "";
	if(isset($_REQUEST['start_date']))
		$start_date = $_REQUEST['start_date'];	
	
	$start_time = "";
	if(isset($_REQUEST['start_time']))
		$start_time = $_REQUEST['start_time'];	

	$end_date = "";
	if(isset($_REQUEST['end_date']))
		$end_date = $_REQUEST['end_date'];	
	
	$end_time = "";
	if(isset($_REQUEST['end_time']))
		$end_time = $_REQUEST['end_time'];	
		
	$language = 0;
	if(isset($_REQUEST['language']))
		$language = intval($_REQUEST['language']);

	if($language == 0)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>著數卡資料</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #005669;
}
</style>
</head>

<body>

<table width="320" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<!-- content start -->
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
    <td><img src="html_images/title.png" width="237" height="28" /></td>
</tr>
<tr>
<td class="whitetitle">Jetso Card</td>
</tr>

<?php if($pt != "") { ?>  
<tr><td><p><span class="whitePlain"><?php echo $pt; ?></span></p></td></tr>
<?php } ?>

<?php if($pd != "") { ?>  
<tr><td><span class="whitetitle">Jetso Card Detail</span><p><span class="whitePlain"><?php echo $pd; ?></span></p></td></tr>
<?php } ?>

<?php if($pi != "") { ?>
<tr><td><p><img src="<?php echo $pi; ?>" border="0" /></p></td></tr>
<?php } ?>

<?php if($coupon != "") { ?>
<tr><td><p><img src="<?php echo $coupon; ?>" border="0" /></p></td></tr>
<?php } ?>

<?php if($start_date != "" && $start_time != "" && $end_date != "" && $end_time != "") { ?>
<tr><td><span class="whitetitle">Valid Peroid:</span><p><span class="whitePlain"><?php echo $start_date.' '.$start_time; ?> to <?php echo $end_date.' '.$end_time; ?></span></p></td></tr>
<?php } ?>


<?php if($terms != "") { ?>
<tr><td><span class="whitetitle">Terms of Use</span><p><span class="whitePlain"><?php echo $terms; ?></span></p></td></tr>
<?php } ?>

<?php if($ti != "") { ?>
<tr><td><span class="whitetitle">Terms of Use</span><p><img src="<?php echo $ti; ?>" border="0" /></p></td></tr>
<?php } ?>

</table>
<!-- content end -->
    </td>
  </tr>
</table>
</body>
</html>
<?php
	}
	else if($language == 1)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>著數卡資料</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #005669;
}
</style>
</head>

<body>

<table width="320" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<!-- content start -->
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
    <td><img src="html_images/title.png" width="237" height="28" /></td>
</tr>
<tr>
<td class="whitetitle">著數卡優惠</td>
</tr>

<?php if($pt != "") { ?>  
<tr><td><p><span class="whitePlain"><?php echo $pt; ?></span></p></td></tr>
<?php } ?>

<?php if($pd != "") { ?>  
<tr><td><span class="whitetitle">著數卡詳情</span><p><span class="whitePlain"><?php echo $pd; ?></span></p></td></tr>
<?php } ?>

<?php if($pi != "") { ?>
<tr><td><p><img src="<?php echo $pi; ?>" border="0" /></p></td></tr>
<?php } ?>

<?php if($coupon != "") { ?>
<tr><td><p><img src="<?php echo $coupon; ?>" border="0" /></p></td></tr>
<?php } ?>

<?php if($start_date != "" && $start_time != "" && $end_date != "" && $end_time != "") { ?>
<tr><td><span class="whitetitle">使用期限</span><p><span class="whitePlain"><?php echo $start_date.' '.$start_time; ?> 至 <?php echo $end_date.' '.$end_time; ?></span></p></td></tr>
<?php } ?>


<?php if($terms != "") { ?>
<tr><td><span class="whitetitle">使用條款</span><p><span class="whitePlain"><?php echo $terms; ?></span></p></td></tr>
<?php } ?>

<?php if($ti != "") { ?>
<tr><td><span class="whitetitle">使用條款</span><p><img src="<?php echo $ti; ?>" border="0" /></p></td></tr>
<?php } ?>

</table>
<!-- content end -->
    </td>
  </tr>
</table>
</body>
</html>
<?php
	}
?>