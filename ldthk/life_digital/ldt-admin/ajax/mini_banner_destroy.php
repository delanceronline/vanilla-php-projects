<?php

include_once '../config.inc.php';
//$data = json_decode($_POST['models'], true);
//$id = $data[0]['id'];
$id = $_POST['id'];

$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");
        $result = mysql_query("SELECT image from mini_banner WHERE id = '$id'");
        if ($result){
            unlink("../../upload/". mysql_result($result, 0, 'image'));
        }
        $result = mysql_query("DELETE from mini_banner WHERE id = '$id'");
    }
    mysql_close($link);
}
echo 0;