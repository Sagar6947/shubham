<?php
session_start();
// $con = mysqli_connect("localhost", "webangel_shubham", "shubhamenterprises#2022", "webangel_shubham") or die("Error " . mysqli_error($con));
// $con = mysqli_connect("localhost", "weban82x_shubham", "H2#o;vO-J1a2", "weban82x_shubham_property") or die("Error " . mysqli_error($con));
$con = mysqli_connect("localhost", "root", "", "shubham_property") or die("Error " . mysqli_error($con));

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
