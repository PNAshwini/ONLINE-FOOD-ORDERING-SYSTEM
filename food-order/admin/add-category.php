<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">

        <h1><i class="fa-solid fa-list"></i>Add Category</h1>
        <br>
        <?php
            if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//displaying session msg
            unset($_SESSION['add']);//removing session msg
            }
        ?>
         <?php
            if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];//displaying session msg
            unset($_SESSION['upload']);//removing session msg
            }
        ?>
        <br><br>

        <form action="" method="post" enctype="multipart/form-data">
            <table id="update_form" class="table table-borderless tbl-full">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" id="title" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Select Image: 
                        </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Featured:
                        </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Active:
                        </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                        </td>
                    </tr>
                    </table>
                </form>
    </div>
    <br><br>
</div>

<?php include('partials/footer.php') ?>

<?php

    if(isset($_POST['submit'])){
        $title=$_POST['title'];

        if(isset($_POST['featured'])){
            echo $featured=$_POST['featured'];
        }
        else{
            $featured="No";//default value
        }

        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active="No";
        }
        //check image
        //print_r($_FILES['image']) ;
        //die();
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            if($image_name!=""){
                //auto rename images
                $ext = end(explode('.',$image_name));//get extension only
                $image_name = "food_category_".rand(000,999).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                //upload file
                $upload=move_uploaded_file($source_path, $destination_path);

                //check whether image is uploaded
                if($upload==FALSE){
                    $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                    //stop
                    die();
                }
            }
            
        }
        else{
            $image_name="";
        }

        $sql="INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
            ";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
            $_SESSION['add'] = "<div class='success'>Category Added Sucessfully </div>";
            //Redirect page to Manage Admin
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['add'] = "<div class='error'>Faild to add Category</div>";
            //Redirect page to Manage Admin
            header('location:'.SITEURL.'admin/add-category.php');
        }
    }

?>