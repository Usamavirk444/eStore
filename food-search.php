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
    ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                  $search =$_POST['search'];

            ?>
                  
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo  $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


        <?php
                   $search =$_POST['search'];
                   $search_sql = "SELECT * FROM `tbl_food` WHERE food_title LIKE '%$search%' OR `food_des` LIKE '%% $search'";
                   $search_run = mysqli_query($conn,$search_sql);
                    if ($search_run) {
                   
                        while ($search_fet = mysqli_fetch_array($search_run)) {
                            ?>
                            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo './images/food/'. $search_fet['food_img'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $search_fet['food_title'];?></h4>
                    <p class="food-price">Rs. <?php echo $search_fet['food_price'];?></p>
                    <p class="food-detail">
                    <?php echo $search_fet['food_des'];?>
                    </p>
                    <br>

                    <a href="order.php?orderid=<?php echo $search_fet['food_id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                            <?php
                        }

                    }else{
                        echo "Please Enter The Right Keyword";
                    }
                
                   

        ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("./partials/footer.php");?>


</body>
</html>