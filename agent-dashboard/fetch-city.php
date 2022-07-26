<?php 

include('config.php');
$state_id = $_POST['state_id'];
echo'<option>Select city</option>';

     $qe=mysqli_query($con,"SELECT * FROM `tbl_city` WHERE `state_id` = '".$state_id."' ");
       while($ci=mysqli_fetch_array($qe))
{
    ?>
     <option value="<?= $ci['city_id'] ?>"><?= $ci['city_name'] ?></option>
<?php
}




?>


