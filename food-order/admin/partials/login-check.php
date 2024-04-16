<?php
    //Authorization
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message']="<div class='login-session'>Please login to access Admin Panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }


?>