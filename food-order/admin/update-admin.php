<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>update Admin</h1>
        <br><br>

        <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE id = $id";
            $res=mysqli_query($conn,$sql);

            //check whether data is available or not
            if($res==TRUE){
                $count=mysqli_num_rows($res);
                if($count==1){
                  //get the details
                  $row=mysqli_fetch_assoc($res);

                  $full_name=$row['full_name'];
                  $username=$row['username'];

                }
                else{
                    //redirect
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
        <table style="width: 42%;">
            <tr>
                <td>Full Name:</td>
                <td><input type="text"  name="full_name" value="<?php echo $full_name; ?>" ></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-add">
                </td>
            </tr>
        </table>
    </form>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    //sql 

    $sql = "UPDATE tbl_admin SET
        full_name='$full_name',
        username='$username' 
        WHERE id=$id
    ";

    //execyte query
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        $_SESSION['update'] = "<div class='success'><h4>Admin Updated Sucessfully </h4></div>";
        //Redirect page to Manage Admin
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update'] = "Faild to Update Admin";
        //Redirect page to Manage Admin
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}

?>