<?php
include'../config.php';

$status = $_POST['status'];
$ba = $_POST['ba'];
$u_id = $_POST['u_id'];

$mus = "UPDATE `tbl_buyer` SET `ba_id`='$ba',`user_status`='$status' WHERE `buy_id` = '$u_id' ";
 $result = mysqli_query($con, $mus);

?>