<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui" />
<title>Life Digital</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<div class='loadingcover'></div>

<?php include_once 'section/menu.php'; ?>

<!-- Content Start -->
<section id="main-content">
<div class="row">
	<div class="large-12 columns banner-margin-m">
    	<img src="img/ldt/inner-banner-contactus.jpg" alt="" width="1120">
    </div>
    
    <div class="large-12 columns">
		<ul class="breadcrumbs">
        	<!--<li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li class="unavailable"><a href="#">Gene Splicing</a></li>
            <li class="current"><a href="#">Cloning</a></li>-->
            <li><a href="index.php">主頁</a></li>
            <li class="current"><a href="#">聯絡我們</a></li>
        </ul>
    </div>
    
    <div class="medium-7 large-7 columns margin-bottom-mm">
        <h3>聯絡我們</h3>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <div id="map-canvas"></div>
    </div>
    
    <div class="medium-5 large-5 columns">
        <ul class="map-con">
        	<li><img src="img/ldt/contactus-title.jpg" alt=""></li>
            <li>新界荃灣青山道144-172號荃豐中心地下A38號鋪(港鐵荃灣站B出口)</li>
            <li>電話 : (852) 2856 9211</li>
            <li>傳真 : (852) 2856 9210</li>
            <li>電郵 : (銷售查詢) <a href="mailto:sales@ldthk.com">sales@ldthk.com</a></li>
            <li class="mail-right-m">(業務查詢) <a href="mailto:info@ldthk.com">info@ldthk.com</a></li>
        </ul>
    </div>
              
</div>
</section>
<!-- Content End -->

<?php include_once 'section/footer.php'; ?>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript" src="js/jquery.vticker-min.js"></script>
<!--[if lte IE 7]>
  <script src="js/localization/en_US.js"></script>
  <script src="js/warning.js"></script>
  <script>
    window.onload=function(){
      ie6Warning(function() {
        var languageMap = {};
          //specifies a JSON hash table for localization
        if(window.IE6WarningLocalizations) {
          languageMap = window.IE6WarningLocalizations;
        }
        
        return {
          imgPath: "", //specifies the path to the icons of each browser
          localizations:  languageMap
        };
      });
    };
  </script>
<![endif]-->
<script type="text/javascript">
	$(document).foundation();
</script>
</body>
</html>
