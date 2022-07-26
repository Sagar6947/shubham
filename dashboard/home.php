<?php include 'config.php';
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
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>


        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <?php
                                        $query = "SELECT * FROM `tbl_agent` ";
                                        $ba = mysqli_query($con, $query);
                                        $realtor = mysqli_num_rows($ba);

                                        ?>

                                        <h3 class="m-b-0"><?= $realtor  ?></h3>
                                        <h5 class="text-muted m-b-0">All Realtor</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <?php
                                        $query = "SELECT * FROM `tbl_property_sell` WHERE `status` = '1' ";
                                        $pro = mysqli_query($con, $query);
                                        $property = mysqli_num_rows($pro);

                                        ?>

                                        <h3 class="m-b-0"><?= $property ?></h3>
                                        <h5 class="text-muted m-b-0">Total Active Properties</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">

                                        <?php
                                        $er = "SELECT * FROM `tbl_seller`";
                                        $a_user = mysqli_query($con, $er);
                                        $user = mysqli_num_rows($a_user);


                                        ?>
                                        <h3 class="m-b-0"><?= $user ?></h3>
                                        <h5 class="text-muted m-b-0">
                                            Total Leads</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <?php
                                        $listing = mysqli_query($con, "SELECT * FROM `tbl_buyer` ");
                                        $list = mysqli_num_rows($listing)
                                        ?>
                                        <h3 class="m-b-0"><?= $list ?></h3>
                                        <h5 class="text-muted m-b-0">Property Request</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0"> Trending Locations</h5>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location</th>
                                                <th>Leads</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $er = "SELECT  COUNT(`city`) as `count`,`city`  FROM `tbl_property_sell` GROUP BY city";
                                            // echo $er;
                                            $pro = mysqli_query($con, $er);
                                            while ($user = mysqli_fetch_assoc($pro)) {
                                                $er1 = "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $user['city'] . "' ";
                                                $pro1 = mysqli_query($con, $er1);
                                                $user1 = mysqli_fetch_assoc($pro1);
                                                // echo $er1;
                                            ?>
                                                <tr>
                                                    <td>#</td>
                                                    <td><? echo $user1['city_name'] ?></td>
                                                    <td><? echo $user['count'] ?> Properties</td>

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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Shubham Property Leads</h5>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location</th>
                                                <th>Leads</th>
                                            </tr>
                                        </thead>

                                        <tbody>


                                            <?php
                                            $ba = "SELECT * FROM `tbl_agent`";
                                            $fetch = mysqli_query($con, $ba);
                                            while ($realtor = mysqli_fetch_array($fetch)) {
                                                $er = "SELECT * FROM `tbl_seller` WHERE `agent_id` = '" . $realtor['agent_id'] . "' ";
                                                $a_user = mysqli_query($con, $er);
                                                $user = mysqli_num_rows($a_user);
                                            ?>
                                                <tr>
                                                    <td>#</td>
                                                    <td><?= $realtor['agent_name'] ?></td>
                                                    <td><?= $user ?></td>
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
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
</body>

</html>