<?php
    session_start();
    require_once "classes/Income.php";
    $income = new Income;

    if (isset($_GET['id'])) {
        $income_id = $_GET['id'];
        $income->delete_income($income_id);
    header("location:finance_income.php");
    exit();
       
    }

   


?>