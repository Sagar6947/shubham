<?php include('config.php');
include('session.php');
$sell_id = base64_decode($_GET['id']);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">All Properties </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="seller.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Property</a>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php

                    $query = "SELECT * FROM `tbl_property_sell` WHERE `sell_id` = '$sell_id'";
                    $pro = mysqli_query($con, $query);
                    while ($property = mysqli_fetch_array($pro)) {

                        $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $property['sell_id'] . "' GROUP BY `pro_id`");
                        $img = mysqli_fetch_array($list_img);

                        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
                        $type = mysqli_fetch_array($ptype);
                        $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $property['state'] . "' ");
                        $row = mysqli_fetch_array($sal);

                        $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $property['city'] . "' ");
                        $city = mysqli_fetch_array($loc);

                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="">
                                            <img src="images/property/<?= $img['image']  ?>" alt="<?= $property['property_name'] ?>" class="img-circle" height="100" width="100" />

                                        </div>
                                        <div class="p-l-20">
                                            <h4 class="font-light"><?= wordwrap($property['property_name'], 30, '<br>') ?>

                                            </h4>
                                            <h6>
                                                <?= (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Complete</span>' : (($property['status'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">pending</span>')); ?>



                                                <?= (($property['approval'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Approved</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-danger">Aot Approved </span>'); ?>


                                            </h6>
                                  <a href="<?= $base_url ?>property-detail.php?id=<?= $property['sell_id'] ?>" class="btn btn-success text-white" target="_blank">
                                   <i class="ti-plus"></i>Website View</a>
 
                                            <a href="property-edit.php?id=<?= base64_encode($property['sell_id']) ?>" class=" fs-12 btn btn-dark">Edit</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= date_format(date_create($property['create_date']), "d M Y") ?></h5>
                                            <h6>Create date</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $type['type'] ?></h5>
                                            <h6>Type</h6>
                                        </div>


                                        <?php
                                        if ($property['flat_bhk'] != '') {
                                        ?>
                                            <div class="col b-r text-center">
                                                <h5 class="font-light"><?= $property['flat_bhk']; ?> BHK</h5>
                                                <h6>Flat In BHK</h6>

                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['registration_no']; ?></h5>
                                            <h6>Registration No</h6>
                                        </div>

                                      

                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col b-r text-center">
                                            <h5 class="font-light">Rs.<?= $property['property_price'] ?>/-</h5>
                                            <h6>Price</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['plot_area'] ?>SQFT</h5>
                                            <h6>Plot Area</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['builtup_area'] ?>SQFT</h5>
                                            <h6>Builtup Area</h6>
                                        </div>

                                       
                                    </div>
                                    <hr>
                                    <div class="row">

                                    
                                    <div class="col b-r text-center">
                                            <h5 class="font-light "><?= $property['transaction_type'] ?></h5>
                                            <h6>Transaction Type</h6>
                                        </div>

                                    <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['built_year'] ?></h5>
                                            <h6>Built Year</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['furnished'] ?></h5>
                                            <h6>Furnish Status</h6>
                                        </div>
                                    </div>
                                    <hr>


                                        <div class="row">
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $row['state_name'] ?></h5>
                                            <h6>State</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $city['city_name'] ?></h5>
                                            <h6>City</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['zipcode'] ?></h5>
                                            <h6>Zipcode</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col  b-r text-center">
                                            <h5 class="font-light"><?= substr($property['address'], 0, 40) ?></h5>
                                            <h6>Address</h6>
                                        </div>
                                        <hr>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $property['landmarks'] ?></h5>
                                            <h6>Landmarks</h6>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <?php
                                    if ($property['amenities'] != '') {
                                    ?>
                                        <div class="row">
                                            <div class="col b-r text-center">
                                                <h5 class="font-light"> Amenities : 
                                                    <?php
                                                    $features =  explode(',', $property['amenities']);
                                                    foreach ($features as $fetch) {

                                                        $amity = mysqli_query($con, "SELECT * FROM `tbl_amenities` WHERE `ami_id` = '$fetch' ");
                                                        while ($feature = mysqli_fetch_array($amity)) {
                                                    ?>
                                                            <?= $feature['name']; ?> ,
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </h5>
                                                <h6></h6>
                                            </div>
 
                                        </div>
                                    <?php
                                    }
                                    ?>
 <hr>
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5 class="font-light"> Liabilities : <?= $property['liabilities'] ?></h5>
                                            
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="font-light">Terms : <?= $property['terms'] ?></h5>
                                        
                                        </div>
                                    </div>

                                    <hr>







                                </div>
                                <div>

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


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>


    <script>
        $(function() {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
        });
    </script>
</body>

</html>