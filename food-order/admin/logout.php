<?php
include('../config/constants.php');
    //destroy the session 
    session_destroy();//unsets $_SESSION['user']

    //redirct to login page
    header('location:'.SITEURL.'admin/login.php');


?>