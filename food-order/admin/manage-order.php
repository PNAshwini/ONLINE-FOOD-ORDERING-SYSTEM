<?php include('partials/menu.php') ?>

        <!--main starts-->

        <div class="main-content">
            <div class="wrapper-order">
                <h1><i class="fa-solid fa-cart-shopping"></i>Manage order</h1>
                <br>
                <?php
                    if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                        }
                ?>
                <br>
                <div class="table-responsive">

                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th  class="align-middle">S.N</th>
                        <th  class="align-middle">Food</th>
                        <th  class="align-middle">Price</th>
                        <th  class="align-middle">Qty</th>
                        <th  class="align-middle">Total</th>
                        <th  class="align-middle">Ordered Date</th>
                        <th class="align-middle">Status</th>
                        <th  class="align-middle">Customer Name</th>
                        <th  class="align-middle">Contact</th>
                        <th  class="align-middle">Email</th>
                        <th  class="align-middle">Address</th>
                        <th  class="align-middle">Action</th>
                    </tr>
                    </thead>
                    
                    <?php
                        $sql="SELECT * FROM tbl_order ORDER BY id DESC";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        $sn=1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id=$row['id'];
                                $food=$row['food'];
                                $price=$row['price'];
                                $qty=$row['qty'];
                                $total=$row['total'];
                                $order_date=$row['order_date'];
                                $status=$row['status'];
                                $customer_name=$row['customer_name'];
                                $customer_contact=$row['customer_contact'];
                                $customer_email=$row['customer_email'];
                                $customer_address=$row['customer_address'];
                                
                                ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $sn++; ?></td>
                                        <td class="align-middle"><?php echo $food; ?></td>
                                        <td class="align-middle"><?php echo $price; ?></td>
                                        <td class="align-middle"><?php echo $qty; ?></td>
                                        <td class="align-middle"><?php echo $total; ?></td>
                                        <td class="align-middle"><?php echo $order_date; ?></td>
                                        <td class="align-middle">
                                            <?php
                                                if($status=="Ordered"){
                                                    echo "<label style='color: #f7b731;font-weight:bolder;'>$status</label>";
                                                }
                                                elseif($status=="On Delivary"){
                                                    echo "<label style='color: #3867d6;font-weight:bolder;'>$status</label>";
                                                }
                                                if($status=="Delivered"){
                                                    echo "<label style='color: green;font-weight:bolder;'>$status</label>";
                                                }
                                                if($status=="Cancelled"){
                                                    echo "<label style='color: red;font-weight:bolder;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td class="align-middle"><?php echo $customer_name; ?></td>
                                        <td class="align-middle"><?php echo $customer_contact; ?></td>
                                        <td class="align-middle"><?php echo $customer_email; ?></td>
                                        <td class="align-middle"><?php echo $customer_address; ?></td>
                                        <td class="align-middle">
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>" class="btn btn-success">Update Order</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id ?>" class="btn btn-danger">Delete Order</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else{
                            echo "<tr><td colspan='12' class='error'>Orders Not Available</td></tr>";
                        }
                    ?>

                </table>
            </div>

                <div class="clearfix"></div>
            </div>
        </div>
        
        <!--main ends-->
<?php include('partials/footer.php') ?>