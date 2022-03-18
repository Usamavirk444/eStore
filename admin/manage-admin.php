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
            <h1>Manage Admin</h1>
            <a href="./add-admin.php" class="admin-btn1">Add Admin</a>
            <!-- admin table start -->
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php
                $fetch_admin = "SELECT * FROM `food_admin`";
                $fetch_run = mysqli_query($conn,$fetch_admin);
                while ($fetch_array=mysqli_fetch_array($fetch_run)) {
                    ?>
                     <tr>
                    <td><?php echo $fetch_array['admin_id'];?></td>
                    <td><?php echo $fetch_array['full_name'];?></td>
                    <td><?php echo $fetch_array['username']?></td>
                    <td>
                       <a href="./update_admin.php?updateadminid=<?php echo $fetch_array['admin_id']?>" class="admin-btn">Update</a>&nbsp;&nbsp;&nbsp;
                       <a href="./del_admin.php?adminid=<?php echo $fetch_array['admin_id'];?>" class="admin-btn2">Delete</a>
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