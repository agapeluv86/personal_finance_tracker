<?php
session_start();
require_once("user_guard.php");
require_once("classes/User.php");
require_once("classes/Expense.php");
require_once("classes/Expensecategory.php");
$user = new User;
$expense_category = new Expensecategory;
$user_id = $_SESSION['user_id'];
$data = $user->get_user_byid($user_id);
$expense_categories = $expense_category->display_active_expcat();

include_once "partials/header.php";

$e = new Expense;
$expenses= $e->fetch_expenses_by_user_id($user_id);


?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
           

           <?php
            if (isset($_SESSION["good_msg"])) {
                echo "<div class='alert alert-success'>" . $_SESSION['good_msg'] . "</div>";
                unset($_SESSION['good_msg']);
            }
            ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Expense</h3>
                </div>
                <div class="card-body">
                    <form action="process/addexpense_process.php" method="post">

                        
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="amount" step="0.01" id="amount" class="form-control">
                            </div>
                       

                        
                            <div class="form-group mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label"></label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option selected disabled>Select Category</option>
                                    <?php
                                    foreach ($expense_categories as $category) {
                                        echo "<option value='" . $category['category_id'] . "'>" . htmlspecialchars($category['category_name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="btnadd">
                             Add Expense
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    

     <div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
      <?php include_once "partials/footer.php"; ?>



 