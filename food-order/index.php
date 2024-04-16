<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="mycontainer">
            
            <form autocomplete="off" onsubmit="return searchptr(search);" action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" id="search" placeholder="Search for Food.." required>
                <button type="submit" name="submit"  value="Search" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>  SEARCH</button>
            </form>
         
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="mycontainer">
        <?php

            if(isset($_SESSION['order'])){
                echo $_SESSION['order'];//displaying session msg
                unset($_SESSION['order']);//removing session msg
            }

        ?>

            <h2 class="text-center">Explore Foods</h2>
                <?php

                    $sql="SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);

                    if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                            $id=$row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];

                            ?>
                                <a href="<?php SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($image_name==""){
                                            echo "<div class='error'>Image Not available</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" class="img-box img-curve">
                                            <?php
                                        }
                                    ?>
                                <h3 class="float-text text-test"><?php echo $title; ?></h3>
                                </div>
                                </a>
                            <?php
                        }
                    }
                ?>
                
           
        </div>
        <div class="clearfix"></div> 
        
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="mycontainer">
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                if($count2>0){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $id=$row2['id'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];
                        $title=$row2['title'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name==""){
                                            echo "<div class='error'>Image Not Found</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">₹.<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php SITEURL; ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                            
                        
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Food Not Available</div>";
                }

            ?>
        </div>   
        <div class="clearfix"></div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>foods.php">SEE ALL FOODS <i class="fa-solid fa-angles-right"></i></a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>