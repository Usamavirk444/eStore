<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

$category_id=$_GET['delcatid'];
$del_sql= "DELETE FROM `tbl_category` WHERE `cat_id`='$category_id'";
$del_run = mysqli_query($conn,$del_sql);

if ($del_run) {
    ?>
    <script>alert("Admin hass been delete");</script>
    <?php
    header("Refresh:0, url=./manage-category.php");
}

?>