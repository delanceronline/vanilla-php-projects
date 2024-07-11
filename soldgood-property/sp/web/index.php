<?php
include_once ('./inc/config.inc.php');
include_once ('./lib/MySQLConnector.php');
$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);

$language = 0;
$language_type = 'Chinese (Hong Kong S.A.R.)';
if(isset($_REQUEST['language']))
	$language = $_REQUEST['language'];
if($language == 1)
	$language_type = 'English';

if($connector)
{
	$connector->Execute("SET NAMES 'utf8';");
	
	include_once ('./lib/TPaging.php');	
	$paging = new TPaging(25, 4, 2, "index.php", $connector->GetCount("WHERE id > 0", "supplies"), "language=$language", "");
	$paging->Paginate();	
	
	$properties = array();
	$connector->GetRows($properties, "WHERE id > 0 ORDER BY modified_date DESC LIMIT ".$paging->GetStartIndex().", ".$paging->GetItemsPerPage(), "supplies");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include ("meta.php") ?>
</head>

<body>
<!-- Wrapper -->
<div class="wrapper">
<?php include ("header.php") ?>
<!-- ********************************************************* main content start  *************************************-->
<div class="content">

<!-- *********** flat view + paging bar ***********-->
<!-- flat view -->
<div id="flatview">
<ul class="flatview2">
<li><a href="listView.php">表列顯示</a></li>
<li><a href="index.php">縮圖顯示</a></li>
</ul>
</div>
<!-- flat view end-->
<!-- top paging bar-->
<?php
	$paging->Render();
?>
<!-- top paging bar end-->
<!-- *********** flat view + paging bar ***********-->


<!-- *********** flat grid or list ***********-->
<?php
	foreach($properties as $property)
	{
		$tn = "images/tnt.jpg";
		if($property['icon'] != "")
			$tn = "./../files/".$property['icon'];
			
		$connector->GetOneRow($district, "WHERE id = {$property['district_id']} AND language_type='$language_type'", 'districts');
		
		$price = $property['unit_price'];
		if($property['unit_price'] >= 10000)
			$price = round($property['unit_price'] * 0.00001, 2);
?>
<div class="gridview">
<div class="gridviewcontent">
<table border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
     <tr bgcolor="#FFFFFF">
        <td align="left" class="thumb"><a href="flatDetails.php?id=<?php echo $property['id']; ?>&language=<?php echo $language; ?>"><img src="<?php echo $tn; ?>" width="160" height="120" border="0"/></a> 
        </td>
        </tr>
        <tr>
        <td align="center">
        <table height="110" border="0" cellpadding="5" cellspacing="0" width="100%">
          <tr>
            <td align="left" valign="middle" class="blue bottomborder">地區</td>
            <td align="left" valign="middle" class="bottomborder"><?php echo $district['value']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="blue bottomborder">名稱</td>
            <td align="left" valign="middle" class="bottomborder"><?php echo $property['estate']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="blue bottomborder">面積</td>
            <td align="left" valign="middle" class="bottomborder"><?php echo $property['area']; ?>&nbsp;呎 </td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="blue bottomborder">價錢</td>
            <td align="left" valign="middle" class="bottomborder">$<?php echo $price; ?><?php if($property['unit_price'] >= 10000){ ?>萬<?php }else{?>元<?php } ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="blue bottomborder">分享</td>
            <td align="left" valign="middle" class="bottomborder">
            <a name="fb_share" type="icon" share_url="http://property.soldgood.com/web/flatDetails.php?id=<?php echo $property['id']; ?>&language=<?php echo $language; ?>"></a> <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://property.soldgood.com/web/flatDetails.php?id=<?php echo $property['id']; ?>&language=<?php echo $language; ?>" data-count="none">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            <a href="http://service.t.sina.com.cn/share/share.php?url=http%3A%2F%2Fproperty.soldgood.com%2Fweb%2FflatDetails.php%3Fid=<?php echo $property['id']; ?>%26language=<?php echo $language; ?>&title=SoldGood%20Property&pic=http%3A%2F%2Fproperty.soldgood.com%2Fweb%2Fimages%2Flogo.png" target="_blank"><img src="images/ico_sina.png" width="26" height="26" class="shareicon" border="0"/></a>
            </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
</div>
</div>
<?php
	}
?>
<!-- grid view end -->

<!-- *********** flat grid or list ***********-->
</div>

<!-- ********************************************************* main content end  *************************************-->


<!-- footer -->
<? include("footer.php") ?>
<!-- footer end -->

</div>
<!-- wrapper end -->
</body>
</html>
<?php
}
?>
