<?php include('config.php');
include('session.php');

if(isset($_GET['count']))
{

    $ba = base64_decode($_GET['count']);

}else{
    $ba = '0';
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
                        <h4 class="text-themecolor">Seller List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Seller</li>

                            </ol>
                            <a href="seller-add.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Seller</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <lable>Filter By</lable>
                                        <div class="col-md-3">
                                            <select name="status" id="lead_status" class="form-control">
                                                <option value="">Seller Status</option>
                                                <?php
                                                $sta =  mysqli_query($con, "SELECT * FROM `tbl_status`");
                                                while ($status = mysqli_fetch_array($sta)) {
                                                ?>

                                                    <option value="<?= $status['s_id'] ?>"><?= $status['status'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>


                                        </div>
                                        <div class="col-md-3">
                                            <select name="ba" id="ba" class="form-control">
                                                <option value="">Select Realtor </option>

                                                <?php
                                                $i = 0;
                                                $agents = "SELECT * FROM tbl_agent";
                                                $associate = mysqli_query($con, $agents);
                                                while ($as = mysqli_fetch_array($associate)) {
                                                    $i = $i + 1;
                                                ?>
                                                    <option value="<?= $as['agent_id'] ?>" <?= (($as['agent_id'] == $ba)? 'selected':'') ?>> <?= $as['agent_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-md-3 ">
                                            <button type="button" id="find" class="btn btn-primary text-white">Submit</button>
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="data"></div>


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
     
         
        // var ba = <?= $ba ?>;

        function findlead() {
            var status = $('#lead_status').val();
            var ba = $('#ba').val();

            $.ajax({
                url: "ajax/seller_list.php",
                method: "POST",
                data: {

                    status: status,
                    agent: ba

                },
                success: function(data) {
                    // console.log(data);
                    $('#data').html(data);
                    //location.reload();

                }
            });
        }
        findlead();
    </script>



</body>

</html>