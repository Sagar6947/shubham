<?php include('config.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Welcome to Shubham Enterprises</title>
    <?php include 'includes/header-links.php'; ?>

</head>


<body>

    <?php include 'includes/header.php'; ?>

    <main id="content">
        <section style="background-image: url('images/bg-about-us.jpg')" class="bg-img-cover-center py-5  bg-overlay">
            <div class="container position-relative z-index-2 text-center">

                <div class="mxw-751">
                    <h1 class="
                text-white
                fs-25 fs-md-30
                lh-15
                font-weight-normal
                mt-4
                mb-8
              " data-animate="fadeInRight">
                        Home Service On Demand

                    </h1>

                    <form class="d-flex">
                        <div class="position-relative w-100">
                            <i class="far fa-search text-dark fs-18 position-absolute pl-4 pos-fixed-left-center"></i>
                            <input type="text" class="rounded-bottom-right-lg w-100 pl-8 py-4 bg-white border-0 fs-13 font-weight-500 text-gray-light rounded-0 lh-17" placeholder="Search For Service" name="search" list="browsers">

                            <datalist id="browsers">
                                <?php
                                $i = 0;
                                $er = "SELECT * FROM `tbl_category`";
                                $pro = mysqli_query($con, $er);
                                while ($ro = mysqli_fetch_assoc($pro)) {
                                    $i = $i + 1;
                                ?>
                                    <option value="<?= $ro['cat_name'] ?>">
                                    <?php
                                }
                                    ?>
                            </datalist>
                        </div>
                        <button type="submit" class="btn btn-primary fs-16 font-weight-600 rounded-left-0 rounded-lg">
                            Search
                        </button>
                    </form>
                    <p class="text-white">Bathroom Cleaning , Carpenter , White Wash / Wall Painting ETC </p>
                </div>
            </div>
        </section>


        <section class="bg-gray-02 pt-9 pb-lg-8" style="background: url(img2/bg2.webp);">
            <div class="container">
                <h2 class="text-heading text-center">E-Solutions For Homes</h2>
                <span class="heading-divider mx-auto"></span>
                <div class="row mt-7 justify-content-center">

                    <?php
                    $i = 0;
                    $er = "SELECT * FROM `tbl_category`";
                    $pro = mysqli_query($con, $er);
                    while ($ro = mysqli_fetch_assoc($pro)) {
                        $i = $i + 1;
                    ?>

                        <div class="box px-0 col-sm-6 col-md-4 col-lg-2 mb-6" data-animate="fadeInUp">
                            <div class="card border-0 py-4 px-3 shadow-hover-3 bg-transparent bg-hover-white">
                                <a href="service-details.php?id=<?= base64_encode($ro['cid']) ?>&&service=<?= str_replace(' ', '-', $ro['cat_name']) ?>">
                                    <div class="d-flex justify-content-center card-img-top">

                                        <img src="dashboard/images/category/<?= $ro['image'] ?>" class="swidth" alt="<?= $ro['cat_name'] ?>" height="50px">
                                    </div>
                                    <div class="card-body  pt-5 pb-0 text-center">
                                        <h4 class="card-title fs-16 lh-13 text-dark"><?= $ro['cat_name'] ?></h4>

                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </section>


        <section class="pb-10 pt-5">
            <div class="container">
                <h2 class="text-dark lh-1625 text-center mb-1 fs-22 fs-md-32">How We Work</h2>

                <div class="row mt-8">
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card box-shadow-new px-7 pb-6 pt-4 h-100 border-btm">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <img src="img2/book-service.png" alt="Book Your Service">
                                </span>

                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2"><b>Book Your Service</b></h4>
                                <p class="card-text px-2">
                                    Book your service online with Shubham Enterprises at an authorised service centre. Online Service booking now at your fingertips.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card box-shadow-new px-7 pb-6 pt-4 h-100 border-btm">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <img src="img2/work-done.png" alt="Get Work Done">
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2"><b>Get Work Done</b></h4>
                                <p class="card-text px-2">
                                    Get your services right at your doorstep with Us.
                                    At Shubham Enterprises you get skilled technicians, genuine functionary & service warranty.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card box-shadow-new px-7 pb-6 pt-4 h-100 border-btm">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <img src="img2/feedback.png" alt="Share Your Feedback">
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 text-center pb-0">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2"><b>Share Your Feedback</b></h4>
                                <p class="card-text px-2">
                                    We'd like to ask for a favor – could you share your experience with us? It will take you about 4 minutes to complete Your Feedback
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>








    </main>

    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>
</body>


</html>