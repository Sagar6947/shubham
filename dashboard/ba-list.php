<?php include('config.php');
include('session.php');
$count = '';
$msg = '';
if (isset($_POST["submit"])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $id = $_POST['id'];
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        $tmpfile = $_FILES['image']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        move_uploaded_file($tmpfile, 'images/agents/' . $folder);
    } else {
        $folder = $_POST['img'];
    }

    $rt = "UPDATE `tbl_agent` SET `update_date`=CURRENT_TIMESTAMP,`agent_name`='$name',`agent_image`='$folder',`agent_email`='$email',`agent_phone`='$number' WHERE `agent_id` =" . $id;
    $result = mysqli_query($con, $rt);

    if ($result) {


        $msg = '<div class="alert alert-success" role="alert">
 Agent Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
 Something went wrong. Please try again later 
</div>';
    }
    echo '<script>window.location="ba-list.php"</script>';
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
                        <h4 class="text-themecolor">Realtor </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Realtor </li>

                            </ol>
                            <a href="ba-add.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Realtor </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Realtor list</h4>
                        <p><?= $msg ?></p>

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email/Password</th>

                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th></th>

                                        <th>Total Leads</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $er = "SELECT * FROM tbl_agent order by agent_id DESC ";
                                    $pro = mysqli_query($con, $er);
                                    while ($ro = mysqli_fetch_array($pro)) {
                                        $i = $i + 1;
                                        $users = "SELECT * FROM `tbl_seller` WHERE `agent_id` = '" . $ro['agent_id'] . "' ";
                                        $leads = mysqli_query($con, $users);
                                        $seller_fetch = mysqli_fetch_array($leads);
                                        $count = mysqli_num_rows($leads);

                                        // echo $seller_fetch['user_id'];

                                        $buy = "SELECT * FROM `tbl_buyer` WHERE `ba_id` = '" . $ro['agent_id'] . "' ";
                                        $buyer = mysqli_query($con, $buy);
                                        $buyer_fetch =   mysqli_fetch_array($buyer);
                                        $num = mysqli_num_rows($buyer);

                                    ?>

                                        <tr>
                                            <td><?= $i; ?></td>

                                            <td><img src="images/agents/<?= $ro['agent_image'] ?>" style="height:40px"><?= $ro['agent_name'] ?></td>
                                            <td><?= $ro['agent_email'] ?><br>
                                                Password : <?= $ro['agent_pass'] ?></td>

                                            <td><?= $ro['agent_phone'] ?></td>

                                            <form method="post">
                                                <td>
                                                    <!-- <input type="hidden" name="u_id"  value="<?= $ro['agent_id'] ?>">  -->
                                                    <select class="form-control" name="status" id="status<?= $ro['agent_id'] ?>">
                                                        <option value="1" <?= (($ro['agent_status'] == '1') ? 'selected' : '') ?>>Active</option>
                                                        <option value="0" <?= (($ro['agent_status'] == '0') ? 'selected' : '') ?>>In-Active</option>

                                                    </select>
                                                </td>

                                                <td> <select class="form-control" name="featured" id="featured<?= $ro['agent_id'] ?>">
                                                        <option value="1" <?= (($ro['featured'] == '1') ? 'selected' : '') ?>>Featured</option>
                                                        <option value="0" <?= (($ro['featured'] == '0') ? 'selected' : '') ?>>Normal</option>

                                                    </select>
                                                </td>
                                                <th><button type="button" id="upload" data-id="<?= $ro['agent_id']; ?>" class="btn btn-primary text-white upload">Save</button>
                                                </th>

                                                <td><a href="seller.php?count=<?=  base64_encode($ro['agent_id']) ?>" class="btn btn-warning"><?= $count ?> Seller </a>
                                                    <a href="buyer.php?count=<?=  base64_encode($ro['agent_id']) ?>" class="btn btn-info"><?= $num ?> Buyer </a>
                                                </td>
                                              
                                              
                                                <td><a href="ba-edit.php?id=<?= base64_encode($ro['agent_id']) ?>" class="btn btn-success">Profile</a>
                                                    <!-- <a href="delete.php?id=<?= $ro['agent_id']; ?>&&tag=agent"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

                                                </td>
                                            </form>
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
            var featured = $('#featured' + id).val();
            
            $.ajax({
                url: "agent-status.php",
                method: "POST",
                data: {

                    status: status,
                    featured: featured,
                    u_id: id

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