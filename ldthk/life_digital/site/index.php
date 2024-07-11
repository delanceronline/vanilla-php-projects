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

            <!-- Banner Start -->
            <section id="courses-banner-large">
                <div class="row">
                    <div class="large-12 medium-12 columns banner-image">

                        <div class="row row-slide-banner">
                            <ul class="example-orbit-content main-banner" data-orbit>
                                <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        $result = mysql_query("SELECT * from `main_banner` ORDER BY `sort` DESC");
                                        $i = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row != null) {
                                                $time_now = new DateTime(date('Y-m-d', strtotime('+6HOUR')));
                                                $show_time = new DateTime(date('Y-m-d', strtotime($row['show'])));
                                                $since_start = $show_time->diff($time_now);
                                                if ($since_start->invert == 0) {
                                                    echo '<li data-orbit-slide="headline-' . $i++ . '"><div class="slide-mm">';
                                                    echo '<img src="' . $uploaded_image_path . $row['image'] . '" alt="' . $row['title'] . '" />';
                                                    echo '</div></li>';
                                                }
                                            }
                                        }
                                    }
                                    mysql_close($link);
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
            <!-- Banner End -->

            <section id="main-content" class="home-mm">

                <div class="row">
                    <!--<hr>-->
                    <div class="large-12 columns main-con-t">
                        <h3>最新產品</h3>
                        <!--<h4 class="subheader">It’s now even faster to put together websites and applications.</h4>-->
                    </div>
                </div>

                <div class="row main-product-t">
                    <?php
                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                    if ($link) {
                        $db_selected = mysql_select_db($db_name, $link);
                        if ($db_selected) {
                            mysql_query("SET NAMES 'utf8';");
                            $result = mysql_query("SELECT * from `product` WHERE `new_product` = true ORDER BY `sort` DESC");
                            $i = 0;
                            while ($row = mysql_fetch_array($result)) {
                                if ($row != null) {
                                    $time_now = new DateTime(date('Y-m-d', strtotime('+6HOUR')));
                                    $show_time = new DateTime(date('Y-m-d', strtotime($row['show'])));
                                    $since_start = $show_time->diff($time_now);
                                    if ($since_start->invert == 0) {
                                        echo '<div class="large-3 small-6 columns"><div class="clientcontainer">';
                                        echo '<a href="product-detail.php?id='.$row['id'].'"><img src="'.$uploaded_image_path . $row['image'].'"><h4>'.$row['title'].'</h4>';
                                        //echo '<p class="main-pp">'.$row['description'].'</p>';
                                        echo '</a></div></div>';
                                        $i++;
                                        if ($i >= 4){
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                        mysql_close($link);
                    }
                    ?>
                </div>

                <div class="row">
                    <hr>
                </div>

                <div class="row">
                    <div class="large-12 columns heading2 index-news-1">
                        <h3>最新消息</h3>
                    </div>

                    <?php
					
                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                    if ($link) {
                        
						$db_selected = mysql_select_db($db_name, $link);
                        if ($db_selected) {
                            
							mysql_query("SET NAMES 'utf8';");
                            $result = mysql_query("SELECT * from `news` ORDER BY `sort` DESC");
                            $i = 0;
							
                            while ($row = mysql_fetch_array($result)) {
                                if ($row != null) {
                                    
									$time_now = new DateTime(date('Y-m-d', strtotime('+6HOUR')));									
                                    $show_time = new DateTime(date('Y-m-d', strtotime($row['show'])));
                                    $since_start = $show_time->diff($time_now);                                    
									if ($since_start->invert == 0) {
                                        echo '<div class="large-3 columns index-news"><a href="news-detail.php?id=' . $row['id'] . '">';
                                        echo '<h4 class="index-title">' . $row['title'] . '</h4>';
                                        echo '<h4 class="date-news">' . $row['show'] . '</h4>';                                        
                                        echo '</a></div>';
                                        $i++;
                                        if ($i >= 4){
                                            break;
                                        }
                                    }
                                }								
                            }							
                        }
						
                        mysql_close($link);
						
                    }
					
                    ?>
                </div>

                <?php include_once 'section/mini-banner.php'; ?>

            </section>

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
