<?php
include 'config.php';

$id = base64_decode($_GET['id']);

$sql1 = "SELECT * FROM `tbl_property_sell` WHERE `sell_id` = '" . $id . "'";
$res_data1 = mysqli_query($con, $sql1);
$datarow = mysqli_fetch_array($res_data1);
$date1 = new DateTime("now");
$date2 = new DateTime($datarow['create_date']);
$interval = $date1->diff($date2);

$sql2 = "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $datarow['state'] . "'";
$res_data2 = mysqli_query($con, $sql2);
$datarow2 = mysqli_fetch_array($res_data2);

$sql3 = "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $datarow['city'] . "'";
$res_data3 = mysqli_query($con, $sql3);
$datarow3 = mysqli_fetch_array($res_data3);
$realtor = mysqli_query($con, "SELECT * FROM `tbl_agent` WHERE `agent_id` = '" . $datarow['ba_id'] . "'");
$age = mysqli_fetch_array($realtor);

$type = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $datarow['property_type'] . "' ");
$ptype = mysqli_fetch_array($type);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($_POST['review'])) {

    $name =  strip_tags($_POST['name']);
    $email =  strip_tags($_POST['email']);
    $message =  strip_tags($_POST['message']);

    $query = "INSERT INTO `tbl_testimonials`( `tst_name`, `tst_email`, `tst_content`) VALUES  ('" . $name . "'  , '" . $email . "', '" . $message . "')";
    $sal = mysqli_query($con, $query);

    if ($sal) {
        echo '<script>alert("Thank you very much for your feedback. We really appreciate it.")</script>';
    }
}

