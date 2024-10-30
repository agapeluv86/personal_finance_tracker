<?php
    session_start();
    require_once "classes/Expense.php";
    $expense = new Expense;

    if (isset($_GET['id'])) {
        $expense_id = $_GET['id'];
        $expense->delete_expense($expense_id);
    header("location:finance_expense.php");
    exit();
       
    }

   


?>