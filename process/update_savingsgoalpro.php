<?php
error_reporting(E_ALL);
session_start();
require_once("../classes/Utility.php");
require_once ("../classes/Savingsgoal.php");

$savingsgoal = new Savingsgoal;
if(isset($_POST["btnupdate"])){
    $desc =sanitizer ($_POST["description"]);
    $amount = sanitizer ($_POST["amount"]);
    $startdate = sanitizer($_POST["start_date"]);
    $enddate = sanitizer($_POST["end_date"]);
    $savings_goal_id = sanitizer($_POST["savings_goal_id"]);
    

   

    if(empty($desc) || empty($amount) || empty($startdate) || empty($enddate)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../update_savingsgoal.php");
        exit();
    }else{
       
        $savingsgoal->update_savings($desc,$amount,$startdate,$enddate,$savings_goal_id);
        $_SESSION['good_msg']= "Saving record updated successfully!";
        header("location:../finance_savings.php");
        exit();
 
    }
}else{
    $_SESSION["errormsg"] = "Please fill the form";
    header("location:../update_savingsgoal.php");
    exit();
}
?>