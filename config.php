<?php
session_start();

$con = mysqli_connect("localhost", "weban82x_shubham", "H2#o;vO-J1a2", "weban82x_shubham_property") or die("Error " . mysqli_error($con));

// $con = mysqli_connect("localhost", "root", "", "shubham") or die("Error " . mysqli_error($con));

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$ss = "SELECT * FROM `tbl_social` ";
$sos = mysqli_query($con, $ss);
$social = mysqli_fetch_array($sos);

if(isset($_SESSION['shubhamservice']) != '')
{
	
    $shubhamproperty = $_SESSION['shubhamservice'];
    $queryi = "SELECT * FROM `tbl_user`  WHERE uid = '".$shubhamproperty."'";
    $ras = mysqli_query($con,$queryi);
    $userdata = mysqli_fetch_array($ras);
}



if (isset($_POST["regsubmit"])) {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $number = strip_tags($_POST['number']);
    $password = strip_tags($_POST['password']);


    $fg =  "INSERT INTO `tbl_user`(`name`, `email`, `number`, `password`) VALUES ('$name','$email','$number','$password')";

    $result = mysqli_query($con, $fg);
    if ($result) {
        echo '<script>alert("Your Registration has been Successfull")</script>';
    } else {
        echo '<script>alert("Something Went Wrong")</script>';
    }
}



if (isset($_POST["loginsubmit"])) {

    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $fg =  "SELECT * FROM `tbl_user` WHERE `email` = '$username' OR `number` = '$username' ";
    $result = mysqli_query($con, $fg);
    if ($row = mysqli_fetch_array($result)) {
        if ($row['password'] == $password) {
            $_SESSION['shubhamservice']  = $row['uid'];
            echo '<script>alert("Login Successfully")</script>';
        } else {

            echo '<script>alert("Incorrect Username  or Password ! ! !")</script>';
        }
    } else {

        echo '<script>alert("no user with register name ! ! !")</script>';
    }

    echo '<script>window.location=' . $actual_link . '</script>';
}
