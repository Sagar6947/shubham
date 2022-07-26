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
                        <h4 class="card-title">Seller list</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <!--<ol class="breadcrumb justify-content-end">-->
                            <!--    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>-->
                            <!--    <li class="breadcrumb-item active">Seller</li>-->

                            <!--</ol>-->
                            <a href="seller-add.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Seller</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                       
                        <div class="table-responsive ">
                            <table id="myTable" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Create Date</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!--<th>Property</th>-->
                                        <th>Edit</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $query = "SELECT * FROM `tbl_seller` WHERE `agent_id` = '" . $agentdata['agent_id'] . "' ORDER BY user_id DESC ";
                                    $pro = mysqli_query($con, $query);
                                    while ($user = mysqli_fetch_array($pro)) {
                                        $i = $i + 1;
                                    ?>

                                        <tr class="odd parent">
                                            <td><?= $i; ?></td>
                                            <td><?= $user['user_name'] ?></td>
                                            <td><?= date_format(date_create($user['create_date']), "d M Y") ?></td>
                                            <td><?= $user['user_email'] ?></td>
                                            <td><?= $user['user_mobile'] ?></td>
                                            <!--<td><a href="property-add.php?id=<?= base64_encode($user['user_id']) ?>" class="btn btn-success">Add/View Property</a></td>-->
                                            <td> <a href="seller-edit.php?id=<?= base64_encode($user['user_id']) ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
        $('#find').click(function() {

            findlead();

        });

        function findlead() {
            var status = $('#lead_status').val();

            //alert(status);

            $.ajax({
                url: "ajax/Seller_list.php",
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