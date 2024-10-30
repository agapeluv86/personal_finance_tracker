<?php
session_start();
require_once "admin_guard.php";
require_once"classes/Admin.php";
$admin = new Admin;
$data = $admin->get_admin_id($_SESSION['admin_id']);
include_once "partials/admin_header.php";
?>



<div class="row">

<?php
  require_once "partials/admin_menu.php";
?>


<div class="col-md-9 p-3">
    
     <!-- Profile-->
    <div class="row">
        <div class="col-md-12 my-3">
            <h5 class="my-3">Profile Update </h5>
    <form>
        <div class="row mb-3">
            
          <label for="fname" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-4">
            <input type="text" name="fname" class="form-control noround border-dark" id="fname">
          </div>
          <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-4">
            <input type="text" name="lname" class="form-control noround border-dark" id="lname">
          </div>
        </div>
        <div class="row mb-3">
          <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
          <div class="col-sm-4">
            <input type="text" name="phone" class="form-control noround border-dark" id="phone">
          </div>
          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-4">
              <select class="form-select noround border-dark" aria-label="Default select example" name="gender" id="gender">
                  <option selected>Please Select</option>
                  <option value="1">Female</option>
                  <option value="2">Male</option> 
                </select>
          </div>
           
          </div>
       
          <div class="row mb-3">
           
            <label for="intro" class="col-sm-2 col-form-label">Your Intro</label>
            <div class="col-sm-10">
                <textarea id="intro" name="intro" class="form-control border-dark noround"></textarea>
            </div>
          </div>
       
     
        <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary col-6 noround">Update Account</button>
            </div>
          </div>
       
       
      </form>

 
        </div>
    </div>
    

  

     
    
</div>
</div>
 
<div class="row mt-5">
      <div class="col-md-12 bg-info p-1 text-center"><p>&copy 2024 Agape Nigeria Limited. All rights reserved.</p></div>
      </div>
      <?php include_once "partials/footer.php"; ?>
