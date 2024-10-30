<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Expensecategory.php");

$expensecategory = new Expensecategory;
if(isset($_POST["btnadd"])){
    $category_name = sanitizer($_POST["category_name"]);
    $category_id =sanitizer($_POST["category_id"]);
    $admin = $_SESSION['admin_id'];
   

    if(empty($category_name) || empty($category_id)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../add_expense_category.php");
        exit();
    }else{
       
        $expensecategory->addcategory($category_name,$category_id);
        $_SESSION['good_msg']="New expense category has been added successfully!";
        header("location:../expense_category.php");
        exit();
        }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../add_expense_category.php");
    exit();
}
?> 