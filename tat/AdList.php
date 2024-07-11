<?php

    session_start();

    include_once 'api/setting.inc.php';

    if (isset($_SESSION['login'])) {
        require_once 'api/vendor/autoload.php';
        require_once 'api/generated-conf/config.php';

        // add a new ad banner if any
        if (isset($_REQUEST['addBannerForm'])) {
            if (isset($_FILES['bannerFile']) && $_FILES['bannerFile']['size'] <= $globalAWSS3FilesizeLimit) {
                require_once 'api/S3/S3.php';

                $target_file = basename($_FILES["bannerFile"]["name"]);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $bannerFilename = time() . '-' . rand(0, 9999) . '.' . $imageFileType;

                $s3 = new S3($globalAWSAccessKey, $globalAWSSecretKey);
                if (!$s3->putObject($s3->inputFile($_FILES["bannerFile"]["tmp_name"], false), $globalAWSS3Bucket, 'uploaded/' . $bannerFilename, S3::ACL_PUBLIC_READ))
                    $bannerFilename = '';

                $ad = new \TAT\Backend\Ads();
                $ad->setFilename($bannerFilename);
                $ad->setUrl($_POST['url']);
                $ad->setCreationdate(time());
                $ad->save();
            }
        }

        // delete a banner if any
        if (isset($_REQUEST['deleteBannerForm']) && isset($_REQUEST['adID'])) {
            $ad = \TAT\Backend\AdsQuery::create()->findById(intval($_REQUEST['adID']));
            if ($ad)
                $ad->delete();
        }

        $ads = \TAT\Backend\AdsQuery::create()->orderByCreationdate(Propel\Runtime\ActiveQuery\Criteria::DESC)->find();
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
            $ads_page = true;
            include "./navbar.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                    $current_page = "Ads";
                    include "./sidebar.php";
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Ad Banners</h1>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Link</th>
                                <th>Creation Date</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($ads as $ad) {
                                    $imageURL = 'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
                                    if ($ad->getFilename() != '')
                                        $imageURL = $globalUploadedImageBaseURL . $ad->getFilename();
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $imageURL; ?>" width="100" height="100"
                                                 class="img-responsive" alt="Generic placeholder thumbnail"></td>
                                        <td><a href="<?= $ad->getUrl() ?>">link</a></td>
                                        <td><?php echo date('l jS \of F Y h:i:s A', $ad->getCreationdate()->getTimestamp()); ?></td>
                                        <td>
                                            <button type="button" class="btn btn btn-warning" data-toggle="modal"
                                                    data-target="#deleteModal<?php echo $ad->getId(); ?>">Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <div id="deleteModal<?php echo $ad->getId(); ?>" class="modal fade" role="dialog">
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
                                                        <form method="POST" action="AdList.php"><input id="adID"
                                                                                                       name="adID"
                                                                                                       type="hidden"
                                                                                                       value="<?php echo $ad->getId(); ?>"/>
                                                            <button type="submit" class="btn btn-warning"
                                                                    id="deleteBannerForm" name="deleteBannerForm">DELETE
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