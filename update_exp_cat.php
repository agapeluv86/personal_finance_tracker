<?php
session_start();
require_once "admin_guard.php";
require_once("classes/Expensecategory.php");
include_once "partials/admin_header.php";
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
   $expensecategory = new Expensecategory;
    $updated_category = $expensecategory->fetch_expcat_by_id($category_id);
}

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

               
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Update Expense Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="process/update_expcat_process.php" method="post">

                            
                            <div class="form-group mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" name="category_name" id="category_name" class="form-control" 
                                value="<?php echo ($updated_category['category_name']); ?>">
                            </div>

                            
                            <input type="hidden" name="category_id" value="<?php echo ($updated_category['category_id']); ?>">

                          
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="btnupdate">Update Category</button>
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


