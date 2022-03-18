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

    $cate_id = $_GET['categoryid'];
    $cate_sql = "SELECT `cat_title` FROM `tbl_category` WHERE `cat_id` = '$cate_id'";
    $cate_run = mysqli_query($conn,$cate_sql);
    $cate_fet = mysqli_fetch_array($cate_run);
    $cate_title = $cate_fet['cat_title'];
    ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $cate_title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2> 
            <?php
                $food_menu = "SELECT * FROM `tbl_food` WHERE `category_id` = '$cate_id'";
                $food_run = mysqli_query($conn, $food_menu);
                while ($food_fet = mysqli_fetch_array($food_run)) {
                    ?>
                     <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo './images/food/'. $food_fet['food_img'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $food_fet['food_title'];?></h4>
                    <p class="food-price">Rs. <?php echo $food_fet['food_price']?></p>
                    <p class="food-detail">
                       <?php echo $food_fet['food_des']?>
                    </p>
                    <br>

                    <a href="order.php?orderid=<?php echo $food_fet['food_id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                    <?php
                }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("./partials/footer.php");?>


</body>
</html>