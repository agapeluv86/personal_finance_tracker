<?php
    session_start();
    require_once "classes/Savingsgoal.php";
    $savingsgoal = new Savingsgoal;

    if (isset($_GET['id'])) {
        $savings_goal_id = $_GET['id'];
        $savingsgoal->delete_savingsgoal($savings_goal_id);
    header("location:finance_savings.php");
    exit();
       
    }

   


?>