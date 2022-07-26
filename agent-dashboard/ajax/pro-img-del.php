<?php

include('../config.php');


$i=$_GET['id'];

echo $i;

$er = "SELECT * FROM `tbl_property_image` WHERE `img_id` = '" . $i . "' ";
$pro = mysqli_query($con, $er);
$property = mysqli_fetch_array($pro);

unlink('../images/property/'.$property['image']);

$q=mysqli_query($con,"DELETE FROM `tbl_property_image` WHERE `img_id` = '$i'");




?>