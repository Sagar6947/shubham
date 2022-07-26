<?php

include 'config.php';
include('session.php');
if (isset($_POST["submit"])) {

    $name = strip_tags($_POST['name']);

    $number = strip_tags($_POST['number']);
    $email = strip_tags($_POST['email']);


    $rt = "INSERT INTO `tbl_seller`(`agent_id`, `user_name`, `user_mobile`, `user_email` ) VALUES ('$agent','$name','$number','$email')";
    $result = mysqli_query($con, $rt);

    $insert =  mysqli_insert_id($con);


    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Seller Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
           Something went wrong. Please try again later 
          </div>';
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="card-title">Add Property</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <button onclick="goBack()" class="btn btn-info d-lg-block m-l-15 text-white">Back</button>


                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->

                            <div class="tab-content">


                                <div class="tab-pane active" id="add" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-row" method="post" action="property_sell_code.php" enctype="multipart/form-data">

                                            <div class="submit-page">
                                                <div class="form-submit row">
                                                    <h6 class="btn btn-light ">Basic Information</h6>
                                                    <div class="submit-section ">
                                                        <div class="row">



                                                            <div class="form-group col-md-3">
                                                                <label>Seller</label>

                                                                <select class="form-control" name="user_id">

                                                                    <option value="">Select Seller</option>


                                                                    <?php
                                                                    $seller = mysqli_query($con, "SELECT * FROM `tbl_seller` WHERE `agent_id` = '$agent' ");
                                                                    while ($sell = mysqli_fetch_array($seller)) {
                                                                    ?>
                                                                        <option value="<?= $sell['user_id'] ?>"><?= $sell['user_name'] ?>(<?= $sell['user_mobile'] ?>)</option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>

                                                                <span> </br> <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Add Seller</button></span>
                                                            </div>


                                                            <div class="form-group col-md-6">
                                                                <label>Property Title</label>
                                                                <input type="text" name="property_name" class="form-control" required>
                                                            </div>


                                                            <div class="form-group col-md-3">
                                                                <label>Property Registration Number</label>
                                                                <input type="text" class="form-control" name="registration_no" required>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Property Category</label>
                                                                <select id="ptypes" class="form-control" name="property_category" required>

                                                                    <option value="">Select Category</option>

                                                                    <option value="Residential">Residential</option>
                                                                    <option value="Commercial">Commercial</option>
                                                                    <option value="Agriculture">Agriculture</option>
                                                                    <option value="Industrial">Industrial</option>

                                                                    <option value="hotel/resort">hotel/resort</option>


                                                                </select>
                                                            </div>


                                                            <div class="form-group col-md-4">
                                                                <label>Property Type</label>
                                                                <select id="ptypes" class="form-control" name="property_type" required>

                                                                    <option value="">Select Type</option>
                                                                    <?php
                                                                    $type = mysqli_query($con, "SELECT *  FROM `tbl_property_type`");
                                                                    while ($ptype = mysqli_fetch_array($type)) {
                                                                    ?>
                                                                        <option value="<?= $ptype['type_id'] ?>"><?= $ptype['type'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>



                                                            <div class="form-group col-md-4">
                                                                <label>Plot Area</label>
                                                                <input type="text" name="plot_area" placeholder="In sq ft" class="form-control" required>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Built up Area</label>
                                                                <input type="text" class="form-control" name="builtup_area" required>

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Year built</label>


                                                                <select class="form-control" name="built_year" required>

                                                                    <option value="">Select Category</option>

                                                                    <option value="5-10">5-10 Years</option>
                                                                    <option value="10-15">10-15 Years</option>
                                                                    <option value="15-20">15-20 Years</option>
                                                                    <option value="20-25">20-25 Years</option>

                                                                    <option value="25-30">25-30 Years</option>
                                                                    <option value="30-35">30-35 Years</option>


                                                                </select>

                                                            </div>


                                                            <div class="form-group col-md-4">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control" name="property_price" placeholder="Ex :- Rs. 45000000" required>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Price In Cr/Lac</label>
                                                                <input type="text" class="form-control" name="price_cr" placeholder="Ex :- 45">

                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Price value</label>
                                                                <select name="price_val" class="form-control">
                                                                    <option value="">select Price Value</option>
                                                                    <option value="Lac">Lac.</option>
                                                                    <option value="Cr">Cr.</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-submit row">
                                                    <h6 class="btn btn-light ">Location</h6>
                                                    <div class="submit-section">
                                                        <div class="row">

                                                            <div class="form-group col-md-6">
                                                                <label>Address</label>
                                                                <input type="text" name="address" class="form-control" required>
                                                            </div>



                                                            <div class="form-group col-md-6">
                                                                <label>State</label>
                                                                <select class="form-control" name="state" id="state" required="">
                                                                    <option value="">Select State</option>
                                                                    <?php
                                                                    $sal = mysqli_query($con, "SELECT *  FROM `tbl_state`");
                                                                    while ($row = mysqli_fetch_array($sal)) {
                                                                    ?>

                                                                        <option value="<?= $row['state_id']; ?>"><?= $row['state_name']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>City</label>
                                                                <select name="city" id="city" class="form-control" required="">
                                                                    <option value="">Select City</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Area</label>
                                                                <select class="form-control" name="area" id="area" required="">
                                                                    <option value="">Select Area</option>
                                                                    <?php
                                                                    $pro_location = mysqli_query($con, "SELECT *  FROM `tbl_areas`");
                                                                    while ($roww = mysqli_fetch_array($pro_location)) {
                                                                    ?>

                                                                        <option value="<?= $roww['area']; ?>"><?= $roww['area']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <option value="other">Other Area</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3" id="areabox" style="display:none">
                                                                <label>Enter area name</label>
                                                                <input type="text" name="areabox" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Zip Code</label>
                                                                <input type="text" name="zipcode" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Landmarks</label>
                                                                <input type="text" class="form-control" name="landmarks">
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Map</label>
                                                                <input type="text" class="form-control" name="map">
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-submit row">
                                                    <h6 class="btn btn-light ">Gallery</h6>
                                                    <div class="submit-section">
                                                        <div class="form-row">

                                                            <div class="form-group col-md-12">
                                                                <label>Upload Gallery</label>
                                                                <input type="file" class="form-control" name="gallery[]" multiple required>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12" id="">
                                                        <div class="form-group">
                                                            <label>Youtube Video </label>
                                                            <input type="text" name="youtube" class="form-control">
                                                        </div>
                                                    </div>



                                                    <div class="form-submit row">
                                                        <h6 class="btn btn-light ">Detailed Information</h6>
                                                        <div class="submit-section">
                                                            <div class="row">
                                                                <div class="form-group col-md-4" id="total_floor">
                                                                    <label>Number of Floors</label>
                                                                    <select class="form-control" name="total_floor">
                                                                        <option value="">Select Floor
                                                                        </option>
                                                                        <?php
                                                                        for ($j = 1; $j <= 16; $j++) {
                                                                        ?>
                                                                            <option value="<?= $j ?>"><?= $j ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4" id="flat_bhk">
                                                                    <label>Specification</label>
                                                                    <select class="form-control" name="flat_bhk">
                                                                        <option value="">Select
                                                                            Specification</option>
                                                                        <?php
                                                                        for ($j = 1; $j <= 9; $j++) {
                                                                        ?>
                                                                            <option value="<?= $j ?>"><?= $j ?>BHK</option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-4" id="bedrooms">
                                                                    <label>Bedrooms</label>
                                                                    <select class="form-control" name="bedrooms">
                                                                        <option value="">Select Bedrooms
                                                                            Specification</option>
                                                                        <?php
                                                                        for ($j = 1; $j <= 9; $j++) {
                                                                        ?>
                                                                            <option value="<?= $j ?>"><?= $j ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-md-4" id="bathrooms">
                                                                    <label>Bathrooms</label>
                                                                    <select class="form-control" name="bathrooms">
                                                                        <option value="">Select Bathrooms
                                                                        </option>
                                                                        <?php
                                                                        for ($j = 1; $j <= 9; $j++) {
                                                                        ?>
                                                                            <option value="<?= $j ?>"><?= $j ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-md-4">
                                                                    <label>Facing</label>
                                                                    <select id="rooms" name="facing" class="form-control">
                                                                        <option value="">select</option>

                                                                        <?php
                                                                        $face = mysqli_query($con, "SELECT *  FROM `tbl_facing`");
                                                                        while ($facing = mysqli_fetch_array($face)) {
                                                                        ?>
                                                                            <option value="<?= $facing['facing']  ?>"><?= $facing['facing']  ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-md-4">
                                                                    <label>Furnished/Unfurnished</label>
                                                                    <select id="rooms" name="furnished" class="form-control">
                                                                        <option value="">select</option>
                                                                        <option value="Furnished">Furnished</option>

                                                                        <option value="Semi-Furnished">Semi-Furnished</option>
                                                                        <option value="Unfurnished">Unfurnished</option>
                                                                    </select>
                                                                </div>



                                                                <div class="form-group col-md-4">
                                                                    <label>Transaction type</label>
                                                                    <select name="transaction_type" class="form-control" required="">
                                                                        <option value="">&nbsp;</option>
                                                                        <option value="Rent">For Rent</option>
                                                                        <option value="Sale">For Sale</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Ownership</label>
                                                                    <input type="text" class="form-control" name="ownership" placeholder="Ownership">
                                                                </div>




                                                                <div class="form-group col-md-12 row">
                                                                    <label>Property Features</label>

                                                                    <?php
                                                                    $s = 0;
                                                                    $amity = mysqli_query($con, "SELECT *  FROM `tbl_amenities`");
                                                                    while ($feature = mysqli_fetch_array($amity)) {
                                                                        $s = $s + 1;

                                                                    ?>
                                                                        <div class="col-sm-3">
                                                                            <input type="checkbox" id="vehicle<?= $s ?>" name="amenities[]" value="<?= $feature['ami_id']; ?>">
                                                                            <label for="vehicle<?= $s ?>"><?= $feature['name']; ?></label>
                                                                        </div>

                                                                    <?php

                                                                    }
                                                                    ?>
                                                                </div>


                                                                <div class="form-group col-md-12">
                                                                    <label>Liabilities (if any)</label>
                                                                    <textarea class="form-control" rows="4" name="liabilities"></textarea>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label>Description / Terms of sale (if any)</label>
                                                                    <textarea class="form-control h-60" id="editor1" name="terms"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <button class="btn btn-danger" type="submit" name="sell_property">Save</button>
                                                </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form class="form-row" method="post" enctype="multipart/form-data">
                        <div class="row">


                            <div class="form-group col-md-12">
                                <label>Seller Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Shaurya Preet" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="preet77@gmail.com" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="number" placeholder="123 456 5847" required>
                            </div>


                            <div class="form-group col-lg-4 col-md-4">
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary text-white">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
</body>

</html>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>



<script>
    $('#area').change(function() {
        if ($('#area').val() == 'other') {
            $('#areabox').show();
        } else {
            $("#areabox").hide();

        }
    });


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

    //     $('#youtube').hide(); 
    //     $('#video').hide(); 

    //     $('#type').change(function(){
    //       if($('#type').val() == 1) { 
    //         $('#youtube').show(); 
    //         $('#video').hide();
    //       } else if($('#type').val() == 2) {
    //         $('#video').show(); 
    //         $('#youtube').hide(); 
    //       } 
    //       else
    //       {
    //       $('#image').hide(); 
    //       $('#video').hide();
    //      }
    //   });
</script>