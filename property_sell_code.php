<?php
include 'config.php';
if (isset($_POST["sell_property"])) {

    $name = strip_tags($_POST['name']);
    $number = strip_tags($_POST['number']);
    $email = strip_tags($_POST['email']);

    $rt = "INSERT INTO `tbl_seller`(`user_name`, `user_mobile`, `user_email`) VALUES ('$name','$number','$email')";
    $result = mysqli_query($con, $rt);
    $insert =  mysqli_insert_id($con);



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
    if ($area == 'other') {
        $areabox = mysqli_real_escape_string($con, $_POST['areabox']);
        $rt = "INSERT INTO `tbl_areas`(`area`) VALUES ('$areabox')";
        $result = mysqli_query($con, $rt);
        $area = mysqli_insert_id($con);
    }

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
    $price_cr = strip_tags($_POST['price_cr']);
    $price_val = strip_tags($_POST['price_val']);

    $rt = "INSERT INTO `tbl_property_sell`( `user_id`, `property_name`, `registration_no`, `property_category`, `property_type`, `flat_bhk`, `property_price`, `address`, `state`, `city`, `zipcode`, `area`, `map`, `plot_area`, `builtup_area`, `built_year`, `bedrooms`, `bathrooms`, `total_floor`, `facing`, `furnished`, `transaction_type`, `landmarks`, `ownership`, `amenities`, `liabilities`, `terms` ,  `price_cr`, `price_val` , `approval`) VALUES ('$insert','$property_name','$registration_no',  '$property_category' ,'$property_type', '$flat_bhk' ,'$property_price','$address','$state','$city','$zipcode','$area','$map', '$plot_area','$builtup_area','$built_year','$bedrooms','$bathrooms','$total_floor', '$facing', '$furnished','$transaction_type','$landmarks','$ownership', '$amenities' ,'$liabilities','$terms'  , '$price_cr'  , '$price_val' , '0')";
    $result = mysqli_query($con, $rt);
    $sell_id = mysqli_insert_id($con);

    if (!empty($_FILES['gallery']['name'])) {
        for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
            $file = $_FILES['gallery']['name'][$i];
            $tmpfile = $_FILES['gallery']['tmp_name'][$i];
            $folder = (($file == '') ? '' : rand(10, 10000) . $file);
            move_uploaded_file($tmpfile, 'agent-dashboard/images/property/' . $folder);

            $query = "INSERT INTO `tbl_property_image`(`pro_id`, `image`) VALUES  ('$sell_id','$folder')";
            mysqli_query($con, $query);
        }
    }
    if ($result) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Proeperty Added Succesfully');
   </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong');
    </script>");
    }

    echo '<script>window.location="property-add.php"</script>';
}
