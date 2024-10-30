<?php
session_start();
    require_once("admin_guard.php");
    require_once "classes/Admin.php";
    include_once "partials/admin_header.php";
    $admin = new Admin;
    $a = $admin->get_admin_id($_SESSION['admin_id']);
    



   
?>

<div class="row">
    <?php require_once "partials/admin_menu.php"; ?>

    <div class="col-md-9 p-3">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="my-3">Welcome, <?php echo $a['admin_username']; ?></h5>
                <p>You are logged in</p>
            </div>

            <div class="card-body">
                <div class="row">
                   
                    <div class="col-md-4">
                        <a href="expense_category.php" class="text-decoration-none">
                            <div class="card mb-5 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body text-center">
                                    <i class="fas fa-piggy-bank fa-5x" style="color: Orange;"></i>
                                    <h6 class="mt-3">Expenses Category</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-4">
                        <a href="income_category.php" class="text-decoration-none">
                            <div class="card mb-5 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body text-center">
                                    <i class="fas fa-money-bill-wave fa-5x" style="color: Green;"></i>
                                    <h6 class="mt-3">Income Category</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                   
                    <div class="col-md-4">
                        <a href="admin_savingsgoal.php" class="text-decoration-none">
                            <div class="card mb-5 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body text-center">
                                    <i class="fas fa-coins fa-5x" style="color: Blue;"></i>
                                    <h6 class="mt-3">Savings Goals</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
          
