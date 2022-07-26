<?php include 'config.php'; ?>
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

                        <li class="breadcrumb-item fs-12 letter-spacing-087 active">Services</li>
                    </ol>

                    <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">
                        Our Services
                    </h1>
                </nav>
            </div>

        </section>
        <!-- <section class="bg-single-image-03 pt-9 pb-10">
            <div class="container container-xxl">

                <div class="row">


                    <?php
                    $service = mysqli_query($con, "SELECT * FROM `tbl_service`");
                    while ($service_fetch = mysqli_fetch_array($service)) {
                    ?>

                        <div class="col-sm-4 box pt-2 pb-4" data-animate="fadeInUp">
                            <div class="card shadow-hover-xs-2 h-170">
                                <div class="card-header bg-transparent px-4 pt-4 pb-3 card-img">
                                    <h2 class="fs-18 lh-2 mb-0"><a href="#" class="text-dark hover-primary"><?= $service_fetch['title'] ?></a></h2>

                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="images/group-16.png" alt="Buy a new home" class="mb-6 mb-sm-0 mr-sm-6" />
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="mb-0"> <?= $service_fetch['description'] ?> </p>
                                        </div>
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
        </section> -->


        <section class="py-13 bg-gray-01">
            <div class="container">
                <h2 class="fs-30 lh-16 mb-10 text-dark font-weight-600 text-center"> Service We Provide </h2>
                <div class="row">
                    <?php
                    $service = mysqli_query($con, "SELECT * FROM `tbl_service` ");
                    while ($service_fetch = mysqli_fetch_array($service)) {
                    ?>
                        <div class="col-md-4 mb-6">
                            <div class="card border-0 shadow-xxs-3">
                                <div class="position-relative d-flex align-items-end card-img-top">
                                    <a href="" class="hover-shine">
                                        <img src="dashboard/images/service/<?= $service_fetch['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="card-body px-5 pt-3 pb-5">
                                    <h3 class="fs-18 text-heading lh-194 mb-1">
                                        <a href="" class="text-heading hover-primary"><?= $service_fetch['title'] ?></a>
                                    </h3>
                                    <p class="mb-3"><?= strip_tags($service_fetch['description']) ?></p>
                                    <a class="text-heading font-weight-500" href="tel:+919522598949">Learn more <i class="far fa-long-arrow-right text-primary ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>


    </main>
    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>
</body>

</html>