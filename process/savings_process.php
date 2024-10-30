<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Savingsgoal.php");

$savingsgoal = new Savingsgoal;

if(isset($_POST["btnsaved"])){
    $desc = sanitizer($_POST["description"]);
    $amount = sanitizer($_POST["amount"]);
    $startdate = sanitizer($_POST["start_date"]);
    $enddate = sanitizer($_POST["end_date"]);
    $user = $_SESSION['user_id'];
   

    if(empty($desc) || empty($amount) || empty($startdate) || empty($enddate)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../savings_tracker.php");
        exit();
    }else{
       
        $savingsgoal->insertsavingsgoal($desc,$amount,$startdate,$enddate,$user);
        $_SESSION['good_msg']= "Savings Added successfully!";
        header("location:../finance_savings.php");
        exit();
        }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../savings_tracker.php");
    exit();
}
?>