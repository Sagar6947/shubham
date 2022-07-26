<?php include 'includes/header-links.php';
include 'config.php';

$cat_id = $_GET['id'];;
?>

<body>

    <?php include 'includes/header.php' ?>

    <main id="content">
        <section style="background: url('img/slider/6.jpg') top center; " class="bg-img-cover-center py-10  pb-md-17 bg-overlay banner-height">
            <div class="container position-relative z-index-2 text-center">
                <div class="mxw-751">

                    <?php
                    $er = "SELECT * FROM `tbl_sub_category` WHERE sid = {$cat_id}";
                    $pro = mysqli_query($con, $er);
                    while ($ro = mysqli_fetch_assoc($pro)) {
                    ?>
                        <h1 class="text-white fs-30 fs-md-42 lh-15 font-weight-normal" data-animate="fadeInRight"><?php echo $ro['subcat_name']; ?></h1>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="bg-patten-07 bg-gray-01 pb-13" style="padding-top: 50px;">
            <div class="container">
                <p class="text-primary font-weight-500 letter-spacing-263 text-center text-uppercase mb-0">Our
                </p>
                <h2 class="text-dark text-center mb-8">Services</h2>
                <div class="row">

                    <?php
                    // $serv = "SELECT * FROM `new_service` WHERE nsid = {$cat_id}";
                    $sql = "SELECT new_service.nsid, new_service.service_name, new_service.image, new_service.price,
                new_service.description FROM new_service
                LEFT JOIN tbl_category ON new_service.cat_id = tbl_category.cid
                where subcat_id = {$cat_id}
                ORDER BY new_service.nsid DESC";
                    $result = mysqli_query($con, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    
                            <div class="col-lg-4 col-sm-6 mb-6" data-animate="zoomIn">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top service-image">
                                        <img src="dashboard/images/newservice/<?php echo $row['image']; ?>" alt="Kitchen Cleaning">
                                    </div>
                                    <div class="card-body pt-3 text-center">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="service-single-page.php?sid=<?php echo $row['nsid']; ?>" class="text-dark hover-primary"><?php echo $row['service_name']; ?></a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2"> <?php echo mb_strimwidth($row['description'], 0, 40, "...") ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/footer-links.php' ?>

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#" class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center" title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
</body>


</html>