<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php
    include("./partials/menu.php");
    $order_id = $_GET['orderid'];
    $order_sql = "SELECT * FROM `tbl_food` WHERE `food_id`='$order_id'";
    $order_run = mysqli_query($conn, $order_sql);
    $order_fet = mysqli_fetch_array($order_run);


    if (isset($_POST['submit'])) {
          $order_food = $order_fet['food_title'];
          $order_price = $order_fet['food_price'];
          $order_qty = mysqli_real_escape_string($conn, $_POST['qty']);
          $order_total = $order_price * $order_qty;
          $order_date = date("Y-m-d h:i:sa");
          $order_status = "Ordered";

          $customer_name = mysqli_real_escape_string($conn,$_POST['full-name']);
          $customer_contact = mysqli_real_escape_string($conn,$_POST['contact']);
          $customer_email = mysqli_real_escape_string($conn,$_POST['email']);
          $customer_address = mysqli_real_escape_string($conn,$_POST['address']);

          $customer_order_sql = "INSERT INTO `tbl_order`(`order_food`, `order_price`, `order_qty`, `order_total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$order_food','$order_price','$order_qty','$order_total','$order_date','$order_status','$customer_name','$customer_contact','$customer_email','$customer_address')";

          $customer_order_run = mysqli_query($conn,$customer_order_sql);
          if ($customer_order_run) {
            ?>
            <script>alert("You have ordered");</script>
            <?php
            header("Refresh:0 , url=./index.php");
          }

    }
    ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo './images/food/'. $order_fet['food_img'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $order_fet['food_title'];?></h3>
                        <p class="food-price">Rs. <?php echo $order_fet['food_price'];?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive"  required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9233xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include("./partials/footer.php");?>

</body>
</html>