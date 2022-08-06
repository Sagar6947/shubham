<?php include 'config.php';
include('session.php');

$query = mysqli_query($con, "SELECT * FROM `tbl_social` WHERE id = '1'");
$row = mysqli_fetch_array($query);

if (isset($_POST["submit"])) {

    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fb = $_POST['fb'];

    $insta = $_POST['insta'];
    $twitter = $_POST['twitter'];
    $youtube = $_POST['youtube'];
    $address = $_POST['address'];
    $insert = mysqli_query($con, "UPDATE `tbl_social` SET `phone`='$phone',`email`=' $email',`fb`='$fb',`insta`='$insta',`twitter`='$twitter',`youtube`='$youtube',`address`='$address' WHERE `id` = '1'");
    if ($insert) {
        $msg = '<div class="alert alert-success" role="alert">
           Contact Details Update Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
               Something went wrong. Please try again later 
           </div>';
    }

    echo '<script>window.location="home.php"</script>';
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
                                <a href="ba-list.php">
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
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="property-list.php">
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
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="seller.php">
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
                                                Total Sellers</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="buyer.php">
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
                        </a>
                    </div>



                </div>


                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Update Contact Details</h5>
                                <form method="post" enctype="multipart/form-data"> </br>
                                    <div class="row">


                                        <div class="form-group col-sm-6">
                                            <label class="">Contact</label>
                                            <input class="form-control" type="text" name="phone" value="<?= $row['phone'] ?>">
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class="">Email</label>
                                            <input class="form-control" type="text" name="email" value="<?= $row['email'] ?>">
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class="">Facebook link</label>
                                            <input class="form-control" type="text" name="fb" value="<?= $row['fb'] ?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="">Instagram link</label>
                                            <input class="form-control" type="text" name="insta" value="<?= $row['insta'] ?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="">Youtube link</label>
                                            <input class="form-control" type="text" name="youtube" value="<?= $row['youtube'] ?>">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="">Twitter</label>
                                            <input class="form-control" type="text" name="twitter" value="<?= $row['twitter'] ?>">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="">Address</label>
                                            <input class="form-control" type="text" name="address" value="<?= $row['address'] ?>">
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>


                        </form>

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