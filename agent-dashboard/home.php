<?php include('config.php');
include('session.php');
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
                        <h4 class="text-themecolor"><?= $agentdata['agent_name'] ?> Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>

                            </ol>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light"> <?php
                                                                $er = "SELECT * FROM `tbl_seller` WHERE `agent_id` =  '" . $agentdata['agent_id'] . "'";
                                                                $a_user = mysqli_query($con, $er);
                                                                $user = mysqli_num_rows($a_user);
                                                                ?>
                                            <?= $user ?>
                                        </h1>
                                        <h6 class="text-muted">Total Seller</h6>
                                    </div>
                                    <!-- Column -->
                                    <div class="col text-end align-self-center">
                                        <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20"><i class="mdi mdi-account-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                 
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">

                                        <?php
                                        $query = "SELECT * FROM `tbl_property_sell` WHERE  `ba_id` = '" . $agentdata['agent_id'] . "' ";
                                        $pro = mysqli_query($con, $query);
                                        $property = mysqli_num_rows($pro);

                                        ?>
                                        <h1 class="font-light"><?= $property ?></h1>
                                        <h6 class="text-muted">All Property</h6>
                                    </div>
                                    <!-- Column -->
                                    <div class="col text-end align-self-center">
                                        <div data-label="30%" class="css-bar m-b-0 css-bar-danger css-bar-20"><i class="mdi mdi-briefcase-check"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <?php
                                        $listing = mysqli_query($con, "SELECT * FROM `tbl_buyer` WHERE `ba_id` = '" . $agentdata['agent_id'] . "'");
                                        $list = mysqli_num_rows($listing)
                                        ?>
                                        <h1 class="font-light"><?= $list ?></h1>
                                        <h6 class="text-muted">Total Buyer</h6>
                                    </div>
                                    <!-- Column -->
                                    <div class="col text-end align-self-center">
                                        <div data-label="60%" class="css-bar m-b-0 css-bar-info css-bar-60"><i class="mdi mdi-receipt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <a href="profile.php" style="color: black;">
                                            <h4 class="font-light">Update Profile</h4>
                                        </a>

                                    </div>

                                    <!-- Column -->
                                    <div class="col text-end align-self-center">
                                        <div data-label="40%" class="css-bar m-b-0 css-bar-warning css-bar-40"><i class="mdi mdi-star-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>


                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Property list</h4>
                            <div class="table-responsive m-t-40">
                                <table id="config-table" class="table display table-striped border no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $query .= " ORDER BY sell_id DESC ";

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

                                            <tr>
                                                <td><img scr="images/property/<?= $img['image']  ?>" style="height:40px"> <?= wordwrap($property['property_name'], 30, '<br>') ?>
                                                <td><?= date_format(date_create($property['create_date']), "d M Y") ?></td>

                                                <td><?= $type['type'] ?></td>

                                                <td>Rs.<?= $property['property_price'] ?>/-</td>

                                                <td><?= $row['state_name'] ?></td>
                                                <td><?= $city['city_name'] ?></td>
                                                <td> <?= (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Complete</span>' : (($property['status'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">pending</span>')); ?>
                                                </td>
                                                 <td> <a href="property-edit.php?id=<?= base64_encode($property['sell_id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="property-details.php?id=<?= base64_encode($property['sell_id'])  ?>" class="badge text-capitalize font-weight-normal fs-12 btn btn-success"> View Details</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>




    </div>
    </div>
    </div>


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>

    <script>
        $('#find').click(function() {

            findlead();

        });

        function findlead() {
            var status = $('#lead_status').val();

            //alert(status);

            $.ajax({
                url: "ajax/leads_list.php",
                method: "POST",
                data: {

                    status: status,


                },
                success: function(data) {
                    console.log(data);
                    $('#data').html(data);
                    //location.reload();

                }
            });
        }
        findlead();
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
</body>

</html>