<?php
include '../config.php';

$con = mysqli_connect("localhost", "webangel_shubham", "shubhamenterprises#2022", "webangel_shubham") or die("Error " . mysqli_error($con));

$query = "SELECT * FROM `tbl_property_sell` WHERE  `ba_id` = '$agent'";
// $lowest_price = 0;
// $highest_price = 999999999;

$conditions = array();
if (($_POST['city'] != '')  || ($_POST['lowest_price'] != '') || ($_POST['highest_price'] != '')) {

    $city = $_POST['city'];
    $minimum = $_POST['lowest_price'];
    $maximum = $_POST['highest_price'];
    if ($_POST['city']) {
        $conditions[] = "   `city` =  '$city'";
    }

    if (($_POST['lowest_price'] != '') && ($_POST['highest_price'] != '')) {
        $conditions[] = "  `property_price` BETWEEN  '$minimum' AND '$maximum'";
    }
    if (($_POST['lowest_price'] != '') && ($_POST['highest_price'] == '')) {
        $conditions[] = "  `property_price` >=  '$minimum'";
    }
    if (($_POST['lowest_price'] == '') && ($_POST['highest_price'] != '')) {
        $conditions[] = "  `property_price` <=  '$maximum'";
    }
    if (count($conditions) > 0) {
        $query .= " AND " . implode(' AND ', $conditions);
    }
}


?>

<div class="row">
    <?php
    $i = 0;
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 5;
    $offset = ($pageno - 1) * $no_of_records_per_page;


    $total_pages_sql = "SELECT COUNT(*) FROM tbl_property_sell WHERE  `ba_id` = '$agent'";
    $result = mysqli_query($con, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $query .= " ORDER BY sell_id DESC LIMIT $offset, $no_of_records_per_page ";
    // echo $query;

    $pro = mysqli_query($con, $query);
    while ($property = mysqli_fetch_array($pro)) {
        $i = $i + 1;

        $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $property['sell_id'] . "' GROUP BY `pro_id`");
        $img = mysqli_fetch_array($list_img);

        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
        $type = mysqli_fetch_array($ptype);
        $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $property['state'] . "' ");
        $row = mysqli_fetch_array($sal);

        $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $property['city'] . "' ");
        $city = mysqli_fetch_array($loc);

    ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="">
                            <img src="images/property/<?= $img['image']  ?>" alt="<?= $property['property_name'] ?>" class="img-circle" height="70" width="70" />

                        </div>
                        <div class="p-l-20">
                            <a href="property-details.php?id=<?= base64_encode($property['sell_id']) ?>">
                                <h5 class="font-light"><?= wordwrap($property['property_name'], 30, '<br>') ?></h5>
                            </a>


                            <h6>
                                <?= (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Complete</span>' : (($property['status'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">pending</span>')); ?>



                                <?= (($property['approval'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Approved</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-danger">Aot Approved </span>'); ?>


                            </h6>

                            <a href="<?= $base_url ?>property-detail.php?id=<?= $property['sell_id'] ?>" class="btn badge btn-success text-white" target="_blank">
                                Website View</a>
                            <a href="property-edit.php?id=<?= base64_encode($property['sell_id']) ?>" class=" fs-12 badge btn btn-dark">Edit</a>
                        </div>
                    </div>
                    <div class="row m-t-40">
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= date_format(date_create($property['create_date']), "d M Y") ?></h5>
                            <h6>Create date</h6>
                        </div>
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $type['type'] ?></h5>
                            <h6>Type</h6>
                        </div>
                        <div class="col text-center">
                            <h5 class="font-light">Rs.<?= $property['property_price'] ?>/-</h5>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-t-20">
                        <!-- <div class="col b-r text-center">
                            <h5 class="font-light"><?= $property['plot_area'] ?>SQFT</h5>
                            <h6>Plot Area</h6>
                        </div>
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $property['builtup_area'] ?>SQFT</h5>
                            <h6>Builtup Area</h6>
                        </div> -->
                        <div class="col b-r text-center">
                            <h5 class="font-light "><?= $property['transaction_type'] ?></h5>
                            <h6>Transaction Type</h6>
                        </div>
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $row['state_name'] ?></h5>
                            <h6>State</h6>
                        </div>
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $city['city_name'] ?></h5>
                            <h6>City</h6>
                        </div>
                    </div>
                    <hr>
                    <!-- <div class="row m-t-20">
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $row['state_name'] ?></h5>
                            <h6>State</h6>
                        </div>
                        <div class="col b-r text-center">
                            <h5 class="font-light"><?= $city['city_name'] ?></h5>
                            <h6>City</h6>
                        </div>
                        <div class="col text-center">
                            <h5 class="font-light"><?= $property['zipcode'] ?></h5>
                            <h6>Zipcode</h6>
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col text-center">
                            <h5 class="font-light"><?= substr($property['address'], 0, 40) ?></h5>
                            <h6>Address</h6>
                        </div>
                    </div> -->


                </div>
                <div>

                </div>

            </div>
        </div>

    <?php
    }
    ?>

</div>

<div class="row">
    <div class="dataTables_paginate paging_simple_numbers">

        <ul class="pagination rounded-active justify-content-center mb-0">


            <li class="page-item <?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?>">
                <a class='page-link' href="<?php if ($pageno <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno - 1);
                                            } ?>">
                    Previous </a>
            </li>


            <?php

            if ($total_pages <= 10) {
                for ($counter = 1; $counter <= $total_pages; $counter++) {
                    if ($counter == $pageno) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                    }
                }
            }

            ?>

            <li class="page-item <?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno + 1);
                                            } ?>"> Next </a>
            </li>

        </ul>
    </div>
</div>
</div>

<script>
</script>
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