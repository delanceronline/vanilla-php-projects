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
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                            } else {
                                header("Location: product-cat.php");
                            }
                            $link = mysql_connect($db_location, $db_login_id, $db_password);
                            if ($link) {
                                $db_selected = mysql_select_db($db_name, $link);
                                if ($db_selected) {
                                    mysql_query("SET NAMES 'utf8';");
                                    $result = mysql_query("SELECT p.*, c.title AS cat_title, b.title AS brand_title FROM `product` AS p INNER JOIN `product_cat` AS c ON p.category_id = c.id INNER JOIN `product_brand` AS b ON b.id = p.brand_id WHERE p.id = '$id';");
                                    if ($data_row = mysql_fetch_array($result)) {
                                        echo '<li><a href="product-cat.php">產品</a></li>';
                                        echo '<li><a href="product-brand.php?id=' . $data_row['category_id'] . '">' . $data_row['cat_title'] . '</a></li>';
                                        echo '<li><a href="product-listing.php?cid=' . $data_row['category_id'] . '&bid=' . $data_row['brand_id'] . '">' . $data_row['brand_title'] . '</a></li>';
                                        echo '<li class="current"><a href="#">' . $data_row['title'] . '</a></li>';
                                    }
                                }
                                mysql_close($link);
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">

                        <h3 class="left">產品詳情</h3>
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

                        <div class="row">
                            <div class="large-6 columns">
                                <ul class="example-orbit product-d-img" data-orbit>
                                    <?php
                                $link = mysql_connect($db_location, $db_login_id, $db_password);
                                if ($link) {
                                    $db_selected = mysql_select_db($db_name, $link);
                                    if ($db_selected) {
                                        mysql_query("SET NAMES 'utf8';");
                                        $result = mysql_query("SELECT * from product_detail WHERE product_id = '$id'");
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row != null) {
                                                echo '<li><img src="' . $uploaded_image_path . $row['image'] . '" alt="' . $data_row['title'] . '" /></li>';
                                            }
                                        }
                                    }
                                    mysql_close($link);
                                }
                                ?>
                                </ul> 

                                <div class="row">
                                    <?php
                                    $check = false;
                                    if (isset($_SESSION['cart'])){
                                        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                                            if ($id == $_SESSION['cart'][$i]){
                                                $check = true;
                                                break;
                                            }
                                        }
                                    }
                                    if (isset($data_row['id'])){
                                        if ($check){
                                            echo '<div class="large-6 large-centered columns"><a class="button ldt-b round expand" id="add_cart" data-reveal-id="addcart" data-id="'.$id.'" href="#" disabled>添加購物車</a></div>';
                                        }else{
                                            echo '<div class="large-6 large-centered columns"><a class="button ldt-b round expand" id="add_cart" data-reveal-id="addcart" data-id="'.$id.'" href="#">添加購物車</a></div>';
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                            <div class="large-6 columns">
                                <h4 class="product-d-title"><?php echo $data_row['title']; ?></h4>
                                <div class="product-d-mm clearfix">
                                    <!--<p class="clearfix"><div class="p-t-mm left">屏幕尺吋:</div><div class="p-t-mm2 left">55 吋</div></p>
                                    <p class="clearfix"><div class="p-t-mm left">解像度:</div><div class="p-t-mm2 left">1920x1080</div></p>
                                    <p class="clearfix"><div class="p-t-mm left">屏幕比例:</div><div class="p-t-mm2 left">16:9</div></p>
                                    <p class="clearfix"><div class="p-t-mm left">功能:</div><div class="p-t-mm2 left">Smart Box (Android™平台) / 3D Refresh Rate 240Hz / Regza Engine Pro / USB多媒體播放器 (支援RMVB, H.264, XviD等格式) / Dolby Digital</div></p>
                                    <p class="clearfix"><div class="p-t-mm left">售價:</div><div class="p-t-mm2 left">HK$17280.00</div></p>
                                    <p class="clearfix"><div class="p-t-mm left">保養期:</div><div class="p-t-mm2 left">2年上門(零件及人工)</div></p>-->
                                    <table> 
                                        <tbody> 
                                            <tr> 
                                                <td width="25%" align="left" valign="top">類別:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['cat_title']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">品牌:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['brand_title']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">型號:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['model']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">功能:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['function']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">規格:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['description']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">呎吋:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['size']; ?></td> 
                                            </tr>
                                            <tr> 
                                                <td width="25%" align="left" valign="top">售價:</td> 
                                                <td width="75%" align="left" valign="top"><?php echo $data_row['prodprice']; ?></td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <?php if($data_row['link']!=""){?>
                                <div class="prod-dec-all">
                                    <h4 class="title">產品規格</h4>
                                    <p><a href="<?php echo $data_row['link']; ?>">如欲查詢產品詳細資料請按此瀏覽官方網頁</a></p>
                                    <p>訂購及查詢熱線: (852) 2856 9211</p>
                                </div>
                                <?php }?>

                                <hr>

                            </div>
                        </div>

                    </div>

                    <div class="medium-3 large-3 columns">
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

            <!-- popup -->
            <div id="addcart" class="reveal-modal popup" data-reveal>
                <h2 class="add-title">添加購物車</h2>
                <p class="add-content">已經成功添加購物車</p>
                <a class="close-reveal-modal">&#215;</a>
            </div>
            <!-- popup -->

            <script src="js/vendor/jquery.js"></script>
            <script src="js/foundation.min.js"></script>
            
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
            <script>
                $(document).ready(function() {
                    $('#select-data').change(function() {
                        if ($('#select-data').val()!="default")
                            window.location = "product-brand.php?id="+$('#select-data').val();
                    });
                    $('#add_cart').click(function() {
                        var id = $(this).attr("data-id");
                        var dataString = 'id=' + id;
                        $.ajax({
                            url: "ajax/add_cart.php",
                            type: "POST",
                            data: dataString,
                            success: function(data) {
                                $('#cart_size').html('Cart ('+(parseInt(<?php echo isset($_SESSION['cart'])?sizeof($_SESSION['cart']):0;?>)+parseInt(data))+')');
                                $("#add_cart").attr("disabled", true);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.info("Response: " + jqXHR.responseText);
                                console.info(textStatus + ": " + errorThrown);
                            },
                        });
                    });
                });
            </script>
            <script type="text/javascript" src="js/init.js"></script>
        </body>
    </html>
