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
                        <img src="img/ldt/inner-banner-news.jpg" alt="" width="1120">
                    </div>

                    <div class="large-12 columns">
                        <ul class="breadcrumbs">
                            <!--<li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="unavailable"><a href="#">Gene Splicing</a></li>
                        <li class="current"><a href="#">Cloning</a></li>-->
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><a href="#">最新消息</a></li>
                        </ul>
                    </div>

                    <?php
                    if (isset($_REQUEST['id'])) {
                        $id = $_REQUEST['id'];
                    } else {
                        header("Location: news.php");
                    }
                    $container = array();
                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                    if ($link) {
                        $db_selected = mysql_select_db($db_name, $link);
                        if ($db_selected) {
                            mysql_query("SET NAMES 'utf8';");
                            $result = mysql_query("SELECT max(`show`) AS `max_show`, min(`show`) AS `min_show` from `news`");
                            if (mysql_num_rows($result) > 0) {
                                $time_now = date('Y');
                                $max_date = date('Y', strtotime(mysql_result($result, 0, 'max_show')));
                                if ($time_now < $max_date) {
                                    $max_date = $time_now;
                                }
                                $min_date = date('Y', strtotime(mysql_result($result, 0, 'min_show')));
                            }
                            $data = mysql_query("SELECT * from `news` WHERE id = '$id'");
                            while ($row = mysql_fetch_array($data)) {
                                if ($row != null) {
                                    $container = $row;
                                }
                            }
                        }
                        mysql_close($link);
                    }
                    ?>

                    <div class="medium-9 large-9 columns margin-bottom-mm">

                        <h4 class="news-title"><?php echo $container['title']; ?></h4>
                        <form class="product-dd-menu">
                            <select id="select-data" id="select-data" class="right product-dd-m news-detail-dd">
                                <?php
                                echo '<option value="default">年份</option>';
                                for ($i = $max_date; $i >= $min_date; $i--) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </form>

                        <div class="row">
                            <?php
                            if ($container['image'] != "") {
                                echo '<div class="large-6 columns"><img src="' . $uploaded_image_path . $container['image'] . '"/></div>';
                            }
                            ?>

                            <div class="large-<?php echo $container['image'] != "" ? '6' : '12'; ?> columns">
                                <h4 class="date-news"><?php echo $container['show']; ?></h4>
                                <?php echo $container['description']; ?>
                                <div class="large-6 large-centered columns">
                                    <?php
                                    if ($container['link'] != "") {
                                        echo '<a href="' . $container['link'] . '" class="button round expand">產品詳細資料</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="medium-3 large-3 columns">
                        <ul class="side-nav right-product-menu">
                            <?php
                            for ($i = $max_date; $i >= $min_date; $i--) {
                                echo '<li><a href="news.php?id=' . $i . '">' . $i . '</a></li>';
                            }
                            ?>
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
                        if ($('#select-data').val()!="default")
                            window.location = "news.php?id="+$('#select-data').val();
                    });
                });
            </script>
            <script type="text/javascript" src="js/init.js"></script>
            <script type="text/javascript" src="js/jquery.vticker-min.js"></script>
            <script type="text/javascript" src="js/foundation/foundation.reveal.js"></script>
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
