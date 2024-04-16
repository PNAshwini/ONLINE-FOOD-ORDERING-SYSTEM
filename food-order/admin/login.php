<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title>Login Food-order System</title>
</head>
<body>
  <div class="login-wrapper">
    <form  autocomplete="off"  action="" method="POST" class="form">
      <img src="../images/avatar1.jpg" alt="">
      <h2>ADMIN-LOGIN</h2>
      <?php
        if(isset($_SESSION['login'])){
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message'])){
          echo $_SESSION['no-login-message'];
          unset($_SESSION['no-login-message']);
        }
      ?>
      <br><br>
      <div class="input-group">
        <input type="text" name="username" id="username" required>
        <label for="username">
        <i class="fa-solid fa-user"></i>    User Name
        </label>
        
      </div>
      <div class="input-group">
        <input type="password" name="password" id="password"  required>
        <label for="password">
        <i class="fa-solid fa-lock"></i>    Password
        </label>
      </div>
      <button type="submit" name="submit" value="Login" class="submit-btn">
      Login  <i class="fa-solid fa-angles-right"></i>
      </button>
      <!--<a href="#forgot-pw" class="forgot-pw"><i class="fa-solid fa-circle-question"></i>  Forgot Password?</a>-->
    </form>
    <!--
    <div id="forgot-pw">
      <form action="" method="POST" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">
          <i class="fa-solid fa-envelope"></i>  Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">

      </form>
    </div>-->
  </div>
</body>
</html>

<?php

  if(isset($_POST['submit'])){
     $username = mysqli_real_escape_string($conn,$_POST['username']);
     $password = mysqli_real_escape_string($conn,$_POST['password']);//md5($_POST['password']);

    $sql = " SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";
    $res = mysqli_query($conn, $sql);
  
    $count = mysqli_num_rows($res);
    
    if($count==1){
      $_SESSION['login']="<div class='success'><h2>Login-Successful</h2></div>";
      $_SESSION['user']=$username;//check user is login or not 
      header('location:'.SITEURL.'admin/index.php');
    }
    else{
      $_SESSION['login'] = "<div class='login-session'>User-Name or Password did not match</div>";
      header('location:'.SITEURL.'admin/login.php');
    }
  
  }
  
 
?>