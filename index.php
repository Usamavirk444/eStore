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
    <?php
    include("./partials/menu.php");
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql ="SELECT * FROM `tbl_category` WHERE `tbl_featured`='Yes' AND `tbl_active`='Yes' LIMIT 3";
                $run = mysqli_query($conn,$sql);
                while ($fet = mysqli_fetch_array($run)) {
                    ?>
            <a href="category-foods.php?categoryid=<?php echo $fet['cat_id'];?>">
                <div class="box-3 float-container">
                    <img src="<?php echo './images/category/'. $fet['tbl_img'];?>" alt="Pizza"
                        class="img-responsive img-curve">
                    <h3 class="float-text text-white"><?php echo $fet['cat_title']?></h3>
                </div>
            </a>
            <?php
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php 
 $food_fet_sql = "SELECT * FROM tbl_food WHERE `featured`= 'Yes' AND `active`='Yes' LIMIT 3";
 $food_fet_run = mysqli_query($conn,$food_fet_sql);
 while ($food_all = mysqli_fetch_array($food_fet_run)) {
     ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo './images/food/'. $food_all['food_img'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4><?php echo $food_all['food_title'];?></h4>
                    <p class="food-price">Rs. <?php echo $food_all['food_price'];?></p>
                    <p class="food-detail">
                    <?php echo $food_all['food_des'];?>
                    </p>
                    <br>

                    <a href="order.php?orderid=<?php echo $food_all['food_id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php
 }
?>

            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("./partials/footer.php");?>

</body>

</html>