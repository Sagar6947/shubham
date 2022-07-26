<?php
include('config.php');
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
    <title>RE/MAX India: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
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
                        <h4 class="text-themecolor">All Buyer </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="buyer-add.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Buyer</a>

                        </div>
                    </div>
                </div>

               

                        <div class="row">
                            <?php
                            $i = 0;
                            $query = "SELECT * FROM `tbl_buyer` WHERE `ba_id` = '" . $agentdata['agent_id'] . "'ORDER BY buy_id DESC  ";
                            $pro = mysqli_query($con, $query);
                            while ($property = mysqli_fetch_array($pro)) {
                                $i = $i + 1;
                                $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
                                $type = mysqli_fetch_array($ptype);

                                $status = mysqli_query($con, "SELECT * FROM `tbl_buyerstatus` WHERE `s_id` = '" . $property['user_status'] . "' ");
                                $sta = mysqli_fetch_array($status);
                            ?>


                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="card card-body">
                                        <div class="row align-items-center">

                                            <div class="col-md- col-lg-12">
                                                <h3 class="box-title m-b-0">Name : <?= $property['user_name'] ?> </h3>
                                              

                                               <h6>Phone: <?= $property['user_mobile'] ?></h6>
                                                  <h6>Email: <?= $property['user_email'] ?></h6>
                                                  <h6 title="Phone">Budget: <?= $property['budget'] ?></h6>
                                                  <h6 title="Phone">Location : <?= $property['prefer_location'] ?></h6>
                                                
                                                <form method="get" action="property-match.php">
                                                    <input type="hidden" name="property_type" value="<?= $property['property_type'] ?>">
                                                    <input type="hidden" name="budget" value="<?= $property['budget'] ?>">
                                                    <input type="hidden" name="address" value="<?= $property['prefer_location'] ?>">
                                                    <input type="hidden" name="city" value="<?= $property['city'] ?>">
                                                    <button type="submit" class="btn btn-success">Match Property

                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php
                            }
                            ?>
                        </div>
                   
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>

</body>

</html>