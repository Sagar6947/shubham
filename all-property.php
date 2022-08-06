<?php
include 'config.php';

$query = "SELECT * FROM tbl_property_sell  WHERE `approval` = '1'  ";
$conditions = array();

if ((isset($_POST['property_type']) != '') ||  (isset($_POST['minimum']) != '') || (isset($_POST['maximum']) != '') || (isset($_POST['area']) != '') ||  (isset($_POST['mode']) != '') || (isset($_POST['transaction_type']) != '')) {

    $property_type = $_POST['property_type'];

    $minimum = $_POST['lowest_price'];
    $maximum = $_POST['highest_price'];
    $mode = $_POST['mode'];
    $area = $_POST['area'];

    $transaction_type = $_POST['transaction_type'];


    if (isset($_POST['property_type']) != '') {
        $conditions[] = " `property_type` = '$property_type'";
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
    if (isset($_POST['area']) != '') {
        $conditions[] = "  `area` =  '$area'";
    }

    if (isset($_POST['mode']) != '') {
        $conditions[] = "  `furnished` =  '$mode'";
    }
    if (isset($_POST['transaction_type']) != '') {
        $conditions[] = "  `transaction_type` =  '$transaction_type'";
    }
    if (count($conditions) > 0) {
        $query .= 'AND';
        $query .= implode(' OR ', $conditions);
    }

    // echo  $query;
}

?>



<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Gallery | Shubham Enterprises (One stop solution)</title>
<?php include('head.php'); ?>

<body>
    <?php include('menu.php') ?>
    <main id="content">
        <section class="section-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-lg-0 pb-3">
                        <li class="breadcrumb-item fs-12 letter-spacing-087">
                            <a href="index.php">Home</a>
                        </li>

                        <li class="breadcrumb-item fs-12 letter-spacing-087 active">Property List</li>
                    </ol>

                    <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">
                        Available property List
                    </h1>
                </nav>
            </div>

        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mb-9 mb-lg-0">
                        <div class="row align-items-sm-center mb-6">
                            <div class="col-md-6">
                                <!-- <h2 class="fs-15 text-dark mb-0">
                                    We found <span class="text-primary">45</span> properties
                                    available for you
                                </h2> -->
                            </div>
                        </div>

                        <div class="row">
                            <?php
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 6;
                            $offset = ($pageno - 1) * $no_of_records_per_page;

                            $total_pages_sql = "SELECT COUNT(*) FROM tbl_property_sell";
                            $result = mysqli_query($con, $total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $query .= " ORDER BY sell_id DESC LIMIT $offset, $no_of_records_per_page  ";
                            $res_data = mysqli_query($con, $query);
                            while ($user = mysqli_fetch_array($res_data)) {

                                $date1 = new DateTime("now");
                                $date2 = new DateTime($user['create_date']);
                                $interval = $date1->diff($date2);
                                $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $user['sell_id'] . "' GROUP BY `pro_id`");

                                $count = mysqli_num_rows($list_img);
                                $img_fetch = mysqli_fetch_array($list_img);
                                $loc = mysqli_query($con, "SELECT * FROM `tbl_areas` WHERE `area_id` = '" . $user['city'] . "' ");
                                $city = mysqli_fetch_array($loc);


                            ?>


                                <div class="col-lg-4 col-sm-4 mb-4 " data-animate="zoomIn">
                                    <div class="card shadow-hover-1 border-1">
                                        <div class="hover-change-image bg-hover-overlay  rounded-lg card-img-top">
                                            <img src="<?= (($count > '0') ? 'agent-dashboard/images/property/' . $img_fetch['image'] : 'images/bg-home-03.jpg') ?>" alt="<?= $user['property_name'] ?>" class="respimg" />
                                            <div class="card-img-overlay p-2 d-flex flex-column">
                                                <div>
                                                    <?= (($user['featured'] == '1') ? ' <span class="badge mr-2 badge-orange">Featured </span>' : '') ?>
                                                    <span class="badge mr-2 badge-indigo">For <?= $user['transaction_type'] ?></span>
                                                </div>
                                                <ul class="list-inline mb-0 mt-auto hover-image">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="days Ago">
                                                        <a href="property-detail.php?id=<?= base64_encode($user['sell_id']) ?>" class="text-white hover-primary">
                                                            <i class="far fa-calendar-alt"></i><span class="pl-1"><?= $interval->days ?> days ago</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3">
                                            <h2 class="card-title fs-16 lh-2 mb-0">
                                                <a href="property-detail.php?id=<?= base64_encode($user['sell_id']) ?>" class="text-dark hover-primary"><?= substr($user['property_name'], 0, 40); ?>..</a>
                                            </h2>
                                            <p class="card-text font-weight-500 text-gray-light mb-2">
                                                <i class="far fa-map-marker-alt">
                                                    <?= substr($user['address'], 0, 40); ?>..

                                                </i>
                                            </p>
                                        </div>
                                        <div class="card-footer bg-transparent d-flex justify-content-between align-items-center  py-3  ">
                                            <p class="fs-17 font-weight-bold text-heading mb-0">
                                                <span class="fs-14 font-weight-500 property_price">₹ <?= (($user['price_cr'] != '') ? $user['price_cr']  . $user['price_val'] : 'Rs' . $user['property_price'] . '/-') ?> </span>
                                            </p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="property-detail.php?id=<?= base64_encode($user['sell_id']) ?>" class="btn btn-primary  btn-block">Property Detail</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <nav class="pt-4">
                            <ul class="pagination rounded-active justify-content-center mb-0">


                                <li class="page-item <?php if ($pageno <= 1) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class='page-link' href="<?php if ($pageno <= 1) {
                                                                    echo '#';
                                                                } else {
                                                                    echo "?pageno=" . ($pageno - 1);
                                                                } ?>">
                                        <i class="far fa-angle-double-left"></i> </a>
                                </li>


                                <?php

                                if ($total_pages <= 10) {
                                    for ($counter = 1; $counter <= $total_pages; $counter++) {
                                        if ($counter == $pageno) {
                                            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                        }
                                    }
                                }

                                ?>

                                <li class="page-item <?php if ($pageno >= $total_pages) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                                    echo '#';
                                                                } else {
                                                                    echo "?pageno=" . ($pageno + 1);
                                                                } ?>"> >> </a>
                                </li>

                            </ul>
                        </nav>
                    </div>


                    <div class="col-lg-3 primary-sidebar sidebar-sticky" id="sidebar">
                        <?php include 'search-form.php'; ?>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>
</body>

</html>