<?php

include_once '../config.inc.php';

$id = $_POST['id'];

$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");
        $result = mysql_query("DELETE from project_cat WHERE id = '$id'");
    }
    mysql_close($link);
}
echo 0;