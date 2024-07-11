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
                        <img src="img/ldt/inner-banner-aboutus.jpg" alt="" width="1120">
                    </div>

                    <div class="large-12 columns">
                        <ul class="breadcrumbs">
                            <!--<li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="unavailable"><a href="#">Gene Splicing</a></li>
                        <li class="current"><a href="#">Cloning</a></li>-->
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><a href="#">關於我們</a></li>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">
                        <h3>關於我們</h3>
                        <p>生活數碼科技有限公司 致力為顧客提供最優質及多元化產品服務。本公司擁有專業的技術團隊，為各層面之客戶，包括私人以至中小企業提供專業意見及產品技術支援。本公司設有門市，另提供網上購物及電話訂購服務，方便顧客不同之需要。</p>
                        <p>產品銷售方面，專營各大品牌影音產品、數碼產品、家庭電器及其他電視影音周邊產品及配件。</p>
                        <p>我們與全球3大品牌(全中國第一品牌) TCL 合作，荃灣門市為 TCL 專賣店，提供專業的服務，令顧客更有信心保證。</p>
                        <p>我們的業務除了產品銷售外，更設有多元化服務。包括提供專業的一站式服務，為客人設計、安裝各種影音組合、家庭電器、電視掛牆或天花安裝服務。 本公司已領取政府認可之電工A牌及小型工程承辦商牌照(類別2)</p>
                        <p> 以下資料是我們近年合作之部份客戶名單:</p>
                        <ul class="list-style-m">
                            <li>TCL Overseas Marketing Limited</li>
                            <li>南中國科技(貿易)有限公司</li>
                            <li>弘毅有限公司</li>
                            <li>吉野家快餐(香港)有限公司</li>
                            <li>Maria's Bakery Company Limited</li>
                            <li>Able Grain Limited</li>
                            <li>T & O Technology Limited </li>
                            <li>嘉輪貨灣城有限公司</li>
                            <li>香港警察</li>
                        </ul>

                    </div>

                    <div class="medium-3 large-3 columns">
                        <h4 class="about-title">我們的產品</h4>

                        <ul class="side-nav right-product-menu">
                            <?php
                            $link = mysql_connect($db_location, $db_login_id, $db_password);
                            if ($link) {
                                $db_selected = mysql_select_db($db_name, $link);
                                if ($db_selected) {
                                    mysql_query("SET NAMES 'utf8';");
                                    $result = mysql_query("SELECT * from product_cat");
                                    while ($row = mysql_fetch_array($result)) {
                                        if ($row != null) {
                                            echo '<li><a href="product-brand.php?id=' . $row['id'] . '">' . $row['title'] . '</a></li>';
                                        }
                                    }
                                }
                                mysql_close($link);
                            }
                            ?>
                        </ul>

                        <form class="product-dd-menu">
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
                            window.location = "product-brand.php?id="+$('#select-data').val();
                    });
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
