<?php
    require_once("../classes/User.php");
    $u = new User;
    
    $email = $_GET['email'];
    $check = $u->check_email($email);
    if($check){
        echo "Email has been taken";
    }else{
        echo "Email is available";
    }

    


?>