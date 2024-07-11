<?php

include_once '../config.inc.php';

if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {
    $allowedExts = array("jpeg", "jpg", "png");
    $extension = end(explode(".", $_FILES["image"]["name"]));
    $t = microtime(true);
    $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
    $fileName = date("Ymdhis") . $micro . '.' . $extension;
    if ((($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/png")) && ($_FILES["image"]["size"] < 2048000) && in_array($extension, $allowedExts)) {
        if ($_FILES["image"]["error"] > 0) {
            $image = $_FILES["image"]["error"];
        } else {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../../upload/" . $fileName);
            $image = $fileName;
        }
    }
}


$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");

        $title = $_POST['title'];
        $sort = date('Y-m-d', strtotime($_POST['sort']));

        if (isset($_POST['id']) && $_POST['id'] != null) {
            $check = true;
            $id = $_POST['id'];
            $result = mysql_query("SELECT * from product_brand WHERE id = '$id'");
            if ($result) {
                if (mysql_result($result, 0, 'title') == $title && date('Y-m-d', strtotime(mysql_result($result, 0, 'sort'))) == $sort && mysql_result($result, 0, 'image') == $image) {
                    $check = false;
                }
                if (!isset($image)){
                    $image = mysql_result($result, 0, 'image');
                }
                if ($check) {
                    $result = mysql_query("UPDATE `product_brand` SET `title`='$title',`sort`='$sort',`image`='$image' WHERE id = '$id'");
                }
            }
        } else {
            $result = mysql_query("INSERT INTO `product_brand`(`title`, `sort`, `image`) values ('$title', '$sort', '$image')");
            $project_id = mysql_insert_id();
        }
    }
    mysql_close($link);
}
header("Location: ../product_brand.php");