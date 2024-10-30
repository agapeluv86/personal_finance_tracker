<?php
session_start();
require_once("user_guard.php");
require_once("classes/User.php");
require_once("classes/Expense.php");

$user = new User;
$data = $user->get_user_byid($_SESSION['user_id']);

include_once "partials/header.php";



$e = new Expense;
$expenses = $e->fetch_expenses_by_user_id($_SESSION['user_id']);





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
                    <h5 class="my-3"><i class="fas fa-piggy-bank fa-2x" style="color: Orange;"></i> Expense</h5>
                    <a href="addexpense.php" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i> Add Expense
                    </a>
                </div>

                
                <table class="table table-hover table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        $total_expense = 0;

                        if (empty($expenses)) {
                            ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No entries yet</td>
                            </tr>
                        <?php
                        } else {
                            foreach ($expenses as $expense) {
                                $total_expense += $expense["amount"];
                        ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $expense["description"]; ?></td>
                                <td>&#8358;<?php echo number_format($expense["amount"], 2); ?></td>
                                <td><?php echo $expense["category_name"]; ?></td>
                                <td><?php echo date("d M Y", strtotime($expense["date"])); ?></td>
                                <td>
                                    <a href="update_expense.php?id=<?php echo $expense['expense_id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                    </a>
                                    <a href="expense_delete.php?id=<?php echo $expense['expense_id']; ?>" class="btn btn-danger btn-sm">
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
                    <h5>Total Expense: &#8358;<?php echo number_format($total_expense, 2); ?></h5>
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



  
  
  
