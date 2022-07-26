<?php include 'config.php';
include('session.php');
$buy_id = base64_decode($_GET['id']);

$listing = mysqli_query($con, "SELECT * FROM `tbl_buyer` WHERE `buy_id` = '$buy_id'");
$list = mysqli_fetch_array($listing);
if (isset($_POST["buy_property"])) {
    $name = strip_tags($_POST['name']);

    $number = strip_tags($_POST['number']);
    $email = strip_tags($_POST['email']);
    $property_type = $_POST['property_type'];
    $budget = $_POST['budget'];
    $prefer_location =  implode(",",$_POST['prefer_location']);

    $inser = "UPDATE `tbl_buyer` SET `update_date`=CURRENT_TIMESTAMP,`user_name`='$name',`user_mobile`='$number',`user_email`='$email', `property_type`='$property_type',`budget`='$budget',`prefer_location`='$prefer_location' WHERE `buy_id` = '$buy_id'";


    $result = mysqli_query($con, $inser);
    if ($result) {
        echo ("<script LANGUAGE='JavaScript'>
     window.alert('Buyer profile Updated Succesfully');
    </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
     window.alert('Something Went Wrong');
     </script>");
    }

    echo '<Script>window.location="buyer.php"</script>';

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>
    
    <link href="assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                         <h4 class="card-title">Edit Buyer Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <!--<ol class="breadcrumb justify-content-end">-->
                            <!--    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>-->
                            <!--    <li class="breadcrumb-item active">Edit Buyer Profile</li>-->

                            <!--</ol>-->

                            <button onclick="goBack()" class="btn btn-info d-lg-block m-l-15 text-white">Back</button>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <form class="form-row" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="form-group col-md-4">
                                            <label>Buyer Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $list['user_name'] ?>" placeholder="Shaurya Preet">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="preet77@gmail.com" value="<?= $list['user_email'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="number" value="<?= $list['user_mobile'] ?>" placeholder="123 456 5847">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Property Type</label>
                                            <select id="ptypes" class="form-control" name="property_type">

                                                <option value="">Select Type</option>
                                                <?php
                                                $type = mysqli_query($con, "SELECT * FROM `tbl_property_type`");
                                                while ($ptype = mysqli_fetch_array($type)) {
                                                ?>
                                                    <option value="<?= $ptype['type_id'] ?>" <?= (($list['property_type'] == $ptype['type_id']) ? 'selected' : '') ?>><?= $ptype['type'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Budget</label>
                                            <input type="text" class="form-control" name="budget" value="<?= $list['budget'] ?>" placeholder="Rs.">
                                        </div>
                                       <div class="form-group col-md-3">
                                            <label>State</label>
                                            <select class="form-control" name="state" id="state" required="">
                                                <option value="">Select State</option>
                                                <?php
                                                $sal = mysqli_query($con, "SELECT * FROM `tbl_state`");
                                                while ($row = mysqli_fetch_array($sal)) {
                                                ?>

                                                    <option value="<?= $row['state_id']; ?>" <?= (($row['state_id'] == $list['state'])? 'selected':'') ?>><?= $row['state_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>City</label>
                                            <select name="city" id="city" class="form-control" required="">
                                                <?php
                                                $sal = mysqli_query($con, "SELECT * FROM `tbl_city`  WHERE `city_id` = '". $list['city']."'");
                                                while ($row = mysqli_fetch_array($sal)) {
                                                ?>

                                                    <option value="<?= $row['city_id']; ?>" <?= (($row['city_id'] == $list['city'])? 'selected':'') ?>><?= $row['city_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Preferred Location</label>
                                            <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="prefer_location[]" required="">
                                                <option value="">Select Area</option>
                                                <?php
                                                $ar = explode(',',$list['prefer_location']);
                                                
                                                $pro_location = mysqli_query($con, "SELECT * FROM `tbl_areas`");
                                                while ($roww = mysqli_fetch_array($pro_location)) {
                                                ?>

                                                    <option value="<?= $roww['area']; ?>" <?= ((array_search($roww['area'],$ar))? 'selected':'') ?>><?= $roww['area']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <!--<input type="text" class="form-control" value="<?= $list['prefer_location'] ?>" name="prefer_location" placeholder="">-->
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="btn btn-danger" type="submit" name="buy_property">Save</button>
                                        </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
    <script src="assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
</body>

</html>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
    $(".select2").select2();
    $('.selectpicker').selectpicker();
</script>

<script>
    $('#state').change(function() {
        var state_id = $('#state').val();

        if (state_id != '') {
            $.ajax({
                url: "fetch-city.php",
                method: "POST",
                data: {
                    state_id: state_id
                },
                success: function(data) {
                    $('#city').html(data);
                }
            });
        } else {
            $('#city').html('<option value="">Select City</option>');
        }
    });
</script>