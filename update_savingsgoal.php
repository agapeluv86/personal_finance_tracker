<?php
session_start();
require_once "user_guard.php";
require_once ("classes/Savingsgoal.php");
include_once "partials/header.php";
if (isset($_GET['id'])) {
    $savings_goal_id = $_GET['id'];
    $savingsgoal = new Savingsgoal;
    $updated_savingsgoal = $savingsgoal->fetch_savingsgoal_by_id($savings_goal_id);
}

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
                        <h3>Update Savings</h3>
                    </div>
                    <div class="card-body">
                        <form action="process/update_savingsgoalpro.php" method="post">

                            
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                value="<?php echo ($updated_savingsgoal['description']); ?>">
                            </div>

                           
                            <div class="form-group mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="amount" step="0.01" id="amount" class="form-control"
                                value="<?php echo ($updated_savingsgoal['amount']); ?>">
                            </div>

                           
                            <div class="form-group mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                value="<?php echo ($updated_savingsgoal['start_date']); ?>">
                            </div>

                           
                            <div class="form-group mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                value="<?php echo ($updated_savingsgoal['end_date']); ?>">
                            </div>

                           
                            <input type="hidden" name="savings_goal_id" value="<?php echo ($savings_goal_id); ?>">

                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="btnupdate">Update Savings</button>
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
	</div>
      <?php include_once "partials/footer.php"; ?>


