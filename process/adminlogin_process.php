<?php 
session_start();
require_once "../classes/Admin.php";
error_reporting(E_ALL);

$admin =new Admin;

if(isset($_POST['btnlogin'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // echo "<pre>";
    // print_r($_POST);
    //   echo "</pre>";
    //   die;
    if(empty($username) || empty($password)){
        $_SESSION['errormsg']= "please fill all fields";
        header("location:../admin_login.php");
        exit();
    }else{
        $result= $admin->login($username,$password);
        if($result){
            $_SESSION['admin_id'] = $result;
            header("location:../admin_dashboard.php");
            exit();
        }else{
            
            header("location:../admin_login.php");
            exit();
        }
       
    }
}else{
    $_SESSION['errormsg']= "please fill the form and click the login button";
    header("location:../admin_login.php");
    exit();
}

?>