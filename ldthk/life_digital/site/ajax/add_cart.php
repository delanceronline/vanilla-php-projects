<?php

ob_start();
session_start();
$id = $_POST['id'];
if (isset($_SESSION['cart'])) {
    $check = true;
    for($i = 0; $i < sizeof($_SESSION['cart']);$i++){
        if ($_SESSION['cart'][$i]==$id){
            $check = false;
            break;
        }
    }
    if ($check){
        array_push($_SESSION['cart'], $id);
        echo 1;
    }else{
        echo 0;
    }
}else{
    $_SESSION['cart'] = array();
    array_push($_SESSION['cart'], $id);
    echo 1;
}