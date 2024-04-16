<?php 
    include('../config/constants.php') ;
    include('login-check.php');
?>

<html>
    <head>
        <title>Food-ordering</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!--menu starts-->

        <div class="menu text-center">
            <div class="wrapper">
                <div class="mycontainer">
                <ul>
               <li><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i>HOME</a></li>
                <li><a href="manage-admin.php"><i class="fa-solid fa-user-gear"></i>ADMIN</a></li>
                <li><a href="manage-category.php"><i class="fa-solid fa-list"></i> CATEGORY</a></li>
                <li><a href="manage-food.php"><i class="fas fa-hamburger"></i>FOOD</a></li>
                <li><a href="manage-order.php"><i class="fa-solid fa-cart-shopping"></i>ORDER</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a></li>
               </ul>
                </div>
               

            </div>
        </div>
        <!--menu ends-->