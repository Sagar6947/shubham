<?php
include '../config.php';
$query = "SELECT * FROM `tbl_seller`";


$conditions = array();
if (($_POST['status'] != '') || ($_POST['agent'] != '')) {
    $status = $_POST['status'];
    $agent = $_POST['agent'];


    if ($_POST['status']) {
        $conditions[] = "   `user_status` = '$status'";
    }
    if ($_POST['agent']) {
        $conditions[] = "   `agent_id` =  '$agent'";
    }
    if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }
}
// echo $query;


?>


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Seller list</h4>
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Created</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Assign Realtor </th>
                        <th></th>
                        <th>Profile</th>
                        <th>Property</th>
                        <!--<th>Delete</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;

                    $pro = mysqli_query($con, $query);
                    while ($user = mysqli_fetch_array($pro)) {
                        $i = $i + 1;
                    ?>

                        <tr>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= date_format(date_create($user['create_date']), "d M Y") ?></td>

                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['user_mobile'] ?></td>

                            <form method="post">
                                <div class="row">
                                    <input type="hidden" name="u_id" id="u_id<?= $user['user_id'] ?>" value="<?= $user['user_id'] ?>">

                                    <td>
                                        <select name="lstatus" id="status<?= $user['user_id'] ?>" class="form-control">
                                            <option value="">Select Status</option>
                                            <?php
                                            $Seller =  mysqli_query($con, "SELECT * FROM `tbl_status`");
                                            while ($lstatus = mysqli_fetch_array($Seller)) {
                                            ?>

                                                <option value="<?= $lstatus['s_id'] ?>" <?= (($lstatus['s_id'] == $user['user_status']) ? 'selected' : '') ?>><?= $lstatus['status'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </td>
                                    <td> <select name="broker" id="broker<?= $user['user_id'] ?>" class="form-control">
                                            <option value="">Select Realtor </option>

                                            <?php

                                            $err = "SELECT * FROM tbl_agent";
                                            $product = mysqli_query($con, $err);
                                            while ($ro = mysqli_fetch_array($product)) {

                                            ?>
                                                <option value="<?= $ro['agent_id'] ?>" <?= (($ro['agent_id'] == $user['agent_id']) ? 'selected' : '') ?>> <?= $ro['agent_name'] ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="upload<?= $user['user_id'] ?>" data-id="<?= $user['user_id'] ?>" class="btn btn-primary text-white upload">Save</button>
                                    </td>
                                </div>
                            </form>
                            <td><a href="Seller-edit.php?id=<?= base64_encode($user['user_id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>

                            <td><a href="property-add.php?id=<?= base64_encode($user['user_id']) ?>" class="btn btn-success">Add/view Property</a>
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
<script>
    $('.upload').click(function() {
        var id = $(this).data('id');

        var status = $('#status' + id).val();
        var ba = $('#broker' + id).val();
        var u_id = $('#u_id' + id).val();

        // console.log(u_id);

        $.ajax({
            url: "ajax/leads-status-update.php",
            method: "POST",
            data: {

                status: status,
                ba: ba,
                u_id: u_id

            },
            success: function(data) {
                location.reload();

            }
        });
    });


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