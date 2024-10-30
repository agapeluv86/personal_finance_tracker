<?php
session_start();
require_once("admin_guard.php");
require_once("classes/admin.php");
require_once("classes/Expensecategory.php");

$admin = new Admin;
$expense_category = new Expensecategory;
$admin_id = $_SESSION['admin_id'];





include_once "partials/admin_header.php";


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
                        <h3>Add Expense Category</h3>
                    </div>
                    <div class="card-body">
                       <form action="process/expense_category_process.php" method="post">

                           
                            <div class="form-group mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" name="category_name" id="category_name" class="form-control">
                            </div>



                            <input type="hidden" name="category_id" value="<?php echo 'CAT-' . mt_rand(1000, 9999); ?>">

                           
                          <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="btnadd">Add Category</button>
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
