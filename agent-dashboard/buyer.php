<?php
include('config.php');
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
    <title>RE/MAX India: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
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
                        <h4 class="text-themecolor">All Buyer </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="buyer-add.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Buyer</a>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                       
                        <div class="table-responsive ">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>

                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Transaction Type</th>
                                        <th>Budget</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Prefer location</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th></th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $query = "SELECT * FROM `tbl_buyer` WHERE `ba_id` = '" . $agentdata['agent_id'] . "'ORDER BY buy_id DESC  ";
                                    $pro = mysqli_query($con, $query);
                                    while ($property = mysqli_fetch_array($pro)) {
                                        $i = $i + 1;
                                        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
                                        $type = mysqli_fetch_array($ptype);

                                        $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $property['state'] . "' ");
                                        $row = mysqli_fetch_array($sal);

                                        $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $property['city'] . "' ");
                                        $city = mysqli_fetch_array($loc);
                                        
                                        $status = mysqli_query($con, "SELECT * FROM `tbl_buyerstatus` WHERE `s_id` = '" . $property['user_status'] . "' ");
                                        $sta = mysqli_fetch_array($status);
                                    ?>

                                        <tr>
                                            <td><?= $property['user_name'] ?></td>
                                            <td><?= date_format(date_create($property['create_date']), "d M Y") ?></td>
                                            <td><?= $property['user_email'] ?></td>
                                            <td><?= $property['user_mobile'] ?></td>
                                            <td><?= $type['type'] ?></td>
                                            <td>Rs.<?= $property['budget'] ?>/-</td>
                                            <td><?= $row['state_name'] ?></td>
                                            <td><?= $city['city_name'] ?></td>
                                            <td><?= wordwrap($property['prefer_location'], 20, '<br>') ?></td>
                                            
                                            <td><button class="btn btn-info"><?= $sta['status'] ?></button></td>
                                            <td> <a href="buyer-edit.php?id=<?= base64_encode($property['buy_id']) ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

                                            <td>

                                                <form method="get" action="property-match.php">
                                                    <input type="hidden" name="property_type" value="<?= $property['property_type'] ?>">
                                                    <input type="hidden" name="budget" value="<?= $property['budget'] ?>">
                                                    <input type="hidden" name="address" value="<?= $property['prefer_location'] ?>">
                                                     <input type="hidden" name="city" value="<?= $property['city'] ?>">
                                                    <button type="submit" class="btn btn-success">Match Property

                                                    </button>
                                                </form>




                                            </td>
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