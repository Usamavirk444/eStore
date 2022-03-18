<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}
    $update_id = $_GET['updateorderid'];
    $updateorder_sql = "SELECT * FROM `tbl_order` WHERE `order_id`='$update_id'";
    $updateorder_run = mysqli_query($conn,$updateorder_sql);
    $order_feth = mysqli_fetch_array($updateorder_run);
    if (isset($_POST['sub'])) {
         $title= mysqli_real_escape_string($conn,$_POST['ftitle']);
         $price= mysqli_real_escape_string($conn,$_POST['orderp']);
         $qty= mysqli_real_escape_string($conn,$_POST['orderqty']);
         $ostatus= mysqli_real_escape_string($conn,$_POST['orderstatus']);
         $cname= mysqli_real_escape_string($conn,$_POST['cname']);
         $ccontact= mysqli_real_escape_string($conn,$_POST['ccontact']);
         $cemail= mysqli_real_escape_string($conn,$_POST['cemail']);
         $cadd= mysqli_real_escape_string($conn,$_POST['cadd']);

         $food_sql ="UPDATE `tbl_order` SET `order_food`='$title',`order_price`='$price',`order_qty`='$qty',`status`='$ostatus',`customer_name`='$cname',`customer_contact`='$ccontact',`customer_email`='$cemail',`customer_address`='$cadd' WHERE `order_id`='$update_id'";

         $food_run = mysqli_query($conn,$food_sql);
         if ($food_run) {
            ?>
            <script>alert("Order has been Updated");</script>
            <?php
            header("Refresh:0, url=./manage-order.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- menu section start -->
    <?php
    include("./partials/menu.php");
    ?>
    <!-- menu section end -->

    <!-- main content section start -->


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
            <form class="body1" method="post" enctype='multipart/form-data'>
                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab">Food</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                            class="tab"></label>
                        <div class="login-form">
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label">Food Title</label>
                                    <input id="user" value="<?php echo $order_feth['order_food'];?>" type="text" name="ftitle" readonly class="input">
                                </div>
                               
                                <div class="group">
                                    <label for="user" class="label">Food Price</label>
                                    <input id="user" value="<?php echo $order_feth['order_price']?>" type="text" name="orderp" readonly class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Food quantity</label>
                                    <input id="user" readonly value="<?php echo $order_feth['order_qty']?>" type="text" name="orderqty" class="input">
                                </div>
                                
                                <div class="group">
                                    <label for="pass" class="label">Status</label>
                                    <select name="orderstatus" class="input" style="color:black;" id="">
                                        <option value="">Select</option>
                                        <option value="Ordered">Ordered</option>
                                        <option value="ON Delivery">ON Delivery</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>      
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Customer Name</label>
                                    <input id="pass" value="<?php echo $order_feth['customer_name']?>" type="text" name="cname" class="input" >
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Customer Contact</label>
                                    <input id="pass" value="<?php echo $order_feth['customer_contact']?>" type="text" name="ccontact" class="input" >
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Customer Email</label>
                                    <input id="pass" value="<?php echo $order_feth['customer_email']?>" type="text" name="cemail" class="input" >
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Customer Address</label>
                                    <input id="pass" value="<?php echo $order_feth['customer_address']?>" type="text" name="cadd" class="input" >
                                </div>
                                
                                <div class="group">
                                    <button name="sub" class="button">SUBMIT</button>
                                    <!-- <input type="submit" name="submit" class="button" value="Sign In"> -->
                                </div>
                                <div class="hr"></div>
                                <!-- <div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- main content section end -->


    <!-- footer section section start -->

    <?php
    include("./partials/footer.php")
    ?>
    <!-- footer section section end -->

</body>

</html>