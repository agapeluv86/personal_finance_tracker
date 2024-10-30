<?php
  session_start();
  include_once "partials/header.php";
?>
 

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h3 class="text-center heading-title mb-4">LOGIN</h3>
      
     
      <?php 
        if(isset($_SESSION['errormsg'])){
          echo "<div class='alert alert-danger text-center'>". $_SESSION['errormsg']. "</div>";
          unset($_SESSION['errormsg']);
        }
        if(isset($_SESSION['good_msg'])){
          echo "<div class='alert alert-success text-center'>". $_SESSION['good_msg']. "</div>";
          unset($_SESSION['good_msg']);
        }
      ?>

     
      <div class="card shadow-lg border-0 rounded-lg p-4">
        <form action="process/login_process.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control border-dark" placeholder="Enter Email Address" name="email" id="email">
          </div>
          
          <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control border-dark" placeholder="Enter Password" id="pass" name="pass">
          </div>
          
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" checked>
            <label class="form-check-label" for="remember">Remember me</label>
          </div>

          <div class="d-grid">
            <button type="submit" name="btnlogin" value="1" class="btn btn-primary btn-lg">Login</button>
          </div>
        </form>
      </div>
      
      
      <div class="text-center mt-3">
        <a href="#" class="text-muted">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>


<div class="row mt-5">
  <div class="col-md-4 bg-primary p-4">
    <li class="nav-item">
      <a class="nav-link active text-white" aria-current="page" href="about.php">About us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-white" aria-current="page" href="income.php">Income tracking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-white" aria-current="page" href="expenses.php">Expense tracking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-white" aria-current="page" href="security.php">Security</a>
    </li>
  </div>
  <div class="col-md-4 bg-primary p-4">
    <h6 class="text-white">Corporate Head Office</h6>
    <p class="text-white">Plot 82, Block F, L. J. Coker Street, Opposite<br> lerato Nursery & Primary School, Allen junction,<br> Ikeja, Lagos State,<br> Nigeria.</p>
  </div>
  <div class="col-md-4 bg-primary p-4">
    <h6 class="text-white">About us</h6>
    <p class="text-white">Once in a while, one needs to take a broader look of things,
      even personal finances. To help you track the flow of finances
      from a higher ground.</p>
  </div>
</div>

<div class="row mt-5">
  <div class="col-md-12 bg-info p-2 text-center">
    <p>&copy; 2024 Agape Nigeria Limited. All rights reserved.</p>
  </div>
</div>


<script src="jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function(){
    function validateform(){
      var user = $('#email').val();
      var pass = $('#pass').val();
      if (user =='' || pass ==''){
        alert('All fields are required'); 
        return false;
      }
    }
    $("#check").click(function(){ 
      return validateform();
    });
  });
</script>
</body>
</html>
