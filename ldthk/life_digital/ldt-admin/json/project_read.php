<?php
include_once '../config.inc.php';
$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");
        $container = array();
        $result = mysql_query("SELECT p.*, c.title AS cat_title FROM `project` AS p INNER JOIN `project_cat` AS c ON p.category = c.id;");
        while ($row = mysql_fetch_object($result)) {
            if ($row != null) {
                $container[] = $row;
            }
        }
            print(json_encode($container));
    }
    mysql_close($link);
}