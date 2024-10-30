<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Expensecategory.php");

$expensecategory = new Expensecategory;
if(isset($_POST["btnupdate"])){
    $category_name =sanitizer ($_POST["category_name"]);
    $category_id = sanitizer($_POST["category_id"]);
    $admin = $_SESSION['admin_id'];

   

     if(empty($category_name) || empty($category_id)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../update_exp_cat.php");
        exit();
    }else{
       
        $expensecategory->update_expensecategory($category_name,$category_id);
        $_SESSION['good_msg']= "Expense category updated successfully!";;
        header("location:../expense_category.php");
        exit();
 
    }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../update_exp_cat.php");
    exit();
}
?>