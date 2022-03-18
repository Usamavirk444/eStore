<?php
include("../connection/conn.php");
if (empty($_SESSION['username'])) {
    header('Location:./index.php');
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
    <title>Home page</title>
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
            <h1>Manage Order</h1>
            <!-- <a href="#" class="admin-btn1">Add order</a> -->
            <!-- admin table start -->
            <table>
                <tr>
                    <th>Order Food</th>
                    <th>Order Price</th>
                    <th>Order Quantity</th>
                    <th>Order Total</th>
                    <th>Order Date</th>
                    <th>Order status</th>
                    <th>Full Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                    $order_fetching = "SELECT * FROM tbl_order";
                    $ordering_run = mysqli_query($conn,$order_fetching);
                    while ($order_fet= mysqli_fetch_array($ordering_run)) {
                        ?>
                <tr>
                    <td><?php echo $order_fet['order_food']; ?></td>
                    <td><?php echo $order_fet['order_price']; ?></td>
                    <td><?php echo $order_fet['order_qty']; ?></td>
                    <td><?php echo $order_fet['order_total']; ?></td>
                    <td><?php echo $order_fet['order_date']; ?></td>
                    <td><?php echo $order_fet['status']; ?></td>
                    <td><?php echo $order_fet['customer_name']; ?></td>
                    <td><?php echo $order_fet['customer_contact']; ?></td>
                    <td><?php echo $order_fet['customer_email']; ?></td>
                    <td><?php echo $order_fet['customer_address']; ?></td>
                    
                    <td>
                        <a href="./update_order.php?updateorderid=<?php echo $order_fet['order_id'];?>" class="admin-btn">Update</a><br><br>
                        
                    </td>
                </tr>
                <?php
                    }
                
                ?>

            </table>
            <!-- admin table start -->


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