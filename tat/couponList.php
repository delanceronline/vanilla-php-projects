<?php

    session_start();

    include_once 'api/setting.inc.php';

    if (isset($_SESSION['login'])) {
        require_once 'api/vendor/autoload.php';
        require_once 'api/generated-conf/config.php';

        // delete a coupon if any
        if (isset($_REQUEST['deleteCouponForm']) && isset($_REQUEST['couponID'])) {
            $coupon = \TAT\Backend\CouponsQuery::create()->findById(intval($_REQUEST['couponID']));
            if ($coupon)
                $coupon->delete();
        }

        // add a new coupon if any
        if (isset($_REQUEST['addCouponForm'])) {
            $title = '';
            if (isset($_REQUEST['title']))
                $title = $_REQUEST['title'];

            $detail = '';
            if (isset($_REQUEST['detail']))
                $detail = $_REQUEST['detail'];

            if ($title != '' && $detail != '') {
                $coupon = new \TAT\Backend\Coupons();
                $coupon->setTitle($title);
                $coupon->setDetail($detail);
                if (key_exists('imageFile', $_FILES)) {
                    $imageFilename = \TAT\Backend\S3ImageUploader::upload_image($_FILES['imageFile']);
                    $coupon->setPicurl($imageFilename);
                }
                if (key_exists('thumbnail', $_FILES))
                    \TAT\Backend\S3ImageUploader::upload_image($_FILES['thumbnail'], (isset($imageFilename)) ? 's-' . $imageFilename : "");
                $coupon->setCreationdate(time());
                $coupon->setEditiondate(time());
                $coupon->save();

                $db_devices = \TAT\Backend\DevicesQuery::create()->find();
                foreach ($db_devices as $db_device) {
                    $devices[] = new \TAT\Backend\PushNotification\Device($db_device->getRegistrationId());
                }
                $notification = new \TAT\Backend\PushNotification\Notification($devices, []);
                $notification->notification->title = $title;
                $notification->notification->body = $detail;
                (new \TAT\Backend\PushNotification\Client())->sendNotification($notification);
            }
        }

        // update a coupon if any
        if (isset($_REQUEST['editCouponForm'])) {
            $title = '';
            if (isset($_REQUEST['title']))
                $title = $_REQUEST['title'];

            $detail = '';
            if (isset($_REQUEST['detail']))
                $detail = $_REQUEST['detail'];

            $couponID = 0;
            if (isset($_REQUEST['couponID']))
                $couponID = $_REQUEST['couponID'];


            if ($title != '' && $detail != '' && $couponID > 0) {
                $coupon = \TAT\Backend\CouponsQuery::create()->filterById($couponID)->findOne();
                if ($coupon) {
                    $coupon->setTitle($title);
                    $coupon->setDetail($detail);

                    if (key_exists('imageFile', $_FILES)) {
                        $imageFilename = S3ImageUploader::upload_image($_FILES['imageFile']);
                        $coupon->setPicurl($imageFilename);
                    }
                    if (key_exists('thumbnail', $_FILES))
                        S3ImageUploader::upload_image($_FILES['thumbnail'], (isset($imageFilename)) ? 's-' . $imageFilename : "");

                    $updateTime = 0;
                    if (isset($_REQUEST['updateTime']))
                        $updateTime = intval($_REQUEST['updateTime']);

                    if ($updateTime == 1)
                        $coupon->setEditiondate(time());

                    $coupon->save();
                }
            }
        }

        $coupons = \TAT\Backend\CouponsQuery::create()->orderByEditiondate(Propel\Runtime\ActiveQuery\Criteria::DESC)->find();
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

        <?php
            $coupon_page = true;
            include "./navbar.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                    $current_page = "Coupons";
                    include "./sidebar.php";
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Coupons</h1>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Creation Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach ($coupons as $coupon) {
                                    $imageURL = 'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
                                    if ($coupon->getPicurl() != '')
                                        $imageURL = $globalUploadedImageBaseURL . $coupon->getPicurl();
                                    ?>

                                    <tr>
                                        <td><img src="<?php echo $imageURL; ?>" width="100" height="100"
                                                 class="img-responsive" alt="Generic placeholder thumbnail"></td>
                                        <td><?php echo $coupon->getTitle(); ?></td>
                                        <td><?php echo date('l jS \of F Y h:i:s A', $coupon->getEditiondate()->getTimestamp()); ?></td>
                                        <td><a href="editCouponForm.php?id=<?php echo $coupon->getId(); ?>"
                                               class="btn btn-default" role="button">Edit</a></td>
                                        <td>
                                            <button type="button" class="btn btn btn-warning" data-toggle="modal"
                                                    data-target="#deleteModal<?php echo $coupon->getId(); ?>">Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <div id="deleteModal<?php echo $coupon->getId(); ?>" class="modal fade"
                                         role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Warning</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete this item?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-md-4">
                                                        <form method="POST" action="couponList.php"><input id="couponID"
                                                                                                           name="couponID"
                                                                                                           type="hidden"
                                                                                                           value="<?php echo $coupon->getId(); ?>"/>
                                                            <button type="submit" class="btn btn-warning"
                                                                    id="deleteCouponForm" name="deleteCouponForm">DELETE
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <?php
                                }
                            ?>

                            </tbody>
                        </table>
                    </div>
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
    } else {
        header("Location: index.php");
    }
?>