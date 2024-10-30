<?php
session_start();
require_once("admin_guard.php");
require_once("classes/Incomecategory.php");
require_once ("classes/Admin.php");
$admin = new Admin;
$admin->get_admin_id($_SESSION["admin_id"]);
include_once "partials/admin_header.php";


$inccat = New Incomecategory;
$inccate = $inccat->display_inccat();


?>


<div class="row">
    <?php require_once "partials/admin_menu.php"; ?>

    <div class="col-md-9 p-3">
       
        <div class="card shadow-sm">
            <div class="card-header bg-light text-dark">
            <?php
            if (isset($_SESSION["good_msg"])) {
                echo "<div class='alert alert-success'>" . $_SESSION['good_msg'] . "</div>";
                unset($_SESSION['good_msg']);
            }
            ?>
                <h5 class="my-3">
                    <i class="fas fa-money-bill-wave fa-3x me-3" style="color: green;"></i> Income Category
                </h5>
                <a href="add_income_category.php" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i> Add Category
                    </a>
            </div>
            
            <div class="card-body">
                
            <table class="table table-bordered table-striped table-hover">
    <thead class="table-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        foreach ($inccate as $inccat) {
           
            $statusClass = $inccat['status'] === 'active' ? 'bg-success' : 'bg-secondary';
            $statusIcon = $inccat['status'] === 'active' ? 'fa-check-circle' : 'fa-ban';
            $statusText = $inccat['status'] === 'active' ? 'Active' : 'Disabled';

           
            $actionBtnClass = $inccat['status'] === 'active' ? 'btn-danger' : 'btn-success';
            $actionIcon = $inccat['status'] === 'active' ? 'fa-ban' : 'fa-check';
            $actionText = $inccat['status'] === 'active' ? 'Disable' : 'Enable';
        ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo ($inccat["name"]); ?></td>
                <td>
                    <span class="badge <?php echo $statusClass; ?>">
                        <i class="fa <?php echo $statusIcon; ?>"></i> <?php echo $statusText; ?>
                    </span>
                </td>
                <td>
                    <a href="update_income_cat.php?id=<?php echo $inccat['category_id']; ?>" class="btn btn-warning btn-sm me-1">
                        <i class="fa fa-edit"></i> Update
                    </a>
                    <form action="process/disable_inccat.php" method="post" class="d-inline">
                        <input type="hidden" name="category_id" value="<?php echo $inccat['category_id']; ?>">
                        <input type="hidden" name="status" value="<?php echo $inccat['status']; ?>">
                        <button name="managebtn" type="submit" class="btn <?php echo $actionBtnClass; ?> btn-sm">
                            <i class="fa <?php echo $actionIcon; ?>"></i> <?php echo $actionText; ?>
                        </button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>

 
<div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
      <?php include_once "partials/footer.php"; ?>

 