<?php
include '../config.php';

$status = $_POST['status'];
$approval = $_POST['approval'];
$featured = $_POST['featured'];
$popular = $_POST['popular'];
$sid = $_POST['sid'];

$mus = "UPDATE `tbl_property_sell` SET `approval`='$approval',`status`='$status' , `featured`='$featured' , `popular`='$popular' WHERE `sell_id`  = '$sid' ";
$result = mysqli_query($con, $mus);



echo '<Script>window.location="../property-list.php"</script>';
