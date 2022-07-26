<?php 

include('config.php');
$cid = $_POST['cid'];
echo'<option>Select Sub Category</option>';

     $qe=mysqli_query($con,"SELECT * FROM `tbl_sub_category` WHERE `category_id` = '".$cid."' ");
       while($ci=mysqli_fetch_array($qe))
{
    ?>
     <option value="<?= $ci['sid'] ?>"><?= $ci['subcat_name'] ?></option>
<?php
}

?>


