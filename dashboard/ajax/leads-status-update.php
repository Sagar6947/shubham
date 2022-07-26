<?php
include'../config.php';

$status = $_POST['status'];
$ba = $_POST['ba'];
$u_id = $_POST['u_id'];

$mus = "UPDATE `tbl_seller` SET `agent_id`='$ba',`user_status`='$status' WHERE `user_id` = '$u_id' ";
 

$result = mysqli_query($con, $mus);

//echo'<Script>window.location="../all-leads.php"</script>';



?>