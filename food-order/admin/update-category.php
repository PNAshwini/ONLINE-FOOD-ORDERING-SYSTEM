<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br><br>
            <?php
    
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql="SELECT * FROM tbl_category WHERE id=$id";
                    $res=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $id=$row['id'];
                        $title=$row['title'];
                        $current_image=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                    }
                    else{
                        $_SESSION['no-category-found']="<div class='error'>Catgory not found</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                }
                else{
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table style="width: 42%;">
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" onfocus="this.select();" onmouseup="return false;" name="title" value="<?php echo $title; ?>" autofocus>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Current Image:
                            </td>
                            <td>
                                <?php 
                                    if($current_image!=""){
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" alt="image" width="100px">
                                        <?php
                                    }
                                    else{
                                        echo "<div class='error'>Image Not Added</div>";
                                    }
                                ?> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                            New Image: 
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
                                <input <?php if($featured=="Yes"){ echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                                <input <?php if($featured=="No"){ echo "checked";} ?> type="radio" name="featured" value="No"> No
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Active:
                            </td>
                            <td>
                                <input <?php if($active=="Yes"){ echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                                <input <?php if($active=="No"){ echo "checked";} ?> type="radio" name="active" value="No"> No
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="submit" name="submit" value="Update Category" class="btn-add">
                            </td>
                        </tr>
                </table>
            </form>
            <?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $current_image=$_POST['current_image'];
    $featured=$_POST['featured'];
    $active=$_POST['active']; 
    
    //if image selected

    if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'];
        if($image_name!=""){
            //auto rename images
            $ext = explode('.',$image_name);//get extension only
            $ext1=end($ext);
            $image_name = "food_category_".rand(000,999).'.'.$ext1;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;

            //upload file
            $upload=move_uploaded_file($source_path, $destination_path);

            //check whether image is uploaded
            if($upload==FALSE){
                $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop
                die();
            }
            if($current_image!=""){
                $remove_path="../images/category/".$current_image;
                $remove=unlink($remove_path);
                if($remove==FALSE){
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove Current image</div> ";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();
                }
            }
            
        }
        //Remove the current image
        else{
            $image_name="$current_image";
        }
        
    }
    else{
        $image_name="$current_image";
    }
    
    $sql2="UPDATE  tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
            WHERE id=$id
            ";
            $res2=mysqli_query($conn,$sql2);

            if($res2==TRUE){
                $_SESSION['update'] = "<div class='success'>Sucessfully Updated Category</div>";
                //Redirect page to Manage Admin
                ?>
                 <script>window.location.href='manage-category.php';</script>
                <?php
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else{
                $_SESSION['update'] = "Faild to Update Category";
                //Redirect page to Manage Admin
                ?>
                 <script>window.location.href='manage-category.php';</script>
                <?php
            }
}

?>
        </div>
    </div>

<?php include('partials/footer.php') ?>



