<?php
include '../config.php';
$id = $_POST["id"];


?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Leads list</h4>
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                    <tr>
                      
                        <th>Id</th>
                        <th>Created</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>ID Proof</th>
                        <th>Status</th>
                        <th>Assign Realtor </th>
                                                <th></th>
                        <th>Add Property</th>
                        <th>Request Property</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $query = "SELECT * FROM `tbl_user` WHERE `user_status` = '$id'";
                    $pro = mysqli_query($con, $query);
                    while ($user = mysqli_fetch_array($pro)) {
                        $i = $i + 1;
                    ?>

                        <tr>
                           
                            <td><?= $i; ?></td>
                            <td><?= date_format(date_create($user['create_date']), "d M Y") ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['user_mobile'] ?></td>

                            <td> <a href="../images/user/<?= $user['user_idprood']  ?>" class="btn btn-info  btn-sm" target="_blank">view</a></td>
                            <form method="post">

                                <input type="hidden" name="u_id" id="u_id<?= $user['user_id'] ?>" value="<?= $user['user_id'] ?>">
                               
                                <td>
                                    <select name="lstatus" id="status<?= $user['user_id'] ?>" class="form-control">
                                        <option value="">Select Status</option>
                                        <?php
                                        $leads =  mysqli_query($con, "SELECT * FROM `tbl_status`");
                                        while ($lstatus = mysqli_fetch_array($leads)) {
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
                                        $i = 0;
                                        $err = "SELECT * FROM tbl_agent";
                                        $product = mysqli_query($con, $err);
                                        while ($ro = mysqli_fetch_array($product)) {
                                            $i = $i + 1;
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
                            </form>
                            <td><a href="property-add.php?id=<?= base64_encode($user['user_id']) ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </td>
                            <td><a href="property-request.php?id=<?= base64_encode($user['user_id']) ?>" class="btn btn-warning"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                            </td>
                            <td><a href="leads-edit.php?id=<?= base64_encode($user['user_id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

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

        // alert(id);


        var status = $('#status' + id).val();
        var ba = $('#broker' + id).val();
        var u_id = $('#u_id' + id).val();

        console.log(u_id);

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