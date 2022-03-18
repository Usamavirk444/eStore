<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

    if (isset($_POST['submit'])) {
         $fullname= mysqli_real_escape_string($conn,$_POST['fullname']);
         $username= mysqli_real_escape_string($conn,$_POST['username']);
        // to encrpyt the pass use md5(mysqli querry)
         $pass= mysqli_real_escape_string($conn,$_POST['pass']);
         $add_sql ="INSERT INTO `food_admin`(`full_name`, `username`, `password`) VALUES ('$fullname','$username','$pass')";
         $add_run = mysqli_query($conn,$add_sql);
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
            <h1>Add Admin</h1>
            <form class="body1" method="post">
                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab">Sign In</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                            class="tab"></label>
                        <div class="login-form">
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label">Fullname</label>
                                    <input id="user" type="text" name="fullname" class="input">
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input id="user" type="text" name="username" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" name="pass" class="input" data-type="password">
                                </div>
                                <!-- <div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div> -->
                                <div class="group">
                                    <button name="submit" class="button">SUBMIT</button>
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