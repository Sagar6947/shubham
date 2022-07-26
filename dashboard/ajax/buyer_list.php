<?php
include '../config.php';
$query = "SELECT * FROM `tbl_buyer`";
$conditions = array();
if (($_POST['status'] != '') || ($_POST['agent'] != '')) {
    $status = $_POST['status'];
    $agent = $_POST['agent'];
    if ($_POST['status']) {
        $conditions[] = " `user_status` = '$status'";
    }
    if ($_POST['agent']) {
        $conditions[] = "   `ba_id` =  '$agent'";
    }

    if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }
}

?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Buyer list</h4>
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Assign Realtor </th>
                        <th></th>

                        <th>Transaction Type</th>
                        <th>Budget</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Prefer location</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;

                    $pro = mysqli_query($con, $query);
                    while ($user = mysqli_fetch_array($pro)) {
                        $i = $i + 1;

                        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $user['property_type'] . "' ");
                        $type = mysqli_fetch_array($ptype);

                        $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $user['state'] . "' ");
                        $row = mysqli_fetch_array($sal);

                        $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $user['city'] . "' ");
                        $city = mysqli_fetch_array($loc);
                        $status = mysqli_query($con, "SELECT * FROM `tbl_buyerstatus` WHERE `s_id` = '" . $user['user_status'] . "' ");
                        $sta = mysqli_fetch_array($status);

                    ?>

                        <tr>
                            <td><?= $i ?>
                            </td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= date_format(date_create($user['create_date']), "d M Y") ?></td>

                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['user_mobile'] ?></td>
                            <form method="post">
                                <div class="row">
                                    <input type="hidden" name="u_id" id="u_id<?= $user['buy_id'] ?>" value="<?= $user['buy_id'] ?>">

                                    <td>
                                        <select name="lstatus" id="status<?= $user['buy_id'] ?>" class="form-control">
                                            <option value="">Select Status</option>
                                            <?php
                                            $Buyer =  mysqli_query($con, "SELECT * FROM `tbl_buyerstatus`");
                                            while ($lstatus = mysqli_fetch_array($Buyer)) {
                                            ?>

                                                <option value="<?= $lstatus['s_id'] ?>" <?= (($lstatus['s_id'] == $user['user_status']) ? 'selected' : '') ?>>
                                                    <?= $lstatus['status'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </td>
                                    <td> <select name="ba" id="ba<?= $user['buy_id'] ?>" class="form-control">
                                            <option value="">Select Realtor </option>

                                            <?php

                                            $mus = "SELECT * FROM tbl_agent";
                                            $ba = mysqli_query($con, $mus);
                                            while ($ro = mysqli_fetch_array($ba)) {

                                            ?>
                                                <option value="<?= $ro['agent_id'] ?>" <?= (($ro['agent_id'] == $user['ba_id']) ? 'selected' : '') ?>> <?= $ro['agent_name'] ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="upload<?= $user['buy_id'] ?>" data-id="<?= $user['buy_id'] ?>" class="btn btn-primary text-white upload">Save</button>
                                    </td>
                                </div>
                            </form>

                            <td><?= $type['type'] ?></td>
                            <td>Rs.<?= $user['budget'] ?>/-</td>
                            <td><?= $row['state_name'] ?></td>
                            <td><?= $city['city_name'] ?></td>
                            <td><?= wordwrap($user['prefer_location'], 20, '<br>') ?></td>

                            <td><button class="btn btn-info"><?= $sta['status'] ?></button></td>
                            <td> <a href="buyer-edit.php?id=<?= base64_encode($user['buy_id']) ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

                            <td>

                                <form method="get" action="../property-match.php">
                                    <input type="hidden" name="property_type" value="<?= $user['property_type'] ?>">
                                    <input type="hidden" name="budget" value="<?= $user['budget'] ?>">
                                    <input type="hidden" name="address" value="<?= $user['prefer_location'] ?>">
                                    <input type="hidden" name="city" value="<?= $user['city'] ?>">
                                    <button type="submit" class="btn btn-success">Match Property

                                    </button>
                                </form>




                            </td>
                                            
                            <!--<td><a href="delete.php?id=<?= $ro['agent_id']; ?>&&tag=agent"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                            <!--</td>-->
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
        var ba = $('#ba' + id).val();
        var u_id = $('#u_id' + id).val();



        $.ajax({
            url: "ajax/buyer-status-update.php",
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