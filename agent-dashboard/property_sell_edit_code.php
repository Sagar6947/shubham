<?php
$i='';
include 'config.php';
if (isset($_POST["sell_property"])) {
    
      $user_id = strip_tags($_POST['user_id']);
    $pro_id = strip_tags($_POST['pro_id']);
    $property_name = strip_tags($_POST['property_name']);
    $registration_no = strip_tags($_POST['registration_no']);
    $property_category = strip_tags($_POST['property_category']);
    $property_type = strip_tags($_POST['property_type']);
    $flat_bhk = strip_tags($_POST['flat_bhk']);
    $property_price = strip_tags($_POST['property_price']);
    $address = strip_tags($_POST['address']);
    $state = strip_tags($_POST['state']);
    $map = strip_tags($_POST['map']);
    $city = strip_tags($_POST['city']);
    $zipcode = strip_tags($_POST['zipcode']);
    $plot_area = strip_tags($_POST['plot_area']);
    $builtup_area = strip_tags($_POST['builtup_area']);

    $area = strip_tags($_POST['area']);

    $built_year = strip_tags($_POST['built_year']);
    $furnished = strip_tags($_POST['furnished']);
    $transaction_type = strip_tags($_POST['transaction_type']);
    $landmarks = strip_tags($_POST['landmarks']);
    $ownership = strip_tags($_POST['ownership']);
    $liabilities = strip_tags($_POST['liabilities']);
    $terms = strip_tags($_POST['terms']);

    $bedrooms = strip_tags($_POST['bedrooms']);
    $bathrooms = strip_tags($_POST['bathrooms']);
    $total_floor = strip_tags($_POST['total_floor']);
    $facing = strip_tags($_POST['facing']);
    $amenities = implode(",", $_POST['amenities']);
    
    
     $price_val = strip_tags($_POST['price_val']);
      $price_cr = strip_tags($_POST['price_cr']);
    
    $youtube = $_POST['youtube'];
     $youtube = preg_replace("#.*youtube\.com/watch\?v=#", "" , $youtube);
     $youtube = preg_replace("#.*https://youtu.be/#", "" , $youtube);
    
 


    $rt = "UPDATE `tbl_property_sell` SET `update_date`= CURRENT_TIMESTAMP, `user_id`='$user_id' , `property_name`='$property_name',`registration_no`='$registration_no', 
    `property_category`='$property_category',`property_type`='$property_type', `flat_bhk`='$flat_bhk',`property_price`='$property_price ',`address`='$address',
    `state`='$state',`city`='$city',`zipcode`='$zipcode',`area`='$area',`map`='$map', `plot_area`='$plot_area',`builtup_area`='$builtup_area',`built_year`='$built_year',
    `furnished`='$furnished',`transaction_type`='$transaction_type',`landmarks`='$landmarks',`ownership`='$ownership', `amenities`='$amenities', `liabilities`='$liabilities',
    `terms`='$terms'  ,`bedrooms`='$bedrooms',`bathrooms`='$bathrooms',`total_floor`='$total_floor',`facing`='$facing' , `youtube`='$youtube',`price_cr`='$price_cr',
    `price_val`='$price_val'  WHERE `sell_id` = '$pro_id'";
    
    
    // echo $rt;

    
    $result = mysqli_query($con, $rt);

    

    if ($result) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Proeperty Updated Succesfully');
   </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong');
    </script>");
    }
    if (!empty($_FILES['gallery'])) {
        for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
            if( $_FILES['gallery']['name'][$i] !=  '')
            {
            $file = $_FILES['gallery']['name'][$i];
            $tmpfile = $_FILES['gallery']['tmp_name'][$i];
            $folder = (($file == '') ? '' : date("dmYHis") . $file);
            move_uploaded_file($tmpfile, 'images/property/' . $folder);

            $query = "INSERT INTO `tbl_property_image`(`pro_id`, `image`) VALUES  ('$pro_id','$folder')";
            mysqli_query($con, $query);
            }
        }
       
    }

    echo '<script>window.location="property-list.php"</script>';
}
