<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

$food_id=$_GET['delfoodid'];
$del_sql= "DELETE FROM `tbl_food` WHERE `food_id`='$food_id'";
$del_run = mysqli_query($conn,$del_sql);

if ($del_run) {
    ?>
    <script>alert("Admin hass been delete");</script>
    <?php
    header("Refresh:0, url=./manage-food.php");
}

?>