<?php include 'config.php';
include('session.php');
$sell_id = base64_decode($_GET['id']);
$listing = mysqli_query($con, "SELECT * FROM `tbl_property_sell` WHERE `sell_id` = '$sell_id'");
$list = mysqli_fetch_array($listing);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Property Edit | Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center"> <h4 class="card-title">Edit Property</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                           

                            <button onclick="goBack()" class="btn btn-info d-lg-block m-l-15 text-white">Back</button>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <form class="row" method="post" action="property_sell_edit_code.php" enctype="multipart/form-data">

                                    <div class="submit-page">
                                        <div class="form-submit">
                                            <h5>Basic Information</h5>
                                            <div class="submit-section">
                                                <div class="row">
                                                    <input type="hidden" name="pro_id" value="<?= $sell_id ?>" class="form-control">
                                                    
                                                    
                                                    
                                                            <div class="form-group col-md-3">
                                                                <label>Seller</label>

                                                                <select class="form-control" name="user_id">

                                                                    <option value="">Select Seller</option>
                                                                    
                                                                 
                                                                    <?php
                                                                    $seller = mysqli_query($con, "SELECT * FROM `tbl_seller` WHERE `agent_id` = '$agent' ");
                                                                    while ($sell = mysqli_fetch_array($seller)) {
                                                                    ?>
                                                                        <option value="<?= $sell['user_id'] ?>" <?= (($list['user_id'] == $sell['user_id']) ? 'selected' : '') ?> ><?= $sell['user_name'] ?>(<?= $sell['user_mobile'] ?>)</option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                             </div>

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label>Property Title</label>
                                                        <input type="text" name="property_name" class="form-control" value="<?= $list['property_name'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Property Registration Number</label>
                                                        <input type="text" class="form-control" name="registration_no" value="<?= $list['registration_no'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Property Category</label>
                                                        <select id="ptypes" class="form-control" name="property_category" required>

                                                            <option value="">Select Category</option>

                                                            <option value="Residential" <?= (($list['property_category'] == 'Residential') ? 'selected' : '') ?>>Residential</option>
                                                            <option value="Commercial" <?= (($list['property_category'] == 'Commercial') ? 'selected' : '') ?>>Commercial</option>
                                                            <option value="Agriculture" <?= (($list['property_category'] == 'Agriculture') ? 'selected' : '') ?>>Agriculture</option>
                                                            <option value="Industrial" <?= (($list['property_category'] == 'Industrial') ? 'selected' : '') ?>>Industrial</option>

                                                            <option value="hotel/resort" <?= (($list['property_category'] == 'hotel/resort') ? 'selected' : '') ?>>hotel/resort</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Property Type</label>
                                                        <select id="ptypes" class="form-control" name="property_type">
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





                                                    <div class="form-group col-md-4">
                                                        <label>Plot Area</label>
                                                        <input type="text" name="plot_area" placeholder="In sq ft" class="form-control" value="<?= $list['plot_area'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Built up Area</label>
                                                        <input type="text" class="form-control" name="builtup_area" value="<?= $list['builtup_area'] ?>">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Year built</label>
                                                        <input type="text" name="built_year" placeholder="ex:2015" class="form-control" value="<?= $list['built_year'] ?>">


                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Price</label>
                                                        <input type="text" class="form-control" name="property_price" placeholder="Rs." value="<?= $list['property_price'] ?>">
                                                    </div>
                                                    
                                                     <div class="form-group col-md-4">
                                                                <label>Price In Cr/Lac</label>
                                                                <input type="text" class="form-control" name="price_cr" placeholder="Ex :- 45" value="<?= $list['price_cr'] ?>" >
                                                           
                                                            </div>
                                                             <div class="form-group col-md-2">
                                                                <label>Price value</label>
                                                                <select name="price_val" class="form-control">
                                                                    <option value="">select Price Value</option>
                                                                     <option value="Lac" <?=  (($list['price_val'] == 'Lac' ) ? 'Selected' : '') ?>>Lac.</option>
                                                                      <option value="Cr" <?=  (($list['price_val'] == 'Cr' ) ? 'Selected' : '') ?>>Cr.</option>
                                                                </select>
                                                           
                                                            </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-submit">
                                            <h5>Location</h5>
                                            <div class="submit-section">
                                                <div class="row">

                                                    <div class="form-group col-md-6">
                                                        <label>Address</label>
                                                        <input type="text" name="address" class="form-control" value="<?= $list['address'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>State</label>
                                                        <select class="form-control" name="state" id="state">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            $sal = mysqli_query($con, "SELECT * FROM `tbl_state`");
                                                            while ($row = mysqli_fetch_array($sal)) {
                                                            ?>

                                                                <option value="<?= $row['state_id']; ?>" <?= (($list['state'] == $row['state_id']) ? 'selected' : '') ?>><?= $row['state_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>City</label>
                                                        <select name="city" id="city" class="form-control">


                                                            <?php
                                                            $loc = mysqli_query($con, "SELECT * FROM `tbl_city`");
                                                            while ($city = mysqli_fetch_array($loc)) {
                                                            ?>

                                                                <option value="<?= $city['city_id']; ?>" <?= (($list['city'] == $city['city_id']) ? 'selected' : '') ?>><?= $city['city_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Area</label>
                                                        <select class="form-control" name="area" required="">
                                                            <option value="">Select Area</option>
                                                            <?php
                                                            $pro_location = mysqli_query($con, "SELECT * FROM `tbl_areas`");
                                                            while ($roww = mysqli_fetch_array($pro_location)) {
                                                            ?>

                                                                <option value="<?= $roww['area']; ?>" <?= (($list['area'] == $roww['area']) ? 'selected' : '') ?>><?= $roww['area']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Zip Code</label>
                                                        <input type="text" name="zipcode" class="form-control" value="<?= $list['zipcode'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Landmarks</label>
                                                        <input type="text" class="form-control" name="landmarks" value="<?= $list['landmarks'] ?>">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Map</label>
                                                        <input type="text" class="form-control" name="map" value="<?= $list['map'] ?>">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-submit">
                                            <h5>Detailed Information</h5>
                                            <div class="submit-section">
                                                <div class="row">

                                                    <div class="form-group col-md-4" id="total_floor">
                                                        <label>Number of Floors*</label>
                                                        <select class="form-control" name="total_floor">
                                                            <option value="">Select Floor
                                                            </option>
                                                            <?php
                                                            for ($j = 1; $j <= 16; $j++) {
                                                            ?>
                                                                <option value="<?= $j ?>" <?= (($list['total_floor'] == $j) ? 'selected' : '') ?>><?= $j ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4" id="flat_bhk">
                                                        <label>Flat Specification*</label>
                                                        <select class="form-control" name="flat_bhk">
                                                            <option value="">Select flat
                                                                Specification</option>
                                                            <?php
                                                            for ($j = 1; $j <= 9; $j++) {
                                                            ?>
                                                                <option value="<?= $j ?>" <?= (($list['flat_bhk'] == $j) ? 'selected' : '') ?>><?= $j ?>BHK</option>
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
                                                                <option value="<?= $j ?>" <?= (($list['bedrooms'] == $j) ? 'selected' : '') ?>><?= $j ?></option>
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
                                                                <option value="<?= $j ?>" <?= (($list['bathrooms'] == $j) ? 'selected' : '') ?>><?= $j ?></option>
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
                                                                <option value="<?= $facing['facing'] ?>" <?= (($list['facing'] == $facing['facing']) ? 'selected' : '') ?>><?= $facing['facing']  ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label>Furnished/Unfurnished</label>
                                                        <select id="rooms" name="furnished" class="form-control">
                                                            <option value>&nbsp;</option>
                                                            <option value="Furnished" <?= (($list['furnished'] == 'Furnished') ? 'selected' : '') ?>>Furnished</option>
                                                            <option value="Furnished" <?= (($list['furnished'] == 'Semi-Furnished') ? 'selected' : '') ?>>Semi-Furnished</option>

                                                            <option value="Unfurnished" <?= (($list['furnished'] == 'Unfurnished') ? 'selected' : '') ?>>Unfurnished</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label>Transaction type</label>
                                                        <select name="transaction_type" class="form-control">
                                                            <option value>&nbsp;</option>
                                                            <option value="Rent" <?= (($list['transaction_type'] == 'Rent') ? 'selected' : '') ?>>For Rent</option>
                                                            <option value="Sale" <?= (($list['transaction_type'] == 'Sale') ? 'selected' : '') ?>>For Sale</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Ownership</label>
                                                        <input type="text" class="form-control" name="ownership" placeholder="Ownership" value="<?= $list['ownership'] ?>">
                                                    </div>



                                                    <div class="form-group col-md-12 row">
                                                        <label>Property Features*</label>
                                                        </br> </br>
                                                        <?php


                                                        $s = 0;

                                                        $amity = mysqli_query($con, "SELECT * FROM `tbl_amenities`");
                                                        while ($feature = mysqli_fetch_array($amity)) {
                                                            $s = $s + 1;
                                                            $features =  explode(',', $list['amenities']);
                                                            if (in_array($feature['ami_id'], $features)) {
                                                                $scchecked = 'checked="checked"';
                                                            } else {
                                                                $scchecked = '';
                                                            }


                                                        ?>
                                                            <div class="col-sm-3">


                                                                <input type="checkbox" id="vehicle<?= $s ?>" name="amenities[]" value="<?= $feature['ami_id']; ?>" <?= $scchecked ?>>

                                                                <label for="vehicle<?= $s ?>"><?= $feature['name']; ?></label>
                                                            </div>

                                                        <?php



                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Liabilities (if any)</label>
                                                        <textarea class="form-control" rows="4" name="liabilities"><?= $list['liabilities'] ?></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Description/Terms of sale (if any)</label>
                                                        <textarea class="form-control h-60" id="editor1" name="terms"> <?= $list['terms'] ?></textarea>
                                                    </div>
                                                <div class="col-sm-12" id="">
                                                         <div class="form-group">
                                                              <label>Youtube Video </label>
                                                               <input type="text" name="youtube" class="form-control" value="<?= $list['youtube'] ?>">
                                                           </div>
                                                      </div>

                                                    <div class="form-submit">
                                                        <h5>Gallery</h5>
                                                        <div class="submit-section">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Upload Gallery</label>
                                                                    <input type="file" class="form-control" name="gallery[]" multiple >
                                                                </div>

                                                                <?php
                                                                $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $list['sell_id'] . "' ");
                                                                while ($img = mysqli_fetch_array($list_img)) {

                                                                ?>

                                                                    <div class="col-sm-3">

                                                                        <div class="image">

                                                                            <img src="images/property/<?= $img['image'] ?>" alt="latest property" class="img-fluid imgheight">

                                                                            <div class="sb-date">
                                                                                <a data-sid2="<?= $img['img_id']; ?>" class="btn_delete"><i class="fa fa-trash"></i></a>
                                                                            </div>

                                                                        </div>


                                                                    </div>

                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                        
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <br>
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
    $(document).on('click', '.btn_delete', function() {
        var id = $(this).data("sid2");
        var el = this;
        if (confirm("Are you Sure you want to Delete")) {
            $.ajax({
                url: "ajax/pro-img-del.php",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "text",
                success: function(data) {
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error['responseText']);
                }
            });
        }
    });
</script>