<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">

    <h1><i class="fa-solid fa-check-double"></i>Add Food</h1>
    <br><br>
    <?php
        if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];//displaying session msg
        unset($_SESSION['upload']);//removing session msg
        }
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//displaying session msg
            unset($_SESSION['add']);//removing session msg
            }
    ?>

    <form action="" method="POST" enctype="multipart/form-data"  >
        <table class="table table-borderless tbl-full">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the Food">
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea type="text" name="description" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price">
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
                <td>Category:</td>
                <td>
                    <select name="category">

                        <?php

                        $sql="SELECT * FROM tbl_category WHERE active='Yes'" ;
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                        }
                        else{
                            ?>
                                <option value="0">No Category Found</option>
                            <?php
                        }

                        ?>
                    </select>
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
                    <input type="submit" name="submit" value="Add Food" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>
    </div>
    
</div>

<?php include('partials/footer.php') ?>

<?php

    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];

        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }
        else{
            $featured="No";
        }
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active="No";
        }
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            if($image_name!=""){
                //auto rename images
                $ext = explode('.',$image_name);//get extension only
                $ext1=end($ext);
                $image_name = "food_name_".rand(0000,9999).'.'.$ext1;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;

                //upload file
                $upload=move_uploaded_file($source_path, $destination_path);

                //check whether image is uploaded
                if($upload==FALSE){
                    $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    //stop
                    die();
                }
            }
        }
        else{
            $image_name="";
        }
        $sql2="INSERT INTO tbl_food SET
        title='$title',
        description='$description',
        price=$price,
        image_name='$image_name',
        category_id='$category',
        featured='$featured',
        active='$active'
        ";
        $res2=mysqli_query($conn,$sql2);

        if($res2==TRUE){
            $_SESSION['add']="<div class='success'><h2>Food Added Successfully</h2></div>";
            ?>
                <script>window.location.href='manage-food.php';</script>
            <?php
        }
        else{
            $_SESSION['add']="<div class='error'>Failed too add Food</div>";
            ?>
                <script>window.location.href='manage-food.php';</script>
            <?php
        }
    }

?>