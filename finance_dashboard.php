<?php
session_start();
require_once ("user_guard.php");
require_once("classes/User.php");
require_once("classes/Expense.php");
require_once("classes/income.php");
require_once("classes/Savingsgoal.php");
$user = new User;
$user_id = $_SESSION['user_id'];
$data = $user->get_user_byid($user_id);
include_once "partials/header.php";
$expense = new Expense;
$expenses = $expense->fetch_expenses_by_user_id($_SESSION['user_id']);
$income = new Income;
$incomes= $income->fetch_incomes_by_user_id($_SESSION['user_id']);
$savings = new Savingsgoal;
$savingsgoal= $savings->fetch_savings_by_user_id($_SESSION['user_id']);


$total_income = $income->get_total_income_byuserid($user_id);
$total_expense = $expense->get_total_expense_byuserid($user_id);
$total_savings = $savings->get_total_savingsgoal_byuserid($user_id);

?>




<div class="row">

<?php
  require_once "partials/menu.php";
?>


<div class="col-md-9 p-3">
    <div class="row">
        <div class="col-md-12">
            <h5 class="my-3">Hi, <?php echo ($data['firstname']);?></h5>
            <p class="text-success">You are logged in</p>
            <div class="row">
                <div class="col-md-12 bg-primary p-2 mb-3 text-center text-light rounded">
                    <h2 class="mb-0">FINANCIAL REPORT</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow text-bg-primary mb-3" style="max-width: 18rem; border-radius: 10px;">
                        <div class="card-header text-center fw-bold">Savings - <?php echo count($savingsgoal); ?></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">&#8358;<?php echo number_format($total_savings ?? 0, 2); ?></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow text-bg-info mb-3" style="max-width: 18rem; border-radius: 10px;">
                        <div class="card-header text-center fw-bold">Expenses - <?php echo count($expenses); ?></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">&#8358;<?php echo number_format($total_expense ?? 0, 2); ?></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow text-bg-success mb-3" style="max-width: 18rem; border-radius: 10px;">
                        <div class="card-header text-center fw-bold">Income - <?php echo count($incomes); ?></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">&#8358;<?php echo number_format($total_income ?? 0, 2); ?></h5>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="row">
                <div class="col-md-12">
                    <canvas id="financialChart"></canvas> 
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    const ctx = document.getElementById('financialChart').getContext('2d');
    const financialChart = new Chart(ctx, {
        type: 'pie',  
        data: {
            labels: ['Savings', 'Expenses', 'Income'], 
            datasets: [{
                label: 'Amount (₦)',
                data: [
                    <?php echo $total_savings ?? 0; ?>, 
                    <?php echo $total_expense ?? 0; ?>, 
                    <?php echo $total_income ?? 0; ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', 
                    'rgba(255, 99, 132, 0.2)', 
                    'rgba(75, 192, 192, 0.2)'  
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', 
                    'rgba(255, 99, 132, 1)', 
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script> -->


 
 
<div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
      <?php include_once "partials/footer.php"; ?>