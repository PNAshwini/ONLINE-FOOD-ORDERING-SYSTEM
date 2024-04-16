<?php include('config/constants.php')  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/search.js"></script>

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="mycontainer">
            <div class="logo">
                <a href="<?php echo SITEURL;?>" title="Logo">
                    <img src="images/logo3.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                    <a href="<?php echo SITEURL ?>"><i class="fa-sharp fa-solid fa-house" style='font-size:24px'></i>  Home</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL;?>categories.php"><i class="fa-solid fa-list" style='font-size:24px'></i>  Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>foods.php"><i class='fas fa-hamburger' style='font-size:24px'></i>  Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>admin/login.php"><i class="fa-solid fa-user-gear" style='font-size:24px'></i>  Admin Login</a>
                    </li>
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->