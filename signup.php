

<?php 
session_start();
// if(isset($_SESSION['user_id'])){
// header('location:finance_dashboard.php');
// exit();


// }


include_once "partials/header.php";



?>
 <style>
    .noround {
        border-radius: 0 !important;
    }

    .heading-title {
        font-weight: bold;
        color: #343a40;
    }

    form {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        padding: 10px;
        font-size: 16px;
    }

    label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .login a {
        color: #007bff;
        text-decoration: none;
    }

    .login a:hover {
        text-decoration: underline;
    }

    .alert-danger {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
  
  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <h3 style="margin-bottom:30px;" class="text-center heading-title"> Sign Up Today</h3>
     
  </div>
</div>
<div class="row py-5">

<div class="col-md-8 offset-md-2">
<?php
if(isset($_SESSION['errormsg'])){
echo "<div class='alert alert-danger'>".$_SESSION['errormsg']."</div>";
unset($_SESSION['errormsg']);

}
?>
    <form action="process/signup_process.php" method="POST">
        <div class="row mb-3">
          <label for="fname" class="col-sm-2 col-form-label">Firstname</label>
          <div class="col-sm-4">
            <input type="text" name="fname" class="form-control noround border-dark" id="fname">

          </div>
          <label for="lname" class="col-sm-2 col-form-label">Lastname</label>
          <div class="col-sm-4">
            <input type="text" name="lname" class="form-control noround border-dark" id="lname">
            
          </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
              <input type="text" name="phone" class="form-control noround border-dark" id="phone ">
              <span id='phone_feedback'></span>
            </div>
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
              <input type="text" name="email" class="form-control noround border-dark" id="email">
            </div>
          </div>
        <div class="row mb-3">
            <label for="pass1" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
              <input type="password" name="pass1" class="form-control noround border-dark" id="password">
            </div>
            <label for="pass2" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-4">
              <input type="password" name="pass2" class="form-control noround border-dark" id="pass2">
            </div>
          </div>
       
     
        <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" name= "btnregister" id= "btnregister" value="1" class="btn btn-primary col-6 noround">Register</button>
            </div>
          </div>
          <p class="login text-center">Already have an acount ? <a href="login.php">Login</a> </p>
       
      </form>

 
</div>
</div>
   



    <div class="row">
      <div class="col-md-4 bg-primary p-4"><li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="careers.html">Careers</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About us</a>
        </li>
         <a class="nav-link active" aria-current="page" href="income.php">Income tracking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="expense.php">Expense tracking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="saving.php">Saving</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="security.php">Security</a>
        </li>
        
        </div>
        <div class="col-md-4 bg-primary p-4"><h6>Corporate Head Office</h6>
          <p>Plot 82, Block F, L. J. Coker Street, Opposite<br> lerato Nursery & Primary School, Allen junction,<br> Ikeja, Lagos State,<br> Nigeria.</p></div>
        <div class="col-md-4 bg-primary p-4"><h6>About us</h6>
        <p>Once in a while, one needs to take a broader look of things,
          even personal finances. To help you track the flow of finances
          from a higher ground.</p></div>
      </div>



      

  
    
		

    <div class="row">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
	</div>
  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const termsCheckbox = document.getElementById('terms');
        if (!termsCheckbox.checked) {
            alert('You must agree to the terms and conditions before submitting the form.');
            event.preventDefault();
        }
    });
</script>
   
</body>
</html>


