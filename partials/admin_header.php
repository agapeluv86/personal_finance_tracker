<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personal Finance Tracker</title>
  <link rel="icon" type=" image/png" sizes="32x32" href="images/logo.jfif">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<style>
		div/*{
      min-height: 100px;
      border: 2px solid black;
    }*/

    .navbar-brand{
             width:50px;
                 }
       li.nav-item{
          list-style-type:none;
        }
  </style>
</head>
<body>
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
            <div class="container">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <div class="border-end border-primary pe-3">
                                <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                            </div>
                            <div class="ps-3">
                                <a href="mailto:owainternational@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>owainternational@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex border-end border-primary pe-3">
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <div class="dropdown ms-3">
                                <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> English</small></a>
                                <div class="dropdown-menu rounded">
                                    <a href="#" class="dropdown-item">English</a>
                                    <a href="#" class="dropdown-item">Bangla</a>
                                    <a href="#" class="dropdown-item">French</a>
                                    <a href="#" class="dropdown-item">Spanish</a>
                                    <a href="#" class="dropdown-item">Arabic</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.jfif" alt="logo"class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About us</a>
        </li>
        
        <div class="nav-item dropdown active">
                                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                    <span class="dropdown-toggle">Pages</span>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="finance.php" class="dropdown-item active">Planning</a>
                                    <a href="security.php" class="dropdown-item">Security</a>
                                    <a href="income.php" class="dropdown-item">Income tracking</a>
                                    <a href="expenses.php" class="dropdown-item">Expense</a>
                                  
                                </div>
                            </div>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
        </li>




        <?php
        if(!isset($_SESSION['admin_id'])){
                      ?>
                      <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="admin_login.php">LOGIN</a>
                      </li>
                      <?php
                      }
                      ?>

                <?php
                if(isset($_SESSION['admin_id'])){
                  ?>
                  <div class="dropdown user-menu">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="images/dummy.jpeg" width="30" style="border-radius: 50%;"> Welcome <?php echo isset($data['admin_username']) ? $data['admin_username'] : "";?>
                        </a>
                      
                         <ul class="dropdown-menu user-profile" style="border-radius: 0px;background-color: #13357B;"> 
                          
                          <li><a class="dropdown-item" href="admin_logout.php">Logout</a></li>
                         </ul>
                      </div>

                  <?php
                }
                ?>
<!--                       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">LOGIN</a>
        </li>
         -->
       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="location.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Locations
          </a>
          <ul class="dropdown-menu bg-primary">
            <li><a class="dropdown-item" href="#">Lagos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Abuja</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Germany</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item"> -->
          <!-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> -->
        <!-- </li> -->
      </ul>
      <!-- <form class="d-flex" role="search"> -->
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      <!-- </form> -->
    </div>
  </div>
</nav >
</div>
  </div>