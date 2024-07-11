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

<p>property.soldgood.com 是Soldgood Media 公司製作的網上地產平台。專為網上揾樓放盤的用家製作，未來將配合Mobile Apps 一起使用，無論用用家身處何地，都可即時揾樓睇樓放盤。更重要的是，property.soldgood.com 是完全免費， 所有放盤均無需收費，只希望透過提供一個創作一個新穎兼具娛樂性的樓盤資訊分享平台。以所有對樓盤有需求的用家為服務對象，擺脫一般地產網站資訊煩瑣，搜尋繁複的問題，企o係用家o個邊諗，以最快、最準的搜尋方式俾用家即時搵到或放到心水樓盤。24小時全天候睇盤，求盤，建立強大的樓盤交流資料庫及睇樓網品牌，無論你係買樓賣樓人仕或者是地產代理，一樣感受到睇住網為你度身訂做的網站服務。真正做到日睇夜又睇，睇邊住邊隨您話事的服務宗旨。</p>
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
