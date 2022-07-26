<?php
include '../config.php';
$query = "SELECT * FROM `tbl_seller`";

if (($_POST['agent'] != '')) {

    $agent = $_POST['agent'];

    $query .= "  WHERE  ";

    if ($_POST['agent']) {
        $query .= "   `agent_id` =  '$agent'";
    }
}
//echo $query;


?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <br>
                        <h5><span style="color:green">Note : For Seller transfer please check the seller checkbox then select realtor</span></h5>
                        <div class="col-md-4">
                            <label>Transfer Seller To </label>
                            <select name="associative" id="asso" class="form-control">
                                <option selected="true" disabled="disabled">Select Realtor </option>

                                <?php
                                $i = 0;
                                $agent = "SELECT * FROM tbl_agent";
                                $ba = mysqli_query($con, $agent);
                                while ($ass = mysqli_fetch_array($ba)) {
                                    $i = $i + 1;
                                ?>
                                    <option value="<?= $ass['agent_id'] ?>"> <?= $ass['agent_name'] ?></option>
                                <?php
                                }
                                ?>
                                </optgroup>
                            </select>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Seller list</h4>
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Realtor </th>

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
                            <td><input type="checkbox" class="lead_checkbox" data-emp-id="<?= $user['user_id'] ?>">
                            </td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= date_format(date_create($user['create_date']), "d M Y") ?></td>

                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['user_mobile'] ?></td>
                            <td>
                                <?php
                                $err = "SELECT * FROM tbl_agent WHERE agent_id = '" . $user['agent_id'] . "' ";
                                $product = mysqli_query($con, $err);
                                while ($ro = mysqli_fetch_array($product)) {

                                ?>
                                    <?= $ro['agent_name'] ?>
                                <?php
                                }
                                ?>


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
    $(document).on('click', '#select_all', function() {
        $(".lead_checkbox").prop("checked", this.checked);
    });
    $(document).on('click', '.lead_checkbox', function() {
        if ($('.lead_checkbox:checked').length == $('.lead_checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }

    });


    $('#asso').on('change', function() {
        var as_id = $('#asso').val();
        // alert(as_id);
        var employee = [];
        $(".lead_checkbox:checked").each(function() {
            employee.push($(this).data('emp-id'));
        });
        if (employee.length <= 0) {
            swal("Please select records.");
        } else {
            var rd = confirm("Are you Sure you want to Shift Seller");
            if (rd) {
                $.ajax({
                    type: "POST",
                    url: "ajax/sift_seller.php",
                    cache: false,

                    data: {
                        seller_id: employee,
                        as_id: as_id
                    },
                    success: function(data) {
                        console.log(data);
                        alert("Seller are shifted");
                        location.reload();
                    }
                });

            }
        }

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