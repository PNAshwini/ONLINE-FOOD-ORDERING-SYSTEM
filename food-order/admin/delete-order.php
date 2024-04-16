<?php

    //include constants.php file here
    include('../config/constants.php');

    //1. Get the id of Admin to be deleted
    $id = $_GET['id'];
    if($id!=""){
        //2. SQL query to delete admin
        $sql = "DELETE FROM tbl_order WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check the qury query executed sucessfully

        if($res==TRUE){
            $_SESSION['delete'] = "<div class='success'> <h3>Order Deleted Sucessfully</h3> </div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'> <h3> Failed to delete Order </h3></div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }
    }
    else{
        header('location:'.SITEURL.'admin/manage-order.php');
    }
?>