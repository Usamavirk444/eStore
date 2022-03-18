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



   

            <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql ="SELECT * FROM `tbl_category` WHERE  `tbl_active`='Yes'";
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

 


    <?php include("./partials/footer.php");?>


</body>
</html>