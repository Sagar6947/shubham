<?php include('config.php');
// include('session.php');
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
    <title>SHUBHAM ENTERPRISES (One Step Solution)</title>
    <?php include 'header-link.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Sub Category</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>

                            </ol>
                            <a href="add-sub-category.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Sub Category</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sub category</h4>

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>status</th>
                                        

                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $er = "SELECT * FROM `tbl_sub_category`";
                                    $pro = mysqli_query($con, $er);
                                    while ($ro = mysqli_fetch_assoc($pro)) {
                                        $i = $i + 1;
                                    ?>

                                        <tr>
                                            <td><?= $i; ?></td>

                                            <td><?= $ro['subcat_name'] ?></td>

                                            <form method="post">
                                                <td>
                                                   
                                                    <select class="form-control" name="status" id="status<?= $ro['cid'] ?>">
                                                        <option value="0" <?= (($ro['status'] == '0') ? 'selected' : '') ?>>Active</option>
                                                        <option value="1" <?= (($ro['status'] == '1') ? 'selected' : '') ?>>In-Active</option>
                                                    </select>
                                                </td>
                                            </form>


                                            <td><a href="edit-sub-category.php?id=<?= base64_encode($ro['sid']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            </td>
                                            <td><a href="delete.php?id=<?= $ro['sid']; ?>&&tag=sub_category"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!-- end - This is for export functionality only -->

    <script>
        $('.upload').click(function() {
            var id = $(this).data('id');
            
            var status = $('#status' + id).val();
            
            $.ajax({
                url: "sub-category-status.php",
                method: "POST",
                data: {

                    status: status,
                    u_id: idf

                },
                success: function(data) {
                    
                    alert("Your changes have been saved")
                    location.reload();

                }
            });
        });
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