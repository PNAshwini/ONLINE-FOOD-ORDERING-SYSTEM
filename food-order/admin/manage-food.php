<?php include('partials/menu.php') ?>

        <!--main starts-->

        <div class="main-content">
            <div class="wrapper">
                <h1><i class="fas fa-hamburger"></i>Manage Food</h1>
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
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];//displaying session msg
                        unset($_SESSION['delete']);//removing session msg
                    }
                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];//displaying session msg
                        unset($_SESSION['remove']);//removing session msg
                    }
                    if(isset($_SESSION['unauthorize'])){
                        echo $_SESSION['unauthorize'];//displaying session msg
                        unset($_SESSION['unauthorize']);//removing session msg
                    }
                    if(isset($_SESSION['no-food-found'])){
                        echo $_SESSION['no-food-found'];//displaying session msg
                        unset($_SESSION['no-food-found']);//removing session msg
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];//displaying session msg
                        unset($_SESSION['update']);//removing session msg
                    }
?>
                <br><br>
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn btn-primary">Add Food</a>
                <br><br>
                <div class="table-responsive">

                <table class="table table-striped">
                    <thead class="thead-dark" >
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actioms</th>
                    </tr>
                    </thead>
                    <?php

                        $sql="SELECT * FROM tbl_food";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);

                        $sn=1;

                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id=$row['id'];
                                $title=$row['title'];
                                $price=$row['price'];
                                $image_name=$row['image_name'];
                                $description=$row['description'];
                                $featured=$row['featured'];
                                $active=$row['active'];
                            ?>

                                <tr>
                                    <td class="align-middle"><?php echo $sn++ ?></td>
                                    <td class="align-middle"><?php echo $title?></td>
                                    <td class="align-middle">₹.<?php echo $price?></td>
                                    <td class="align-middle">
                                        <?php 
                                            if($image_name!=""){
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                            else{
                                                echo "<div class='error'>Image Not Added</div>";
                                            }
                                        ?>
                                    </td>
                                    <td class="align-middle"><?php echo $description?></td>
                                    <td class="align-middle"><?php echo $featured?></td>
                                    <td class="align-middle"><?php echo $active?></td>
                                    <td class="align-middle">
                                    <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id ?>" class="btn btn-success">Update Food</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Food</a> 
                                    </td>
                                </tr>
                            
                            <?php
                            }
                        }
                        else{
                            ?>

                                <tr>
                                    <td colspan="7"><div class="error">No Food to display</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <!--main ends-->
<?php include('partials/footer.php') ?>