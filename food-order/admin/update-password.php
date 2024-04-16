<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Change Password</h1>
        <br><br>
        <?php
            $id=$_GET['id'];
           
        ?>
        <form autocomplete="off" action="" method="post">
            <table style="width: 42%;">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="text" name="current_password" placeholder="Enter old Password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="text" name="new_password" placeholder="Enter New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="text" name="confirm_password" placeholder="Re-Enter New Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-add">
                    </td>
            </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php') ?>
<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $current_password=$_POST['current_password'];//md5($_POST['current_password'])
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    //sql 

    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    //execyte query
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1){
            if($new_password==$confirm_password){
              echo $sql2="UPDATE tbl_admin SET 
              password='$new_password'
              WHERE id=$id
              ";
              $res2=mysqli_query($conn,$sql2);
              if($res2==TRUE){
                $_SESSION['change-pwd'] = "<div class='success'>Password changed Succesfully </div>";
                //Redirect page to Manage Admin
                header('location:'.SITEURL.'admin/manage-admin.php');
              }
              else{
                $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password </div>";
                //Redirect page to Manage Admin
                header('location:'.SITEURL.'admin/manage-admin.php');
              }
            }
            else{
                $_SESSION['pwd-not-match'] = "<div class='error'><h4>Confirm password did not match with new password</h4> </div>";
                //Redirect page to Manage Admin
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            $_SESSION['user-not-found'] = "<div class='error'><h4>Current Password did not match</h4> </div>";
            //Redirect page to Manage Admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        
   
        
    }

}

?>

