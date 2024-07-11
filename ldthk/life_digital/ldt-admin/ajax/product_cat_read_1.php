<?php
include_once '../config.inc.php';
header('Content-Type: application/json');
$id = $_POST['id'];
$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");
        $container = array();
        $result = mysql_query("SELECT * from product_cat WHERE id = '$id'");
        if ($result){
            $container['id'] = mysql_result($result, 0, 'id');
            $container['title'] = mysql_result($result, 0, 'title');
            $container['sort'] = mysql_result($result, 0, 'sort');
            $container['image'] = mysql_result($result, 0, 'image');
        }
        print(json_encode($container));
    }
    mysql_close($link);
}