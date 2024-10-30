<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Income.php");

$income = new income;
if(isset($_POST["btnupdate"])){
    $desc =sanitizer ($_POST["description"]);
    $amount = sanitizer ($_POST["amount"]);
    $date = sanitizer($_POST["date"]);
    $category_id = sanitizer($_POST["category_id"]);
  $income_id = sanitizer($_POST["income_id"]);
    $user = $_SESSION['user_id'];

   

    if(empty($desc) || empty($amount) || empty($date) || empty($user)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../update_income.php");
        exit();
    }else{
       
        $income->update_income($desc,$amount,$date,$user,$income_id,$category_id);
        $_SESSION['good_msg']= "Income record updated successfully!";
        header("location:../finance_income.php");
        exit();
 
    }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../update_income.php");
    exit();
}
?>