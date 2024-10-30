<?php
session_start();
require_once "user_guard.php";
require_once("classes/Expense.php");
require_once("classes/Expensecategory.php");
include_once "partials/header.php";

if (isset($_GET['id'])) {
    $expense_id = $_GET['id'];
    $expense = new Expense;
    $updated_expense = $expense->fetch_expense_by_id($expense_id);
}

$expense_category = new Expensecategory;
$expense_categories = $expense_category->display_active_expcat();

?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                
               
            <?php
            if (isset($_SESSION["errormsg"])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['errormsg'] . "</div>";
                unset($_SESSION['errormsg']);
            }
            ?>

            <?php
            if (isset($_SESSION["good_msg"])) {
                echo "<div class='alert alert-success'>" . $_SESSION['good_msg'] . "</div>";
                unset($_SESSION['good_msg']);
            }
            ?>

               
                     <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Update Expense</h3>
                    </div>
                    <div class="card-body">
                <form action="process/update_expense_process.php" method="post">


                           
                           
                <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                        value="<?php echo ($updated_expense['description']); ?>">
                    </div>

                           
                    <div class="form-group mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount"  step="0.01" id="amount" class="form-control"
                        value="<?php echo ($updated_expense['amount']); ?>">
                    </div>

                           
                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control"
                        value="<?php echo ($updated_expense['date']); ?>">
                    </div>
                          
                            
                    <div class="form-group mb-3">
                         <label for="category_id" class="form-label"></label>
                            <select name="category_id" id="category_id" class="form-select">
                             <option selected disabled>Select Category</option>
                            <?php
                            foreach ($expense_categories as $category) {
                             $selected = ($category['category_id'] == $updated_expense['category_id']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($category['category_id']) . "' $selected>" 
                                 . htmlspecialchars($category['category_name']) . "</option>";
                        }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="expense_id"></label>
                        <input type="hidden" name="expense_id" id="expense_id" class="form-control"
                        value="<?php echo ($expense_id); ?>">
                    </div>

                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="btnupdate">Update Expense</button>
                    </div>
                   
                   </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

     
     <div class="row mt-5">
      <div class="col-md-12 bg-info text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
    
      <?php include_once "partials/footer.php"; ?>


