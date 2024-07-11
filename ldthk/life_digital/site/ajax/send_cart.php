<?php

ob_start();
session_start();
include_once '../config.inc.php';
if ($_SESSION['cart'] != null) {
    $link = mysql_connect($db_location, $db_login_id, $db_password);
    if ($link) {
        $db_selected = mysql_select_db($db_name, $link);
        if ($db_selected) {
            mysql_query("SET NAMES 'utf8';");
            $products = "<table><tr>";
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $id = $_SESSION['cart'][$i];
                $result = mysql_query("SELECT `title`, `image` from `product` WHERE `id` = '$id'");
                if (mysql_num_rows($result) > 0) {
                    $products = $products . '<td><img alt="' . mysql_result($result, 0, 'title') . '" src="http://www.ldthk.com/ldt/upload/' . mysql_result($result, 0, 'image') . '"><br/>'.mysql_result($result, 0, 'title') .'</td>';
                }
            }
            $products = $products . "</tr></table>";
        }
        mysql_close($link);
    }
}else{
    $products = '沒有產品';
}

require("../PHPMailer/class.phpmailer.php");

$body = "Name: ".$_POST['name']."<br/>"."Phone: ".$_POST['phone']."<br/>"."Email: ".$_POST['email']."<br/>"."Comment: ".$_POST['comment']."<br/>"."Product: <br/>".$products;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = $smtp_host;
$mail->SMTPSecure = "ssl";
$mail->Port = $smtp_port;
$mail->Username = $sender_email;
$mail->Password = $sender_password;
$webmaster_email = $sender_email;
$email = $recipient_email;
$name = "name";
$mail->From = $webmaster_email;
$mail->FromName = "LDT";
$mail->AddAddress($email, $name);
$mail->AddReplyTo($webmaster_email, "LDT");
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = "Comment from LDT website";
$mail->Body = $body;
$mail->AltBody = $body;
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui" />
        <title>Life Digital</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/foundation.css" />
        <link rel="stylesheet" type="text/css" href="../css/reset.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <script src="../js/vendor/modernizr.js"></script>
    </head>
    <body>
        <script>
            alert('信息已發送');
            window.location = "../cart-shop.php";
        </script>
    </body>
</html>