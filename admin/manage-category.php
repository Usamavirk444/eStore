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
            <h1>Manage Category</h1>
            <a href="./add_category.php" class="admin-btn1">Add category</a>
            <!-- admin table start -->
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                <?php
                $cate_sql= "SELECT * FROM tbl_category";
                $cate_run = mysqli_query($conn,$cate_sql);
                while ($fetch_cate= mysqli_fetch_array($cate_run)) {
                    ?>
                    <tr>
                    <td><?php echo $fetch_cate['cat_id'];?></td>
                    <td><?php echo $fetch_cate['cat_title'];?></td>
                    <td><img src="<?php echo '../images/category/'. $fetch_cate['tbl_img'];?>" alt="no found" height="100px"></td>
                    <td><?php echo $fetch_cate['tbl_featured'];?></td>
                    <td><?php echo $fetch_cate['tbl_active'];?></td>
                    <td>
                       <a href="./update_category.php?updatecatid=<?php echo $fetch_cate['cat_id']?>" class="admin-btn">Update</a>&nbsp;&nbsp;&nbsp;
                       <a href="./del_category.php?delcatid=<?php echo $fetch_cate['cat_id']?>" class="admin-btn2">Delete</a>
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