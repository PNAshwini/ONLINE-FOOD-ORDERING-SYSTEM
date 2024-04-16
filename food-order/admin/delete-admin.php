<?php

    //include constants.php file here
    include('../config/constants.php');

    //1. Get the id of Admin to be deleted
    $id = $_GET['id'];
    if($id!=""){
        //2. SQL query to delete admin
        $sql = "DELETE FROM tbl_admin WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check the qury query executed sucessfully

        if($res==TRUE){
            $_SESSION['delete'] = "<div class='success'> <h3>Admin Deleted Sucessfully</h3> </div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'> <h3> Failed to delete Admin </h3></div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
    else{
        header('location:'.SITEURL.'admin/manage-admin.php');  
    }

  

    //3.redirecti

?>