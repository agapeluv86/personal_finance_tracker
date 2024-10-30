<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once("../classes/User.php");


$user = new User;
if(isset($_POST['btnregister'])){
$fname = sanitizer ($_POST['fname']);
$lname = sanitizer ($_POST['lname']);
$email = sanitizer ($_POST['phone']);
$phone = sanitizer ($_POST['email']);
$pass1 = sanitizer ($_POST['pass1']);
$pass2 = sanitizer ($_POST['pass2']);

$available = $user->check_email($email);


if(($pass1 != $pass2) || empty($pass1)){
    $_SESSION['errormsg'] = "the two passwords must match and must not be blank";
    header("location:../signup.php");
    exit();

}
elseif($available){
    $_SESSION['errormsg'] = "The email is taken";
    header("location:../signup.php");
    exit(); 
}
elseif(empty($fname) || empty($lname) || empty($email)){


$_SESSION['errormsg'] = "please ensure you supply your firstname, lastname and email";
header("location:../signup.php");
exit();

}else{

   
$user->register($fname,$lname,$phone,$email,$pass1);
    $_SESSION['good_msg'] = "Thank you for joining! Please login";
    header('location:../login.php');
    exit();
}
}else{
    $_SESSION['errormsg'] = "Oops!please complete the form";
    header("location:../signup.php");
    exit();
}  

?>