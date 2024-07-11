<?php
    $hash = '';
    if (isset($_REQUEST['hash']))
        $hash = $_REQUEST['hash'];

    $pass1 = '';
    if (isset($_REQUEST['pass1']))
        $pass1 = $_REQUEST['pass1'];

    $pass2 = '';
    if (isset($_REQUEST['pass2']))
        $pass2 = $_REQUEST['pass2'];

    $updated = FALSE;

    if ($hash != '' && $pass1 != '' && $pass2 != '' && $pass1 == $pass2 && strlen($pass1) >= 4) {
        require_once './../api/vendor/autoload.php';
        require_once './../api/generated-conf/config.php';

        $token = ForgetpasstokenQuery::create()->filterByToken($hash)->filterByStatus(1)->findOne();
        if ($token) {
            $member = \TAT\Backend\Base\MembersQuery::create()->filterById($token->getMemberid())->findOne();
            if ($member) {
                $member->setPassword($pass1);
                $member->save();

                $token->setStatus(0);
                $token->save();

                $updated = TRUE;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>TAT - reset password</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php
    if ($updated == FALSE) {
        ?>

        <form name="" id="" action="resetPassword.php" method="POST">
            <div class="container reset-bk reset-con-m">
                <input type="hidden" id="hash" name="hash" value="<?php echo $hash; ?>"/>

                <div class="row logo-m-a">
                    <div class="col-xs-6 col-md-2">
                        <img src="img/tat-logo.png" alt="" class="reset-logo"/>
                    </div>
                    <div class="col-xs-6 col-md-10 title-name">
                        Reset Password
                    </div>
                </div>

                <fieldset class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="New Password">
                    <!--<small class="text-muted">We'll never share your email with anyone else.</small>-->
                </fieldset>

                <fieldset class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password">
                    <!--<small class="text-muted">We'll never share your email with anyone else.</small>-->
                </fieldset>

                <button type="submit" class="btn btn-primary-outline col-xs-12 col-sm-3 col-md-2">Confirm</button>

            </div><!-- /.container -->
        </form>
        <?php
    } else {
        ?>
        <div class="container reset-bk reset-con-m">

            <div class="row logo-m-a">
                <div class="col-xs-6 col-md-2">
                    <img src="img/tat-logo.png" alt="" class="reset-logo"/>
                </div>
                <div class="col-xs-6 col-md-10 title-name">
                    Reset Password
                </div>
            </div>

            <fieldset class="form-group">
                <label for="exampleInputEmail1">Password successfully updated</label>
            </fieldset>

        </div>
        <?php
    }
?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
