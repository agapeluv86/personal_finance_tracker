<?php 
session_start();
include_once "partials/admin_header.php";

?>


<div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <h3 style="margin-bottom:30px;"> Admin Login</h3>
     
  </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>". $_SESSION['errormsg']. "</div>";
    unset($_SESSION['errormsg']);

  };
 
 
  ?>
                <form action="process/adminlogin_process.php" method="post">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control border-dark"><br>
                    <label for="password">Password</label>
                    <input type="password" name="pass" id="password" placeholder="Enter Password"class="form-control border-dark"><br>
                    <button type="submit" name="btnlogin" class="btn btn-lg btn-primary">Login</button>

                     <br></br>

                </form>
            </div>
        </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
	</div>
