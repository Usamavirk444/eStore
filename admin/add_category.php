<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

    if (isset($_POST['sub'])) {
         $title= mysqli_real_escape_string($conn,$_POST['title']);
         $file= $_FILES['file']['name'];
         $featured= mysqli_real_escape_string($conn,$_POST['featured']);
         $active= mysqli_real_escape_string($conn,$_POST['active']);

         $cate_sql ="INSERT INTO `tbl_category`(`cat_title`, `tbl_img`, `tbl_featured`, `tbl_active`) VALUES ('$title','$file','$featured','$active')";
        move_uploaded_file($_FILES['file']['tmp_name'],"../images/category/".$file);

         $cate_run = mysqli_query($conn,$cate_sql);
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
            <h1>Add category</h1>
            <form class="body1" method="post" enctype='multipart/form-data'>
                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab">Category</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                            class="tab"></label>
                        <div class="login-form">
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label">Title</label>
                                    <input id="user" type="text" name="title" class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Image</label>
                                    <input id="user" type="file" name="file" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Featured</label>
                                    <input id="pass" type="text" name="featured" class="input" >
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">active</label>
                                    <input id="pass" type="text" name="active" class="input" >
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