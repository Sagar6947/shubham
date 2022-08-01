<?php include 'includes/header-links.php';
include 'config.php';

$cat_id = $_GET['id'];;
?>

<body>

    <?php include 'includes/header.php' ?>

    <main id="content">
        <section style="background: url('img2/slider/6.jpg') top center; " class="bg-img-cover-center py-10  pb-md-17 bg-overlay banner-height">
            <div class="container position-relative z-index-2 text-center">
                <div class="mxw-751">

                    <?php
                    $er = "SELECT * FROM `tbl_category` WHERE cid = {$cat_id}";
                    $pro = mysqli_query($con, $er);
                    while ($ro = mysqli_fetch_assoc($pro)) {
                    ?>
                        <h1 class="text-white fs-30 fs-md-42 lh-15 font-weight-normal" data-animate="fadeInRight"><?php echo $ro['cat_name']; ?></h1>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="bg-patten-04 bg-gray-01 pb-13">
            <div class="container">
                <div class="card border-0 mt-n13 z-index-3 mb-12 box-shadow-new">
                    <div class="card-body p-5 px-lg-7 py-lg-7">
                        <!-- <p class="letter-spacing-263 text-uppercase text-primary  font-weight-500 text-center mb-0">
                            Sub</p>
                        <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-6">Categories</h2> -->

                        <div class="d-flex flex-wrap justify-content-center">

                            <?php
                            $erw = "SELECT * FROM `tbl_sub_category` WHERE category_id = {$cat_id}";
                            $prow = mysqli_query($con, $erw);
                            while ($row = mysqli_fetch_assoc($prow)) {
                            ?>
                                <a href="esolution-service.php?id=<?php echo $row['sid']; ?>" class="btn btn-lg  category-button mr-4 mb-4 hover-primary"><?php echo $row['subcat_name']; ?></a>
                            <?php } ?>

                        </div>

                        <div class="row pt-4">

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
                                        <p class="card-text font-weight-500 text-gray-light mb-2"> ₹600
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