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
            <h1>Manage Food</h1>
            <a href="./add_food.php" class="admin-btn1">Add Food</a>
            <!-- admin table start -->
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Food Title</th>
                    <th>Food Description</th>
                    <th>Food Price</th>
                    <th>Image</th>
                    <th>category</th>
                    <th>Featured</th>
                    <th>active</th>
                    <th>acttion</th>

                </tr>
                <?php
                $food_sql= "SELECT * FROM tbl_food INNER JOIN tbl_category on tbl_food.category_id=cat_id";
                $food_run = mysqli_query($conn,$food_sql);
                while ($fetch_food= mysqli_fetch_array($food_run)) {
                    ?>
                    <tr>
                    <td><?php echo $fetch_food['food_id'];?></td>
                    <td><?php echo $fetch_food['food_title'];?></td>
                    <td><?php echo $fetch_food['food_des'];?></td>
                    <td><?php echo $fetch_food['food_price'];?><b> RS.</b></td>
                    <td><img src="<?php echo '../images/food/'. $fetch_food['food_img'];?>" alt="no found" height="100px"></td>
                    <td><?php echo $fetch_food['cat_title'];?></td>
                    <td><?php echo $fetch_food['featured'];?></td>
                    <td><?php echo $fetch_food['active'];?></td>
                    <td>
                       <a href="./update_food.php?updatefoodid=<?php echo $fetch_food['food_id']?>" class="admin-btn">Update</a><br><br>
                       <a href="./del_food.php?delfoodid=<?php echo $fetch_food['food_id']?>" class="admin-btn2">Delete</a>
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