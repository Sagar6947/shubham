<?php
include '../config.php';
$id = $_POST["id"];
?>
<div class="card">
    <div class="card-body">
      
        <div class="table-responsive ">
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
                    $query = "SELECT * FROM `tbl_property_sell` WHERE `status` = '$id' AND `ba_id` = '$agent' ORDER BY sell_id DESC";
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
                            <td><img scr="../images/property/<?= $img['image']  ?>" style="height:40px"> <?= wordwrap($property['property_name'], 30, '<br>') ?>
                            <td><?= date_format(date_create($property['create_date']), "d M Y") ?></td>

                            <td><?= $type['type'] ?></td>

                            <td>Rs.<?= $property['property_price'] ?>/-</td>

                            <td><?= $row['state_name'] ?></td>
                            <td><?= $city['city_name'] ?></td>
                            <td> <?= (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Complete</span>' : (($property['status'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">pending</span>')); ?>
                            </td>
                            <td> <a href="property-edit.php?id=<?= base64_encode($property['sell_id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="property-details.php?id=<?= base64_encode($property['sell_id'])  ?>" class="badge text-capitalize font-weight-normal fs-12 btn btn-success">
                                    View Details</a></td>
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