<?php
include'../config.php';

$status = $_POST['status'];
$u_id = $_POST['u_id'];


$mus = "UPDATE `tbl_sub_category` SET `status`='$status' WHERE `sid` = '$u_id' ";

$result = mysqli_query($con, $mus);

//echo'<Script>window.location="ba-list.php"</script>';



?>