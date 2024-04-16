<?php include('partials/menu.php') ?>
        <!--main starts-->

        <div class="main-content">
            <div class="wrapper">
                <h1><i class="fa-sharp fa-solid fa-house"></i>Dashbord</h1>
                <br>
                <?php
                    if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    }
                ?>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2" style="background-color:#ced6e0;">
                            <?php
                                $sql="SELECT * FROM tbl_category";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);
                            ?>
                            <h2 class="text-center"><?php echo $count; ?></h2>
                            <br>
                            <h4 class="text-center">Categories</h4>
                        </div>
                        <div class="p-1"></div>
                            <div class="col-sm-2" style="background-color:#ced6e0;">
                                <?php
                                    $sql2="SELECT * FROM tbl_food";
                                    $res2=mysqli_query($conn,$sql2);
                                    $count2=mysqli_num_rows($res2);
                                ?>
                                <h2 class="text-center"><?php echo $count2; ?></h2>
                                <br>
                                <h4 class="text-center">Foods</h4>
                            </div>
                        
                        <div class="p-1"></div>
                            <div class="col-sm-2" style="background-color:#ced6e0;">
                                <?php
                                    $sql3="SELECT * FROM tbl_order";
                                    $res3=mysqli_query($conn,$sql3);
                                    $count3=mysqli_num_rows($res3);
                                ?>
                                <h2 class="text-center"><?php echo $count3; ?></h2>
                                <br>
                                <h4 class="text-center">Total Orders</h4>
                                
                            
                        </div>
                        <div class="p-1"></div>
                        <div class="col-sm-5" style="background-color:#ced6e0;">
                            <?php
                                $sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                                $res4=mysqli_query($conn,$sql4);
                                $row4=mysqli_fetch_assoc($res4);
                                $total_revenue=$row4['Total'];

                            ?>
                            <h2 class="text-center">₹.<?php echo $total_revenue; ?></h2>
                            <br>
                            <h4 class="text-center">Revenue Generated</h4>
                            
                        </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
        <!--main ends-->
<?php include('partials/footer.php') ?>