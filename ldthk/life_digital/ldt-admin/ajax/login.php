<?php
ob_start();
session_start();

include_once '../config.inc.php';

if ($_POST['username'] == $backend_username && $_POST['password'] == $backend_password){
    $_SESSION['id'] = 1;
}

header("Location: ../index.php");