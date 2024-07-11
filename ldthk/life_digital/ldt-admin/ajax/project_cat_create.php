<?php

include_once '../config.inc.php';

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
            $result = mysql_query("SELECT * from project_cat WHERE id = '$id'");
            if ($result) {
                if (mysql_result($result, 0, 'title') == $title && date('Y-m-d', strtotime(mysql_result($result, 0, 'sort'))) == $sort) {
                    $check = false;
                }
                if ($check) {
                    $result = mysql_query("UPDATE `project_cat` SET `title`='$title',`sort`='$sort' WHERE id = '$id'");
                }
            }
        } else {
            $result = mysql_query("INSERT INTO `project_cat`(`title`, `sort`) values ('$title', '$sort')");
            $project_id = mysql_insert_id();
        }
    }
    mysql_close($link);
}
header("Location: ../project_cat.php");