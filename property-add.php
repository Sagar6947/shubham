<?php
include 'config.php';
?>

<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title> Property Add | Shubham Enterprises (One stop solution) </title>
<?php include('head.php'); ?>

<body>
    <?php include('menu.php') ?>
    <main id="content">

        <section class="section-light">
            <div class="container">
                <nav aria-label="breadcrumb">

                    <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 text-center">
                        List Your Property
                    </h1>
                </nav>
            </div>

        </section>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-1 "></div>
                    <div class="col-lg-10 col-md-10 ">
                        <div class="dashboard-wraper">

                            <div class="custom-tab style-1">

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <form class="form-row" method="post" action="property_sell_code.php" enctype="multipart/form-data">
                                            <div class="form-submit row">
                                                <div class="submit-section">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label>Seller Name*</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Shaurya Preet" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label>Email*</label>
                                                            <input type="email" class="form-control" name="email" placeholder="preet77@gmail.com" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Phone*</label>
                                                            <input type="text" class="form-control" name="number" placeholder="123 456 5847" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <h6 class="icon-mi-left  w-100">Basic Information</h6>
                                                            <input type="hidden" name="user_id" value="<?= $id  ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Property Title</label>
                                                            <input type="text" name="property_name" class="form-control" required>
                                                        </div>


                                                        <div class="form-group col-md-6">
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
                                                                $type = mysqli_query($con, "SELECT * FROM `tbl_property_type`");
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
                                                            <input type="text" class="form-control" name="property_price" placeholder="Rs." required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label>Price In Cr/Lac</label>
                                                            <input type="text" class="form-control" name="price_cr" placeholder="Ex :- 45">

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Price value</label>
                                                            <select name="price_val" class="form-control">
                                                                <option value="">select Price Value</option>
                                                                <option value="Lac">Lac.</option>
                                                                <option value="Cr">Cr.</option>
                                                            </select>

                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <h6 class="icon-mi-left  w-100">Location</h6>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" required>
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label>State</label>
                                                            <select class="form-control" name="state" id="state" required="">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                $sal = mysqli_query($con, "SELECT * FROM `tbl_state`");
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
                                                                $pro_location = mysqli_query($con, "SELECT * FROM `tbl_areas`");
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
                                                        <div class="form-group col-md-12">
                                                            <h6 class="icon-mi-left  w-100">Gallery</h6>
                                                        </div>



                                                        <div class="form-group col-md-12">
                                                            <label>Upload Gallery</label>
                                                            <input type="file" class="form-control" name="gallery[]" multiple required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <h6 class="icon-mi-left  w-100">Detailed Information</h6>
                                                        </div>



                                                        <div class="form-group col-md-4" id="total_floor">
                                                            <label>Number of Floors*</label>
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
                                                            <label>Specification*</label>
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
                                                            <label>Bedrooms*</label>
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
                                                            <label>Bathrooms*</label>
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
                                                                $face = mysqli_query($con, "SELECT * FROM `tbl_facing`");
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
                                                            <label class="col-md-12">Property Features* </label>
                                                            <br>
                                                            <?php
                                                            $s = 0;
                                                            $amity = mysqli_query($con, "SELECT * FROM `tbl_amenities`");
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
        </section>


    </main>
    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>


</body>

</html>
<script>
    $("#flat_bhk").hide();



    $('#ptypes').change(function() {
        if ($('#ptypes').val() == 1) {
            $('#flat_bhk').show();
        } else {
            $("#flat_bhk").hide();

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
    $('#area').change(function() {
        if ($('#area').val() == 'other') {
            $('#areabox').show();
        } else {
            $("#areabox").hide();

        }
    });
</script>