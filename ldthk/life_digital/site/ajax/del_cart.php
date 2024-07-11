<?php
ob_start();
session_start();
$id = $_POST['id'];
if(($i = array_search($id, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$i]);
}
header("Location: ../cart-shop.php");