<?php
    session_start();
    require_once("classes/Admin.php");
    $admin = new Admin;
    $admin->signout();
    $_SESSION['good_msg'] = "You have successfully logged out...";
    header("location:admin_login.php");
    exit();

?>