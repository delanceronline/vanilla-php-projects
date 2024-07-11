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
                        <img src="img/ldt/inner-banner-projects.jpg" alt="" width="1120">
                    </div>
                    <?php
                    if (isset($_REQUEST['id'])) {
                        $id = $_REQUEST['id'];
                    } else {
                        header("Location: project.php");
                    }
                    $container = array();
                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                    if ($link) {
                        $db_selected = mysql_select_db($db_name, $link);
                        if ($db_selected) {
                            mysql_query("SET NAMES 'utf8';");
                            $data = mysql_query("SELECT * from `project` WHERE id = '$id'");
                            while ($row = mysql_fetch_array($data)) {
                                if ($row != null) {
                                    $container = $row;
                                }
                            }
                        }
                        mysql_close($link);
                    }
                    ?>
                    <div class="large-12 columns">
                        <ul class="breadcrumbs">
                            <!--<li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="unavailable"><a href="#">Gene Splicing</a></li>
                        <li class="current"><a href="#">Cloning</a></li>-->
                            <li><a href="index.php">主頁</a></li>
                            <li class="unavailable"><a href="#">安裝工程</a></li>
                            <li class="current"><a href="#"><?php echo $container['title'];?></a></li>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">
                        <form class="product-dd-menu">
                            <select name="" id="select-data" class="right product-dd-m news-detail-dd">
                                <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        echo '<option value="default">類別</option>';
                                        $result = mysql_query("SELECT * from project_cat ORDER BY `sort` DESC");
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
                        <h4 class="news-title"><?php echo $container['title'];?></h4>

                        <ul class="example-orbit" data-orbit>
                            <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        $result = mysql_query("SELECT * from project_detail WHERE project_id = '$id'");
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row != null) {
                                                echo '<li><img src="'.$uploaded_image_path.$row['image'].'" alt="'.$container['title'].'" />';
                                                echo '<div class="orbit-caption">'.$container['title'].'</div></li>';
                                            }
                                        }
                                    }
                                    mysql_close($link);
                                }
                                ?>
                        </ul>

                    </div>

                    <div class="medium-3 large-3 columns">
                        <ul class="side-nav right-product-menu">
                            <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        $result = mysql_query("SELECT * from project_cat ORDER BY `sort` DESC");
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row != null) {
                                                echo '<li><a href="project.php?id=' . $row['id'] . '">' . $row['title'] . '</a></li>';
                                            }
                                        }
                                    }
                                    mysql_close($link);
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
                            window.location = "project.php?id="+$('#select-data').val();
                    });
                });
            </script>
            <script type="text/javascript" src="js/init.js"></script>
            <script type="text/javascript" src="js/jquery.vticker-min.js"></script>
            <script src="js/foundation/foundation.orbit.js"></script>
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
