<?php include('partials/menu.php') ?>

        <!--main starts-->

        <div class="main-content">
            <div class="wrapper">
                <h1><i class="fa-solid fa-list"></i>Manage Category</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];//displaying session msg
                    unset($_SESSION['add']);//removing session msg
                    }
                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];//displaying session msg
                        unset($_SESSION['remove']);//removing session msg
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];//displaying session msg
                        unset($_SESSION['delete']);//removing session msg
                    }
                    if(isset($_SESSION['no-category-found'])){
                        echo $_SESSION['no-category-found'];//displaying session msg
                        unset($_SESSION['no-category-found']);//removing session msg
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];//displaying session msg
                        unset($_SESSION['update']);//removing session msg
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];//displaying session msg
                        unset($_SESSION['upload']);//removing session msg
                    }
                    if(isset($_SESSION['failed-remove'])){
                        echo $_SESSION['failed-remove'];//displaying session msg
                        unset($_SESSION['failed-remove']);//removing session msg
                    }
                    if(isset($_SESSION['unauthorize'])){
                        echo $_SESSION['unauthorize'];//displaying session msg
                        unset($_SESSION['unauthorize']);//removing session msg
                    }
                ?>
                <br><br>
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>
                <br><br>
                <div class="table-responsive">

                <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actioms</th>
                    </tr>
                </thead>    
                
                    <?php

                        $sql="SELECT * FROM tbl_category";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);

                        $sn=1;

                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id=$row['id'];
                                $title=$row['title'];
                                $image_name=$row['image_name'];
                                $featured=$row['featured'];
                                $active=$row['active'];
                            ?>

                                <tr>
                                    <td class="align-middle"><?php echo $sn++ ?></td>
                                    <td class="align-middle"><?php echo $title?></td>
                                    <td>
                                        <?php 
                                            if($image_name!=""){
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="image" width="80px">
                                                <?php
                                            }
                                            else{
                                                echo "<div class='error'>Image Not Added</div>";
                                            }
                                        ?>
                                    </td>
                                    <td class="align-middle"><?php echo $featured?></td>
                                    <td class="align-middle"><?php echo $active?></td>
                                    <td class="align-middle">
                                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id ?>" class="btn btn-success">Update Category</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a> 
                                    </td>
                                </tr>
                            
                            <?php
                            }
                        }
                        else{
                            ?>

                                <tr>
                                    <td colspan="6"><div class="error">No Category to display</div></td>
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