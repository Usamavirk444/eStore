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
           <h1>DASHBOARD</h1>
<?php
$sql = "SELECT * FROM tbl_category";
$run = mysqli_query($conn, $sql);
$count = mysqli_num_rows($run);
?>
           <div class="col1-4 text-center">
               <h1><?php echo $count?></h1>
               <br>
               Category
           </div>
           <?php $sql1= "SELECT * FROM tbl_food";
                $run1 = mysqli_query($conn, $sql1);
                $count1 = mysqli_num_rows($run1);
            ?>
           <div class="col1-4 text-center">
           <h1><?php echo $count1?></h1>

               <br>
               Food
           </div>
           <?php $sql2= "SELECT * FROM tbl_order";
                $run2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($run2);
            ?>
           <div class="col1-4 text-center">
           <h1><?php echo $count2?></h1>

               <br>
               Total Orders
           </div>
           <?php $sql3= "SELECT SUM(order_price) AS Total FROM tbl_order";
                $run3 = mysqli_query($conn, $sql3);
                $row = mysqli_fetch_array($run3);
                $total_revenu = $row['Total']; 
            ?>
           <div class="col1-4 text-center">
           <h1><?php echo $total_revenu?></h1>

               <br>
               Revenue Generated
           </div>
           <div class="clearfix"></div>
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