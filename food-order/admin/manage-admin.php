<?php include('partials/menu.php') ?>

        <!--main starts-->

        <div class="main-content">
            <div class="wrapper">
                <h1><i class="fa-solid fa-user-gear"></i>Manage Admin</h1>
                <br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];//displaying session msg
                        unset($_SESSION['add']);//removing session msg
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];//displaying session msg
                        unset($_SESSION['delete']);//removing session msg
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];//displaying session msg
                        unset($_SESSION['update']);//removing session msg
                    }
                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];//displaying session msg
                        unset($_SESSION['user-not-found']);//removing session msg
                    }
                    if(isset($_SESSION['pwd-not-match'])){
                        echo $_SESSION['pwd-not-match'];//displaying session msg
                        unset($_SESSION['pwd-not-match']);//removing session msg
                    }
                    if(isset($_SESSION['change-pwd'])){
                        echo $_SESSION['change-pwd'];//displaying session msg
                        unset($_SESSION['change-pwd']);//removing session msg
                    }
                ?>
                <br>
                <!--button to add admin-->

                <a href="add-admin.php" class="btn btn-success">Add Admin</a>
                <br><br>
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.N</th>
                            <th>Full name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    

                    <?php
                        $sql = 'SELECT * FROM tbl_admin';
                        //Execute the query
                        $res = mysqli_query($conn,$sql);

                        if($res==TRUE){
                            $count = mysqli_num_rows($res);//cheeck/count no. of rows in DB
                            $sn=1;
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){//get all data from DB
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    $id=$rows['id'];

                                    //displaying values
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++?> </td>
                                            <td><?php echo $full_name?></td>
                                            <td><?php echo $username?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn btn-primary">Update Password</a> 
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn btn-warning">Update Admin</a> 
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete Admin</a> 
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }
                        }
                    ?>
                </table>
            </div>
            <br><br><br>
        </div>
        
        <!--main ends-->
<?php include('partials/footer.php') ?>