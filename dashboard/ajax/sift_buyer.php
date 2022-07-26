<?php
include'../config.php';

$buyer_id = $_POST['buyer_id'];

$as_id = $_POST['as_id'];
foreach($buyer_id as $lead){
    $mus = "UPDATE `tbl_buyer` SET `ba_id`= '$as_id' WHERE `buy_id` = '$lead' ";
    
// echo $mus;    
    

$result = mysqli_query($con, $mus);
}

?>