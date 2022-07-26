<?php
include'../config.php';

$seller_id = $_POST['seller_id'];

$as_id = $_POST['as_id'];
foreach($seller_id as $lead){
    $mus = "UPDATE `tbl_seller` SET `agent_id`= '$as_id' WHERE `user_id` = '$lead' ";
    
// echo $mus;    
    

$result = mysqli_query($con, $mus);
}

?>