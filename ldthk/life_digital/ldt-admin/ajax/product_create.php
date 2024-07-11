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
        $category = (int)$_POST['category'];
        $sort = date('Y-m-d', strtotime($_POST['sort']));
        $show = date('Y-m-d', strtotime($_POST['show']));
        $brand = (int)$_POST['brand'];
        $model = $_POST['model'];
        if (isset($_POST['new_product'])){
            $new_product = true;
        }else{
            $new_product = false;
        }
        $function = $_POST['function'];
        $description = $_POST['description'];
        $size = $_POST['size'];
		$prodprice = $_POST['prodprice'];
        $dlink = $_POST['link'];

        
        
        if (isset($_POST['id']) && $_POST['id'] != null) {
            $check = true;
            $id = $_POST['id'];
            $result = mysql_query("SELECT * from product WHERE id = '$id'");
            if ($result) {
                if (mysql_result($result, 0, 'title') == $title && date('Y-m-d', strtotime(mysql_result($result, 0, 'sort'))) == $sort && date('Y-m-d', strtotime(mysql_result($result, 0, 'show'))) == $show && mysql_result($result, 0, 'image') == $image && mysql_result($result, 0, 'category_id') == $category && mysql_result($result, 0, 'brand_id') == $brand && mysql_result($result, 0, 'model') == $model && mysql_result($result, 0, 'link') == $dlink && mysql_result($result, 0, 'new_product') == $new_product && mysql_result($result, 0, 'function') == $function && mysql_result($result, 0, 'description') == $description && mysql_result($result, 0, 'size') == $size && mysql_result($result, 0, 'prodprice') == $prodprice) {
                    $check = false;
                }
                if (!isset($image)){
                    $image = mysql_result($result, 0, 'image');
                }else{
                    $result = mysql_query("UPDATE `product_detail` SET `image`='$image' WHERE product_id = '$id'");
                }
                if ($check) {
                    $result = mysql_query("UPDATE `product` SET `title`='$title',`sort`='$sort',`show`='$show',`image`='$image',`category_id`='$category',`brand_id`='$brand',`model`='$model',`new_product`='$new_product',`function`='$function',`description`='$description',`size`='$size',`prodprice`='$prodprice',`link`='$dlink' WHERE id = '$id'");
                }
            }
        } else {
            $result = mysql_query("INSERT INTO `product`(`title`, `sort`, `show`, `image`, `category_id`, `brand_id`, `model`, `new_product`, `function`, `description`, `size`, `prodprice`, `link`) values ('$title', '$sort', '$show', '$image', '$category', '$brand', '$model', '$new_product', '$function', '$description', '$size', '$prodprice', '$dlink')");
            $product_id = mysql_insert_id();
            if (mysql_errno()) { 
                echo "MySQL1 error ".mysql_errno().": ".mysql_error();
            }
            $result = mysql_query("INSERT INTO `product_detail`(`product_id`, `image`) values ('$product_id', '$image')");
        }
    }
    mysql_close($link);
}
header("Location: ../product.php");