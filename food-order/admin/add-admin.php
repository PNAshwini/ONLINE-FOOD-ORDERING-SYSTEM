<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">

    <h1><i class="fa-solid fa-user-plus"></i>Add Admin</h1>
    <br><br>
    <?php
        if(isset($_SESSION['add'])){
        echo $_SESSION['add'];//displaying session msg
        unset($_SESSION['add']);//removing session msg
        }
    ?>

    <form action="" method="POST">
        <table class="table table-borderless tbl-full">
            <tr >
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter your name" required></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter your Username" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter your Password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Add Admin" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>
    </div>
    <br><br><br>
</div>

<?php include('partials/footer.php') ?>

<?php

    //process the value from form and save in database

    //check whether the submmit is clicked or not
    if(isset($_POST['submit'])){
        //button clicked
        //echo "Button clickd";

        //Get Data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=$_POST['password'];//md5()

        //SQL Query to save the data to database
        $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
                ";

        //Execute query and save data to database in constants.php        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());//
        if($res==TRUE){
            $_SESSION['add'] = "<div class='success'><h3>Admin Added Sucessfully </h3></div>";
            //Redirect page to Manage Admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add'] = "Faild to add Admin";
            //Redirect page to Manage Admin
            header('location:'.SITEURL.'admin/add-admin.php');
        }

    }
    
?>