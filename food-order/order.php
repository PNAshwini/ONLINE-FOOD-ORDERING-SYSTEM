<?php include('partials-front/menu.php'); ?>
<?php

    if(isset($_GET['food_id'])){
       $food_id=$_GET['food_id'] ;
       $sql="SELECT * FROM tbl_food WHERE id='$food_id'";
       $res=mysqli_query($conn,$sql);
       $count=mysqli_num_rows($res);
       if($count>0){
            $row=mysqli_fetch_assoc($res);
            $id=$row['id'];
            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $image_name=$row['image_name'];
       }
       else{
        header('location:'.SITEURL);
       }

    }
    else{
        header('location:'.SITEURL);
    }

?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form name="order-form" onsubmit="return orderform(contact);" autocomplete="off" action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php

                            if($image_name==""){
                                echo "<div class='error'>Image Not Found</div>";
                            }
                            else{
                                ?>
                                    <img src="<?php SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                <?php
                            }

                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <p class="food-price">₹.<?php echo $price; ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" id="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" id="full-name" placeholder="Your Name" class="input-responsive">

                    <div class="order-label">Phone Number</div>
                    <input type="text" name="contact" id="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" id="email" placeholder="E.g. food@gmail.com" class="input-responsive">

                    <div class="order-label">Address</div>
                    <textarea name="address" id="address" rows="10" placeholder="Your Street, City, Country" class="input-responsive"></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
           <script>
                function orderform(){
                var full_name=document.getElementById("full-name");
                var contact1=document.getElementById("contact");
                var phoneno=/^\d{10}$/;
                var email=document.getElementById("email");
                var address=document.getElementById("address");

                if(full_name.value==""){
                    alert("Please enter your Name");
                    full_name.focus();
                    return false;
                }
                else if(email.value==""){
                    alert("Please Enter E-mail");
                    email.focus();
                    return false;
                }
                else if(address.value==""){
                    alert("Please Enter Address");
                    address.focus();
                    return false;
                }
                else if(contact1.value!=""){
                    if(contact1.value.match(phoneno)){
                        return true;
                    }
                    else{
                        alert("Enter valid phone-number");
                        contact1.select();
                        return false;
                    }
                }
            }
            </script>
            <?php
                if(isset($_POST['submit'])){
                    $food=$_POST['food'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $total=$price * $qty;
                    $order_date=date("Y-m-d h:i:sa");
                    $status="Ordered";
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=$_POST['address'];

                    $sql2="INSERT INTO tbl_order SET
                        food='$food',
                        price='$price',
                        qty='$qty',
                        total='$total',
                        order_date='$order_date',
                        status='$status',
                        customer_name='$customer_name',
                        customer_contact='$customer_contact',
                        customer_email='$customer_email',
                        customer_address='$customer_address'
                        ";

                    $res2=mysqli_query($conn,$sql2);
                    if($res2==TRUE){
                        $_SESSION['order']="<div class='success text-center'>Food Ordered Successfully</div>";
                        ?>
                            <script>window.location.href='http://localhost/food-order';</script>
                        <?php
                        
                    }
                    else{
                        $_SESSION['order']="<div class='error text-center'>Failed to order food.</div>";
                        ?>
                            <script>window.location.href='http://localhost/food-order';</script>
                        <?php                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>