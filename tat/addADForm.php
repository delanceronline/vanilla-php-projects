<?php

    session_start();

    include_once 'api/setting.inc.php';

    if (isset($_SESSION['login'])) {
        require_once 'api/vendor/autoload.php';
        require_once 'api/generated-conf/config.php';

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
                    $current_page = "Ads";
                    include "./sidebar.php";
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Add New Banner</h1>

                    <div class="row">
                        <form class="form-signin" action="AdList.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Banner image file:</span>
                                <input type="file" class="form-control" aria-describedby="basic-addon1" id="bannerFile"
                                       name="bannerFile">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="url-label"">URL:</span>
                                <input type="text" class="form-control" aria-describedby="url-label" id="url"
                                       name="url">
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" id="addBannerForm" name="addBannerForm"
                                    type="submit">Upload
                            </button>
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
    } else {
        header("Location: index.php");
    }
?>