<?php
include'../config.php';

$status = $_POST['status'];
$featured = $_POST['featured'];
$u_id = $_POST['u_id'];


$mus = "UPDATE `tbl_agent` SET `agent_status`='$status',`featured`='$featured' WHERE `agent_id` = '$u_id' ";

$result = mysqli_query($con, $mus);

//echo'<Script>window.location="ba-list.php"</script>';



?>