<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Income.php");

$income = new Income;
if(isset($_POST["btnadd"])){
    $desc = sanitizer($_POST["description"]);
    $amount = sanitizer($_POST["amount"]);
    $date = sanitizer($_POST["date"]);
    $category_id =sanitizer($_POST["category_id"]);
    $user = $_SESSION['user_id'];
   

    if(empty($desc) || empty($amount) || empty($date) ||empty($category_id)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../incomeexpense.php");
        exit();
    }else{
       
        $income->insertincome($desc,$amount,$date,$user,$category_id);
        $_SESSION['good_msg']= "Income Added successfully!";
        header("location:../finance_income.php");
        exit();
        }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../incomeexpense.php");
    exit();
}
?>