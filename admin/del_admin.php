<?php
include("../connection/conn.php");

if (empty($_SESSION['username'])) {
    header('Location:./index.php');
}

$admin_id=$_GET['adminid'];
$del_sql= "DELETE FROM `food_admin` WHERE `admin_id`='$admin_id'";
$del_run = mysqli_query($conn,$del_sql);

if ($del_run) {
    ?>
    <script>alert("Admin hass been delete");</script>
    <?php
    header("Refresh:0, url=./manage-admin.php");
}

?>