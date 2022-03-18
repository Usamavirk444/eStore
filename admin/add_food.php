<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

    if (isset($_POST['sub'])) {
         $title= mysqli_real_escape_string($conn,$_POST['ftitle']);
         $fdes= mysqli_real_escape_string($conn,$_POST['fdes']);
         $fprice= mysqli_real_escape_string($conn,$_POST['fprice']);
         $file= $_FILES['file']['name'];
         $fcategory= mysqli_real_escape_string($conn,$_POST['fcategory']);
         $feactured= mysqli_real_escape_string($conn,$_POST['feactured']);
         $active= mysqli_real_escape_string($conn,$_POST['factive']);

         $food_sql ="INSERT INTO `tbl_food`(`food_title`, `food_des`, `food_price`, `food_img`, `category_id`, `featured`, `active`) VALUES ('$title','$fdes','$fprice','$file','$fcategory','$feactured','$active')";
        move_uploaded_file($_FILES['file']['tmp_name'],"../images/food/".$file);

         $food_run = mysqli_query($conn,$food_sql);
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
                                    <input id="user" type="text" name="ftitle" class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Food description</label>
                                    <input id="user" type="text" name="fdes" class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Food Price</label>
                                    <input id="user" type="text" name="fprice" class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Image</label>
                                    <input id="user" type="file" name="file" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Category</label>
                                    <select name="fcategory" class="input" style="color:black;" id="">
                                        <option value="">Select</option>
                                    
                                    <?php
                                    $category_sql = "SELECT * FROM `tbl_category`";
                                    $category_run = mysqli_query($conn,$category_sql);
                                    while ($category_fetch = mysqli_fetch_array($category_run)) {
                                        ?>
                                        <option value="<?php echo $category_fetch['cat_id'];?>"><?php echo $category_fetch['cat_title'];?></option>
                                        <?php
                                    }
                                    
                                    ?>
                                    </select>
                                    
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Feastured</label>
                                    <input id="pass" type="text" name="feactured" class="input" >
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">active</label>
                                    <input id="pass" type="text" name="factive" class="input" >
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