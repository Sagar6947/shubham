<?php
include '../config.php';
$query = "SELECT * FROM `tbl_property_sell`";
// $lowest_price = 0;
// $highest_price = 999999999;

$conditions = array();
if (($_POST['agent'] != '') || ($_POST['city'] != '')  || ($_POST['lowest_price'] != '') || ($_POST['highest_price'] != '')) {

    $agent = $_POST['agent'];
    $city = $_POST['city'];
    $minimum = $_POST['lowest_price'];
    $maximum = $_POST['highest_price'];

    if ($_POST['agent']) {
        $conditions[] = "   `ba_id` = '$agent'";
    }
    if ($_POST['city']) {
        $conditions[] = "   `area` =  '$city'";
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
        $query .= " WHERE " . implode(' AND ', $conditions);
    }
}
?>

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
                        <!--<th>State</th>-->

                        <th>Approval</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Popular</th>

                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $query .= " ORDER BY sell_id DESC ";
                    // echo $query;


                    $pro = mysqli_query($con, $query);
                    while ($property = mysqli_fetch_array($pro)) {
                        $i = $i + 1;

                        $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $property['sell_id'] . "' GROUP BY `pro_id`");
                        $img = mysqli_fetch_array($list_img);

                        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
                        $type = mysqli_fetch_array($ptype);


                        // $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $property['state'] . "' ");
                        // $row = mysqli_fetch_array($sal);

                        // $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $property['city'] . "' ");
                        // $city = mysqli_fetch_array($loc);

                    ?>
                        <tr>
                            <td><img scr="images/property/<?= $img['image']  ?>" style="height:40px"> <?= wordwrap($property['property_name'], 30, '<br>') ?></td>
                            <td><?= date_format(date_create($property['create_date']), "d M Y") ?></td>

                            <td><?= $type['type'] ?></td>

                            <td>Rs.<?= $property['property_price'] ?>/-</td>

                            <!--<td><?= $row['state_name'] ?></td>-->
                            <!--<td><?= $city['city_name'] ?></td>-->

                            <form method="post">
                                <div class="row">
                                    <td>
                                        <div class="col-sm-12">


                                            <p data-bs-toggle="modal" data-bs-target=".myModal<?= $property['sell_id'] ?>" class="model_img img-responsive">
                                                <?= (($property['approval'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Approved</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-danger">Not Approved</span>'); ?>
                                            </p>


                                        </div>
                                    </td>
                                    <td>
                                        <p data-bs-toggle="modal" data-bs-target=".myModal<?= $property['sell_id'] ?>" class="model_img img-responsive">
                                            <?= (($property['status'] == '2') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">On-Process</span>' : (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Sold</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>')); ?>
                                        </p>
                                    </td>

                                    <td>

                                        <p data-bs-toggle="modal" data-bs-target=".myModal<?= $property['sell_id'] ?>" class="model_img img-responsive">
                                            <?= (($property['featured'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Featured</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-danger">Not Featured</span>'); ?>
                                        </p>
                                    </td>

                                    <td>

                                        <p data-bs-toggle="modal" data-bs-target=".myModal<?= $property['sell_id'] ?>" class="model_img img-responsive">
                                            <?= (($property['popular'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Popular</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-dark">Not Popular</span>'); ?>
                                        </p>
                                    </td>


                                    <div id="" class="modal myModal<?= $property['sell_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <div class="row">

                                                            <input type="hidden" value="<?= $property['sell_id'] ?>" name="sid">

                                                            <div class="col-sm-12">
                                                                <label><b>Update Status-</label>
                                                                <br>
                                                                <select name="status" id="status<?= $property['sell_id'] ?>" class="form-control">
                                                                    <option value="">Select Status</option>
                                                                    <?php
                                                                    $leads =  mysqli_query($con, "SELECT * FROM `tbl_status`");
                                                                    while ($lstatus = mysqli_fetch_array($leads)) {
                                                                    ?>

                                                                        <option value="<?= $lstatus['s_id'] ?>" <?= (($lstatus['s_id'] == $property['status']) ? 'selected' : '') ?>><?= $lstatus['status'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <br>
                                                                <label><b>Update Approval - </b></label>
                                                                <br>
                                                                <input type="radio" value="1" <?= (($property['approval'] == '1') ? 'checked' : '') ?> name="approval<?= $property['sell_id'] ?>" class="approval<?= $property['sell_id'] ?>">Approved
                                                                <input type="radio" value="0" <?= (($property['approval'] == '0') ? 'checked' : '') ?> name="approval<?= $property['sell_id'] ?>" class="approval<?= $property['sell_id'] ?>">Not Approved


                                                            </div>

                                                            <div class="col-sm-12">
                                                                <br>
                                                                <label><b>Update Featured Property - </b></label>
                                                                <br>

                                                                <input type="radio" value="1" <?= (($property['featured'] == '1') ? 'checked' : '') ?> name="featured<?= $property['sell_id'] ?>" class="featured<?= $property['sell_id'] ?>">Featured
                                                                <input type="radio" value="0" <?= (($property['featured'] == '0') ? 'checked' : '') ?> name="featured<?= $property['sell_id'] ?>" class="featured<?= $property['sell_id'] ?>">Not Featured
                                                            </div>


                                                            <div class="col-sm-12">
                                                                <br>
                                                                <label><b>Update Popular Property - </b></label>
                                                                <br>

                                                                <input type="radio" value="1" <?= (($property['popular'] == '1') ? 'checked' : '') ?> name="popular<?= $property['sell_id'] ?>" class="popular<?= $property['sell_id'] ?>">popular
                                                                <input type="radio" value="0" <?= (($property['popular'] == '0') ? 'checked' : '') ?> name="popular<?= $property['sell_id'] ?>" class="popular<?= $property['sell_id'] ?>">Not Popular
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" id="save<?= $property['sell_id'] ?>" data-id="<?= $property['sell_id'] ?>" class="btn btn-primary text-white upload">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                </div>


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