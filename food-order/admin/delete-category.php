<?php

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        //echo "get value and delete ";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!=""){
            $path= "../images/category/".$image_name;
            $remove= unlink($path);

            if($remove==FALSE){
                $_SESSION['remove']="<div class='errot'>Failed to remove category image</div> ";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }
        $sql="DELETE FROM tbl_category WHERE id=$id";
        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
            $_SESSION['delete']="<div class='success'>Successfully removed Category</div> ";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['delete']="<div class='success'>Failed to remove Category</div> ";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    }
    else{
        $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div> ";
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>