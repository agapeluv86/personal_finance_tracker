<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Incomecategory.php");

$incomecategory = new Incomecategory;
if(isset($_POST["managebtn"])){
   
    $category_id = sanitizer($_POST["category_id"]);
    $status = sanitizer($_POST["status"]);

   

     if(empty($status) || empty($category_id)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../income_category.php");
        exit();
    }else{
       
        $incomecategory->manage_inccat($category_id,$status);
        $_SESSION['good_msg']= "Manage income category was successful!";
        header("location:../income_category.php");
        exit();
 
    }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../income_category.php");
    exit();
}
?>