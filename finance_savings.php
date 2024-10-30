<?php
session_start();
require_once("user_guard.php");
require_once("classes/User.php");
require_once("classes/Savingsgoal.php");
require_once("classes/income.php");
require_once("classes/expense.php");

$user = new User;
$data = $user->get_user_byid($_SESSION['user_id']);
include_once "partials/header.php";



 $s = new Savingsgoal;
$savingsgoal= $s->fetch_savings_by_user_id($_SESSION['user_id']);

function calculate_savings($user_id,$start_date, $end_date){ 
    $income = new Income;
    $expense = new Expense;
$income = $income->get_total_income_by_date_range($user_id,$start_date, $end_date);
$expense = $expense->get_total_expense_by_date_range($user_id, $start_date, $end_date);
return $income - $expense;
}

 ?>



<div class="row">
    <?php require_once "partials/menu.php"; ?>

    <div class="col-md-9 p-3">
        <div class="card shadow-sm">
            <div class="card-body">

            <?php
            if (isset($_SESSION["good_msg"])) {
                echo "<div class='alert alert-success'>" . $_SESSION['good_msg'] . "</div>";
                unset($_SESSION['good_msg']);
            }
            ?>
               
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="my-3"> <i class="fas fa-coins fa-2x" style="color: Blue;"></i> Savings</h5>
                    <a href="savings_tracker.php" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i> Add Savings
                    </a>
                </div>

                
                <table class="table table-hover table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Goal Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        $total_savings = 0;

                        if (empty($savingsgoal)) {
                            ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No entries yet</td>
                            </tr>
                        <?php
                        } else {
                            foreach ($savingsgoal as $savings) {
                                $calculated_savings = calculate_savings($savings["user_id"],$savings["start_date"],$savings["end_date"]);
                                $highlight_class = $calculated_savings >= $savings["amount"] ? 'bg-success' : 'bg-danger';
                                $total_savings += $savings["amount"];
                        ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $savings["description"]; ?></td>
                                <td>&#8358;<?php echo number_format($savings["amount"], 2); ?></td>
                                <td><?php echo date("d M Y", strtotime($savings["start_date"])); ?></td>
                                <td><?php echo date("d M Y", strtotime($savings["end_date"])); ?></td>
                                <td class="<?php echo $highlight_class; ?> text-white"> &#8358; <?php echo number_format($calculated_savings, 2); ?></td>

                                <td>
                                    <a href="update_savingsgoal.php?id=<?php echo $savings['savings_goal_id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                    </a>
                                    <a href="savingsgoal_delete.php?id=<?php echo $savings['savings_goal_id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

                
                <div class="d-flex justify-content-end mt-3">
                    <h5>Total Savings: &#8358;<?php echo number_format($total_savings, 2); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

 
 
<div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
      
<?php
include_once "partials/footer.php";
?>