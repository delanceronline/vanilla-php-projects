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
                            <li class="current"><a href="#">購物車</a></li>
                        </ul>
                    </div>

                    <div class="medium-9 large-9 columns margin-bottom-mm">

                        <h3 class="left">購物車</h3>
                        <!--<form>
                        <select name="" class="right product-dd-m">
                              <option value="LCD TV">LCD TV</option>
                          <option value="DVD / Blu-ray Player">DVD / Blu-ray Player</option>
                          <option value="Hi-Fi / Home Theater">Hi-Fi / Home Theater</option>
                          <option value="TV Mount">TV Mount</option>
                          <option value="Air Conditioner">Air Conditioner</option>
                          <option value="Washing Machine">Washing Machine</option>
                          <option value="Refrigerator">Refrigerator</option>
                          <option value="Antenna">Antenna</option>
                          <option value="Mobile">Mobile</option>
                          <option value="Set-top Box">Set-top Box</option>
                          <option value="Media TV Box">Media TV Box</option>
                          <option value="Accessories">Accessories</option>
                          <option value="Dehumidifiers">Dehumidifiers</option>
                          <option value="Power Bank">Power Bank</option>
                            </select>
                        </form>-->

                        <div class="clearfix"></div>
                        <form data-abide class="form-mm-style" method="POST" action="ajax/send_cart.php">
                                <?php
                                if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                                    if ($link) {
                                        echo '<div class="row">';
                                        $db_selected = mysql_select_db($db_name, $link);
                                        if ($db_selected) {
                                            mysql_query("SET NAMES 'utf8';");
                                            $i = 0;
                                            $count = 0;
                                            while ($count < sizeof($_SESSION['cart'])) {
                                                if (isset($_SESSION['cart'][$i])) {
                                                    $id = $_SESSION['cart'][$i];
                                                    $result = mysql_query("SELECT `title`, `image` from `product` WHERE `id` = '$id'");
                                                    if (mysql_num_rows($result) > 0) {
                                                        echo '<div class="large-4 small-6 columns left"><div id="cartitemsajax" class="left"><div class="cartitem">';
                                                        echo '<div class="cartimage"><img alt="' . mysql_result($result, 0, 'title') . '" src="' . $uploaded_image_path . mysql_result($result, 0, 'image') . '"></div>';
                                                        echo '<div class="carttext"><p>' . mysql_result($result, 0, 'title') . '<a class="del" data-id="' . $id . '" data-quantity="' . mysql_result($result, 0, 'title') . '" href="#delete" data-reveal-id="cancelproduct">DELETE</a></p></div>';
                                                        echo '</div></div></div>';
                                                        $count++;
                                                    }
                                                }
                                                $i++;
                                            }
                                        }
                                        echo '</div>';
                                        mysql_close($link);
                                    }
                                }else{
                                    echo '<div class="form-mm-style non-product">沒有產品</div>';
                                }
                                ?>
                            

                            <div class="clearfix"></div>

                            <div class="form-mm-style">
                                <div class="name-field">
                                    <label>姓名 <small>必須</small>
                                        <input type="text" id="name" name="name" required placeholder="Chan Tai Man">
                                    </label>
                                    <small class="error" id="er-name">姓名必須填寫</small>
                                </div>

                                <div class="tel-field">
                                    <label>聯絡電話 <small>必須</small>
                                        <input type="text" id="phone" name="phone" required pattern="([0-9]{4})\2([0-9]{4})" placeholder="61231234">
                                    </label>
                                    <small class="error" id="er-phone">聯絡電話必須填寫</small>
                                </div>

                                <div class="email-field">
                                    <label>電郵 <small>必須</small>
                                        <input type="email" id="email" name="email" required pattern="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" placeholder="example@example.com">
                                    </label>
                                    <small class="error" id="er-email">電郵電話必須填寫</small>
                                </div>

                                <div class="extarea-field">
                                    <label>查詢 
                                    	<div class="inquiry-mm">請填寫聯絡人資料及其電話號碼或需要查詢資料，本公司會於下一個工作天致電人客核對資料，然後電郵或傳真單據給人客送貨服務。</div>
                                        <textarea placeholder="查詢" name="comment"></textarea>
                                    </label>
                                </div>

                                <div class="large-6 large-centered columns"><button type="submit" id="submit" class="button round expand ldt-b">Submit</button></div>

                            </div>

                        </form>

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
            <div id="cancelproduct" class="reveal-modal popup" data-reveal>
                <form data-abide class="form-mm-style" method="POST" action="ajax/del_cart.php">
                    <h2 class="add-title" id="title"></h2><!-- get the product namr -->
                    <input type="hidden" id="id" name="id">
                    <p class="add-content">確認要取消這產品?</p>
                    <div class="large-6 large-centered columns"><button type="submit" class="button round expand ldt-b">Submit</button></div>
                </form>
                <a class="close-reveal-modal">&#215;</a>
            </div>
            <!-- popup -->

            <script src="js/vendor/jquery.js"></script>
            <script src="js/foundation.min.js"></script>
            <script>
                $(document).ready(function() {
                    var eok = false, pok = false;
                    $("#submit").attr("disabled", true);
                    $('#name').on('keyup change paste cut click', function() {
                        if ($('#name').val() == '')
                            $("#er-name").show("fade");
                        else
                            $("#er-name").hide("fade");
                        checkOK();
                    });
                    $('#email').change(function() {
                        $("#email").val($("#email").val().toLowerCase());
                        var jsSrcRegex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
                        var str = $("#email").val();
                        if ($('#email').val() != '') {
                            if (jsSrcRegex.exec(str) == null) {
                                $("#er-email").show("fade");
                                eok = false;
                            } else {
                                $("#er-email").hide("fade");
                                eok = true;
                            }
                        }
                        checkOK();
                    });
                    $('#phone').change(function() {
                        var jsSrcRegex = /^([0-9]{4})\2([0-9]{4})$/;
                        var str = $("#phone").val();
                        if ($('#phone').val() != '') {
                            if (jsSrcRegex.exec(str) == null) {
                                $("#er-phone").show("fade");
                                pok = false;
                            } else {
                                $("#er-phone").hide("fade");
                                pok = true;
                            }
                        }
                        checkOK();
                    });
                    function checkOK() {
                        if (eok && pok && $('#name').val() != '')
                            $("#submit").attr("disabled", false);
                        else
                            $("#submit").attr("disabled", true);
                    }
                    $('a.del').click(function(e) {
                        $('#id').val($(this).attr("data-id"));
                        $('#title').html($(this).attr("data-quantity"));
                    });
                    $('#add_cart').click(function() {
                        var id = $(this).attr("data-id");
                        var dataString = 'id=' + id;
                        $.ajax({
                            url: "ajax/add_cart.php",
                            type: "POST",
                            data: dataString,
                            success: function(data) {
                                //alert();
                                //$('#addcart').modal('show');
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
