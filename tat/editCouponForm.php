<?php

    session_start();

    include_once 'api/setting.inc.php';

    $id = 0;
    if (isset($_REQUEST['id']))
        $id = intval($_REQUEST['id']);

    if (isset($_SESSION['login']) && $id > 0) {
        require_once 'api/vendor/autoload.php';
        require_once 'api/generated-conf/config.php';

        $coupon = \TAT\Backend\CouponsQuery::create()->filterById($id)->findOne();
        if ($coupon) {
            $imageURL = 'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
            if ($coupon->getPicurl() != '')
                $imageURL = $globalUploadedImageBaseURL . $coupon->getPicurl();
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
                <meta name="description" content="">
                <meta name="author" content="">
                <link rel="icon" href="favicon.ico">

                <title>TAT Add-on Back-end</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/dashboard.css" rel="stylesheet">

                <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
                <!--[if lt IE 9]>
                <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
                <script src="assets/js/ie-emulation-modes-warning.js"></script>

                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->

            </head>

            <body>

            <?php include "./navbar.php"; ?>

            <div class="container-fluid">
                <div class="row">
                    <?php
                        $current_page = "Coupons";
                        include "./sidebar.php";
                    ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                        <h1 class="page-header">Edit Coupon</h1>

                        <div class="row">
                            <form role="form" action="couponList.php" method="POST" enctype="multipart/form-data"
                                  data-toggle="validator">
                                <input type="hidden" id="couponID" name="couponID" value="<?php echo $id; ?>">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Title</span>
                                    <input type="text" class="form-control" placeholder="Coupon title"
                                           aria-describedby="sizing-addon2" id="title" name="title"
                                           value="<?php echo $coupon->getTitle(); ?>" required>
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Detail</span>
                                    <textarea class="form-control" rows="6" placeholder="Coupon detail" id="comment"
                                              id="detail" name="detail"
                                              required><?php echo $coupon->getDetail(); ?></textarea>
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="basic-addon1">Image:</span>
                                    <img src="<?php echo $imageURL; ?>" width="256" height="256" class="img-responsive">
                                    <input type="file" class="form-control" aria-describedby="basic-addon1"
                                           id="imageFile" name="imageFile">
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="thumbnail-label">Thumbnail:</span>
                                    <img src="<?= 's-' . $imageURL ?>" width="128" height="128" class="img-responsive">
                                    <input type="file" class="form-control" aria-describedby="thumbnail-label"
                                           id="thumbnail"
                                           name="thumbnail">
                                </div>

                                <div class="form-group input-group">
                                    <span>Update edition time?</span>

                                    <label class="radio-inline"><input type="radio" name="updateTime" id="updateTime"
                                                                       value="1" checked>Yes</label>
                                    <label class="radio-inline"><input type="radio" name="updateTime" id="updateTime"
                                                                       value="0">No</label>

                                </div>


                                <div class="form-group input-group">
                                    <button class="btn btn-lg btn-primary btn-block" id="addBannerForm"
                                            name="editCouponForm" type="submit">Update
                                    </button>
                                </div>

                            </form>
                        </div> <!-- /container -->

                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
            <script src="js/bootstrap.min.js"></script>
            <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
            <script src="assets/js/vendor/holder.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="assets/js/ie10-viewport-bug-workaround.js"></script>


            </body>
            </html>

            <?php
        }
    } else {
        header("Location: index.php");
    }
?>