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

                    <div class="large-12 columns">
                        <ul class="breadcrumbs">
                            <!--<li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="unavailable"><a href="#">Gene Splicing</a></li>
                        <li class="current"><a href="#">Cloning</a></li>-->
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><a href="#">安裝工程</a></li>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">
                        <h3 class="left">安裝工程</h3>
                        <?php
                        if (isset($_REQUEST['id'])){
                            $cat = $_REQUEST['id'];
                            $link = mysql_connect($db_location, $db_login_id, $db_password);
                            if ($link) {
                                $db_selected = mysql_select_db($db_name, $link);
                                if ($db_selected) {
                                    mysql_query("SET NAMES 'utf8';");
                                    $result = mysql_query("SELECT * from project_cat WHERE id = '$cat'");
                                    if (mysql_num_rows($result) > 0) {
                                        echo '<h3 class="left small-proj-t">- '.mysql_result($result, 0, 'title').'</h3><div class="clearfix"></div>';
                                    }
                                }
                                mysql_close($link);
                            }
                        }else{
                            $cat = 0;
                        }
                        ?>

                        <form class="product-dd-menu">
                            <select name="" id="select-data" class="right product-dd-m">
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

                        <div class="clearfix"></div>

                        <div class="row" id="paging">
                            <?php include_once 'project-paging.php'; ?>
                        </div>
                        <div class="clearfix"></div>
                        
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
                                                echo '<li><a href="project.php?id=' . $row['id'] . '"><div class="img-style-mm">' . $row['title'] . '</div></a></li>';
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
                    var page_now = 1;
                    $('#page-1').addClass("current");
                    function checkClick() {
                        $('.page_num').click(function(e) {
                            e.preventDefault();
                            var page_no = $(this).attr("page-num");
                            if (page_no != page_now){
                                var dataArray = [<?php echo $cat;?>, page_no];
                                $.ajax({
                                    url: "project-paging.php",
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
                                var dataArray = [<?php echo $cat;?>, page_no];
                                $.ajax({
                                    url: "project-paging.php",
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
                                var dataArray = [<?php echo $cat;?>, page_no];
                                $.ajax({
                                    url: "project-paging.php",
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
