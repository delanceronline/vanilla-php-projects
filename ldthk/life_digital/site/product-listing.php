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
                        <img src="img/ldt/inner-banner-product.jpg" alt="" width="1120">
                    </div>

                    <div class="large-12 columns">
                        <ul class="breadcrumbs">
                            <!--<li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="unavailable"><a href="#">Gene Splicing</a></li>
                        <li class="current"><a href="#">Cloning</a></li>-->
                            <li><a href="index.php">主頁</a></li>
                            <?php
                            if (isset($_REQUEST['cid']) && isset($_REQUEST['bid'])) {
                                $cid = $_REQUEST['cid'];
                                $bid = $_REQUEST['bid'];
                            } else {
                                header("Location: product-brand.php?id=" . $cid);
                            }
                            $link = mysql_connect($db_location, $db_login_id, $db_password);
                            if ($link) {
                                $db_selected = mysql_select_db($db_name, $link);
                                if ($db_selected) {
                                    mysql_query("SET NAMES 'utf8';");
                                    echo '<li><a href="product-cat.php">產品</a></li>';
                                    $result = mysql_query("SELECT `title` from `product_cat` WHERE `id` = '$cid'");
                                    if (mysql_num_rows($result) > 0) {
                                        echo '<li><a href="product-brand.php?id=' . $cid . '">' . mysql_result($result, 0, 'title') . '</a></li>';
                                    }
                                    $result = mysql_query("SELECT `title` from `product_brand` WHERE `id` = '$bid'");
                                    if (mysql_num_rows($result) > 0) {

                                        echo '<li class="current"><a href="#">' . mysql_result($result, 0, 'title') . '</a></li>';
                                    }
                                }
                                mysql_close($link);
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">
                        <h3 class="left">產品</h3>
                        <form>
                            <select name="" id="select-data" class="right product-dd-m">
                                <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        echo '<option value="default">產品類型</option>';
                                        $result = mysql_query("SELECT * from product_cat");
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row != null) {
                                                echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                            }
                                        }
                                    }
                                    mysql_close($link);
                                }
                                ?>
                            </select>
                        </form>

                        <div class="clearfix"></div>

                        <div class="row" id="paging">
                            <?php include_once 'product-listing-paging.php'; ?>
                        </div>

                    </div>

                    <div class="medium-3 large-3 columns">
                        <!--<div class="home-promo left promo-scroll2">
                            <ul>
                                <li><a href="#"><span class="promo-hover"><img src="img/ldt/promo-hover.png" alt="" /></span><img src="img/ldt/1a360334ab593ee1fbd66d05cc70b257.jpg" alt="" /></a></li>
                                <li><a href="#"><span class="promo-hover"><img src="img/ldt/promo-hover.png" alt="" /></span><img src="img/ldt/3cffcc741b8ebe1c4f638edb6262a595.jpg" alt="" /></a></li>
                                <li><a href="#"><span class="promo-hover"><img src="img/ldt/promo-hover.png" alt="" /></span><img src="img/ldt/3cffcc741b8ebe1c4f638edb6262a595.jpg" alt="" /></a></li>
                                <li><a href="#"><span class="promo-hover"><img src="img/ldt/promo-hover.png" alt="" /></span><img src="img/ldt/3cffcc741b8ebe1c4f638edb6262a595.jpg" alt="" /></a></li>
                            </ul>
                        </div>-->
                        <img src="img/ldt/contactus-title.jpg" title="Life Digital Technology Ltd">
                        <ul class="map-con">
                            <li>新界荃灣青山道144-172號荃豐中心地下A38號鋪(港鐵荃灣站B出口)</li>
                            <li>電話 : (852) 2856 9211</li>
                            <li>傳真 : (852) 2856 9210</li>
                            <li>電郵 : (銷售查詢) <a href="mailto:sales@ldthk.com">sales@ldthk.com</a></li>
                            <li class="mail-right-m">(業務查詢) <a href="mailto:info@ldthk.com">info@ldthk.com</a></li>
                        </ul>
                    </div>

                </div>

                <?php include_once 'section/mini-banner.php'; ?>

            </section>
            <!-- Content End -->

            <?php include_once 'section/footer.php'; ?>

            <script src="js/vendor/jquery.js"></script>
            <script src="js/foundation.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#select-data').change(function() {
                        if ($('#select-data').val() != "default")
                            window.location = "product-brand.php?id=" + $('#select-data').val();
                    });
                    var page_now = 1;
                    $('#page-1').addClass("current");
                    function checkClick() {
                        $('.page_num').click(function(e) {
                            e.preventDefault();
                            var page_no = $(this).attr("page-num");
                            if (page_no != page_now){
                                var dataArray = [<?php echo $cid . ', ' . $bid;?>, page_no];
                                $.ajax({
                                    url: "product-listing-paging.php",
                                    type: "POST",
                                    data: {dataArray: dataArray},
                                    success: function(data) {
                                        $('#paging').html(data);
                                        $('.page_no').removeClass("current");
                                        $('#page-' + page_no).addClass("current");
                                        page_now = page_no;
                                        checkClick();
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.info("Response: " + jqXHR.responseText);
                                        console.info(textStatus + ": " + errorThrown);
                                    }
                                });
                            }
                        });

                        $('#prev_page').click(function(e) {
                            e.preventDefault();
                            var page_no = page_now - 1;
                            if ($('#page-' + page_no).length > 0) {
                                var dataArray = [<?php echo $cid . ', ' . $bid;?>, page_no];
                                $.ajax({
                                    url: "product-listing-paging.php",
                                    type: "POST",
                                    data: {dataArray: dataArray},
                                    success: function(data) {
                                        $('#paging').html(data);
                                        $('.page_no').removeClass("current");
                                        $('#page-' + page_no).addClass("current");
                                        page_now = page_no;
                                        checkClick();
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.info("Response: " + jqXHR.responseText);
                                        console.info(textStatus + ": " + errorThrown);
                                    }
                                });
                            }
                        });

                        $('#next_page').click(function(e) {
                            e.preventDefault();
                            var page_no = page_now + 1;
                            if ($('#page-' + page_no).length > 0) {
                                var dataArray = [<?php echo $cid . ', ' . $bid;?>, page_no];
                                $.ajax({
                                    url: "product-listing-paging.php",
                                    type: "POST",
                                    data: {dataArray: dataArray},
                                    success: function(data) {
                                        $('#paging').html(data);
                                        $('.page_no').removeClass("current");
                                        $('#page-' + page_no).addClass("current");
                                        page_now = page_no;
                                        checkClick();
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.info("Response: " + jqXHR.responseText);
                                        console.info(textStatus + ": " + errorThrown);
                                    }
                                });
                            }
                        });
                    }
                    checkClick();
                });
            </script>
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