?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title><?= $datarow['property_name']; ?> | Shubham Enterprises (One stop solution)</title>
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

                        <li class="breadcrumb-item fs-12 letter-spacing-087 active">Property Details </li>
                    </ol>

                </nav>
            </div>

        </section>
        <div class="primary-content pt-8">
            <div class="container">
                <div class="row">
                    <article class="col-lg-8 pr-xl-4">
                        <section class="pb-7 border-bottom">
                            <div class="d-xl-flex justify-content-xl-between mb-1">
                                <ul class="list-inline d-sm-flex align-items-sm-center mb-0">
                                    <?php if ($datarow['featured'] == '1') {
                                    ?>
                                        <li class="list-inline-item badge badge-orange mr-2">Featured</li>
                                    <?php } ?>

                                    <li class="list-inline-item badge badge-primary mr-3">For <?= $datarow['transaction_type'] ?></li>
                                    <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i><?= $interval->days ?> days ago</li>
                                </ul>
                                <ul class="list-inline mb-0 mr-n2 my-4 my-xl-0">

                                    <li class="list-inline-item mr-2">

                                        <button type="button" class="btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content=' <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="http://twitter.com/share?url=<?= urlencode($actual_link) ?>&hashtags=remax" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-twitter"></i></a>
                          </li>
                          
                          <li class="list-inline-item ">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($actual_link) ?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-facebook-f"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=true&url=<?= urlencode($actual_link) ?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-linkedin"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="whatsapp://send?text=<?= urlencode($actual_link) ?>" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-whatsapp"></i></a>
                          </li>
                        </ul>
                        '>
                                            <i class="far fa-share-alt mr-2 fs-15 text-primary"></i>Share
                                        </button>
                                    </li>
                                    <li class="list-inline-item mr-2">
                                        <a href="JavaScript:Void(0);" onClick="window.print()" data-toggle="tooltip" data-original-title="Get Print" class="btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
                                            <i class="far fa-print mr-2 fs-15 text-primary"></i>Print
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-sm-flex justify-content-sm-between mb-6">
                                <div>
                                    <h2 class="fs-35 font-weight-600 lh-15 text-heading"> <?= $datarow['property_name']; ?><span class="h6 text-danger">(<?= $datarow['registration_no'] ?>)</span></h2>
                                    <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i><?= $datarow['address'] ?></p>
                                </div>
                                <div class="mt-2 text-lg-right">
                                    <p class="fs-22 text-heading font-weight-bold mb-0">Rs. <?= (($datarow['price_cr'] != '') ? $datarow['price_cr']  . $datarow['price_val'] : 'Rs' . $datarow['property_price'] . '/-') ?></p>
                                    <p class="mb-0"><?= $datarow['builtup_area'] ?>SqFt</p>

                                </div>
                            </div>
                            <div class="galleries position-relative">



                                <div class="slick-slider slider-for-01 arrow-haft-inner mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":true,"asNavFor": ".slider-nav-01"}'>

                                    <?php
                                    $i = 0;
                                    $img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE`pro_id` = '" . $datarow['sell_id'] . "'  ");
                                    while ($img_fetch = mysqli_fetch_array($img)) {
                                        $i = $i + 1;
                                    ?>
                                        <div class="box px-0">
                                            <div class="item item-size-3-2">
                                                <div class="card p-0 hover-change-image">
                                                    <a href="agent-dashboard/images/property/<?= $img_fetch['image'] ?>" class="card-img" data-gtf-mfp="true" data-gallery-id="04" style="background-image:url('agent-dashboard/images/property/<?= $img_fetch['image'] ?>'); width:100% " >
                                                     <img src="img2/copyright.png" alt="Shubham Property" class="fish">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="slick-slider slider-nav-01 mt-4 mx-n1 arrow-haft-inner" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-for-01","focusOnSelect": true,"responsive":[{"breakpoint": 768,"settings": {"slidesToShow": 4}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>

                                    <?php
                                    $i = 0;
                                    $img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE`pro_id` = '" . $datarow['sell_id'] . "'  ");
                                    while ($img_fetch = mysqli_fetch_array($img)) {
                                        $i = $i + 1;
                                    ?>
                                        <div class="box pb-6 px-0">
                                            <div class="bg-hover-white p-1 shadow-hover-xs-3 h-100 rounded-lg">
                                                <img src="agent-dashboard/images/property/<?= $img_fetch['image'] ?>" alt="Gallery 06" class="h-100 w-100 rounded-lg">
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>

                            <section class="pt-6 border-bottom">
                                <h4 class="fs-22 text-heading mb-6">Facts and Features</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Registrtion No.</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['registration_no'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal"> Property Type</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $ptype['type'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal"> Transaction Type</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['transaction_type'] ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Plot area</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['plot_area'] ?> sqft</p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Builtup area</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['builtup_area'] ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Built Year</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['built_year'] ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Mode</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['furnished'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Ownership</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['ownership'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Area</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['area'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Address</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['address'] ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">State</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow2['state_name'] ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">City</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow3['city_name'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-family fs-32 text-primary">
                                                    <use xlink:href="#icon-family"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Landmarks</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-heading"><?= $datarow['landmarks'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="pt-6 border-bottom pb-4">
                                <?php
                                if ($datarow['amenities'] != '') {
                                ?>


                                    <h4 class="fs-22 text-heading mb-4">Ameneties</h4>
                                    <ul class="list-unstyled mb-0 row no-gutters">
                                        <?php
                                        $features =  explode(',', $datarow['amenities']);
                                        foreach ($features as $fetch) {

                                            $amity = mysqli_query($con, "SELECT * FROM `tbl_amenities` WHERE `ami_id` = '$fetch' ");
                                            while ($feature = mysqli_fetch_array($amity)) {
                                        ?>
                                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i> <?= $feature['name']; ?></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>

                                <?php
                                }
                                ?>
                            </section>


                            <h4 class="fs-22 text-heading my-2">Description</h4>
                            <p class="mb-0 lh-214">
                                <?php echo $datarow['terms'] ?></p>
                        </section>
                        <section class="py-6 border-bottom">
                            <h4 class="fs-22 text-heading mb-6">Location</h4>
                            <div class="position-relative">
                                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $datarow['address'] . $datarow3['city_name'] . $datarow2['state_name']; ?>&output=embed"></iframe>

                            </div>
                        </section>


                    </article>
                    <aside class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 py-6 radius-5 box-shadow border-1">
                                    <div class="media mb-4">

                                        <?php if ($age != '') { ?>
                                            <img src="<?= (($age['agent_image'] == '') ? 'images/user.jpg'  : 'dashboard/images/agents/' . $age['agent_image'] . ' ') ?>" class="rounded-circle mr-2" alt="<?= $age['agent_name'] ?>" style="height: 80px;">
                                            <div class="media-body">
                                                <p class="fs-16 lh-1 text-dark mb-0 font-weight-500">
                                                    <?= $age['agent_name'] ?>
                                                </p>
                                                <p class="mb-0"><span class="text-primary d-inline-block mr-1"><i class="fal fa-envolope"></i></span><?= $age['agent_email'] ?>t</p>
                                                <p class="text-heading font-weight-500 mb-0">
                                                    <span class="text-primary d-inline-block mr-1"><i class="fal fa-phone"></i></span>
                                                    <?= $age['agent_phone'] ?>
                                                </p>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <form action="query-submit.php" method="POST">
                                        <!-- Agent Detail -->
                                        <div class="agent-widget">
                                            <h5 class="mb-3">Interested in Property </h5>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder="Your Name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder="Your Email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder="Your Phone" name="number">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control form-control-lg border-0" name="message" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary  btn-block">Send Message</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <section class="pt-6 pb-8">
            <div class="container">
                <h4 class="fs-22 text-heading mb-6">Similar Homes You May Like</h4>
                <div class="slick-slider" data-slick-options='{"slidesToShow": 3, "dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>

                    <?php
                    $i = 0;
                    $er = "SELECT * FROM `tbl_property_sell`  WHERE `featured`='1' ORDER BY `sell_id` DESC LIMIT 6";
                    $pro = mysqli_query($con, $er);
                    while ($user = mysqli_fetch_array($pro)) {
                        $i = $i + 1;
                        $date1 = new DateTime("now");
                        $date2 = new DateTime($user['create_date']);
                        $interval = $date1->diff($date2);

                        $imgs = mysqli_query($con, "SELECT * FROM `tbl_property_image` GROUP BY `pro_id`");
                        $cont = mysqli_num_rows($imgs);
                        $imgfetch = mysqli_fetch_array($imgs);
                    ?>
                        <div class="box">
                            <div class="card shadow-hover-2">
                                <div class="hover-change-image bg-hover-overlay  rounded-lg card-img-top">
                                    <img src="<?= (($cont > '0') ? 'agent-dashboard/images/property/' . $imgfetch['image'] : 'images/bg-home-03.jpg') ?>" alt="<?= $user['property_name'] ?>" class="respimg">
                                    <div class="card-img-overlay p-2 d-flex flex-column">
                                        <div>
                                            <span class="badge mr-2 badge-orange">Featured</span>
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
                                        <span class="fs-14 font-weight-500"><?= (($user['price_cr'] != '') ? $user['price_cr']  . $user['price_val'] : 'Rs' . $user['property_price'] . '/-') ?></span>
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
            </div>
        </section>



        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>
</body>

</html>