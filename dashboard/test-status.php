<?php include 'config.php';
include('session.php');
$id = $_GET['id'];
$status = $_GET['status'];
$update = mysqli_query($con, "UPDATE `tbl_testimonials` SET `status`='$status' WHERE `tstid` = '$id' ");
if ($update) {

    echo '<script>window.location="testimonials.php"</script>';
}
