<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Expensecategory.php");

$expensecategory = new Expensecategory;
if(isset($_POST["managebtn"])){
   
    $category_id = sanitizer($_POST["category_id"]);
    $status = sanitizer($_POST["status"]);

   

     if(empty($status) || empty($category_id)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../expense_category.php");
        exit();
    }else{
       
        $expensecategory->manage_expcat($category_id,$status);
        $_SESSION['good_msg']= "Manage expense category was successful!";
        header("location:../expense_category.php");
        exit();
 
    }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../expense_category.php");
    exit();
}
?>