<?php
include 'config.php';
include 'includes/header-links.php';
?>

<body>

    <?php include 'includes/header.php' ?>


    <main id="content">
        <section>
            <div id="househunting" class="slick-slider mx-0 custom-arrow-center " data-slick-options='{"slidesToShow": 1, "autoplay":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":1,"arrows":false,"dots":false}},{"breakpoint": 992,"settings": {"slidesToShow":1,"arrows":false,"dots":false}},{"breakpoint": 768,"settings": {"slidesToShow": 1,"arrows":false,"dots":false}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":false}}]}'>
                <div class="box px-0 d-flex flex-column" style="height: 70vh;">
                    <div class="bg-cover d-flex align-items-center custom-vh-02" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('img2/slider/4.jpg'); background-size: cover;">
                        <div class="container">
                            <div class="row py-8" data-animate="zoomIn">

                                <div class="col-lg-7 col-md-6">

                                    <h2 class="lh-12 mb-4 text-white fs-md-60 fs-48 z2">E-Solutions<br> For Homes <br> <span class="banner-highlights z2"> -Carpenter</span></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box px-0 d-flex flex-column" style="height: 70vh;">
                    <div class="bg-cover d-flex align-items-center custom-vh-02" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('img2/slider/2.jpg'); background-size: cover;">
                        <div class="container">
                            <div class="row py-8" data-animate="zoomIn">

                                <div class="col-lg-7 col-md-6">

                                    <h2 class="lh-12 mb-4 text-white fs-md-60 fs-48 z2">
                                        E-Solutions<br> For Homes <br> <span class="banner-highlights">- Car Cleaning</span></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box px-0 d-flex flex-column" style="height: 70vh;">
                    <div class="bg-cover d-flex align-items-center custom-vh-02" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('img2/slider/3.jpg'); background-size: cover;">
                        <div class="container">
                            <div class="row py-8" data-animate="zoomIn">

                                <div class="col-lg-7 col-md-6">

                                    <h2 class="lh-12 mb-4 text-white fs-md-60 fs-48 z2">
                                        E-Solutions<br> For Homes <br> <span class="banner-highlights">- Electrician </span>
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box px-0 d-flex flex-column" style="height: 70vh;">
                    <div class="bg-cover d-flex align-items-center custom-vh-02" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('img2/slider/5.jpg'); background-size: cover;">
                        <div class="container">
                            <div class="row py-8" data-animate="zoomIn">

                                <div class="col-lg-7 col-md-6">

                                    <h2 class="lh-12 mb-4 text-white fs-md-60 fs-48 z2">E-Solutions<br> For Homes <br> <span class="banner-highlights"> -White Wash / Wall Painting</span>
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box px-0 d-flex flex-column" style="height: 70vh;">
                    <div class="bg-cover d-flex align-items-center custom-vh-02" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('img2/slider/7.jpg'); background-size: cover;">
                        <div class="container">
                            <div class="row py-8" data-animate="zoomIn">

                                <div class="col-lg-7 col-md-6">

                                    <h2 class="lh-12 mb-4 text-white fs-md-60 fs-48 z2">E-Solutions<br> For Home <br><span class="banner-highlights"> -Full House Cleaning</span>
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>


        <section class="pt-7 pb-1 bg-patten-04">
            <div class="container container-xxl">
                <!-- <p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">Service</p>
                <h2 class="text-center text-dark lh-1625 mxw-940 mb-1">
                    Categories
                </h2> -->
                <div class="slick-slider slick-dots-mt-0 item-nth-2-active-lg" data-slick-options='{"slidesToShow": 5, "dots":false,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":4,"dots":true}},{"breakpoint": 1200,"settings": {"slidesToShow":4,"dots":true}},{"breakpoint": 992,"settings": {"slidesToShow":3 ,"dots":true}},{"breakpoint": 768,"settings": {"slidesToShow": 2 ,"dots":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"dots":true}}]}'>

                    <?php
                    $er = "SELECT * FROM `tbl_category`";
                    $pro = mysqli_query($con, $er);
                    while ($ro = mysqli_fetch_assoc($pro)) {
                    ?>

                        <div class="py-8">
                            <div class="card border-lg-0 shadow-hover-xs-4 hover-change-image box-shadow-new border-btm" data-animate="flipInX">
                                <div class="card-body text-center pt-3 pb-3 px-3">
                                    <a href="category-single-page.php?id=<?php echo $ro['cid']; ?>" class="d-inline-block mb-2">
                                        <img src="img2/category.png" alt="Shubham Property">
                                    </a>
                                    <a href="category-single-page.php?id=<?php echo $ro['cid']; ?>" class="d-block fs-16 lh-2 text-dark mb-0 font-weight-500 hover-primary">
                                        <b><?php echo $ro['cat_name']; ?></b></a>
                                    <!-- <p class="mb-2">Sales Excutive</p> -->
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pt-1 pb-11 bg-grey">
            <div class="container container-xxl">
                <div class="row flex-lg-row flex-cloumn">
                    <div class="col-lg-12 ">
                        <h2 class="text-heading">Book Your Service</h2>
                        <span class="heading-divider"></span>
                    </div>

                </div>
                <div class="tab-content p-0 shadow-none" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row">
                            <div class="col-xxl-3 col-lg-3 col-md-6 mb-6" data-animate="zoomIn">
                                <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
                                    <img src="images2/properties-grid-08.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                                    <div class="card-img-overlay d-flex flex-column position-relative-sm">
                                        <div class="mt-auto px-2 ">
                                            <h4 class="mt-0 mb-2 lh-1 "><a href="#" class="fs-16 bg-tp-orng">Full House Cleaning</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3 col-md-6 mb-6" data-animate="zoomIn">
                                <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
                                    <img src="images2/properties-grid-08.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                                    <div class="card-img-overlay d-flex flex-column position-relative-sm">
                                        <div class="mt-auto px-2">
                                            <h4 class="mt-0 mb-2 lh-1"><a href="#" class="fs-16 bg-tp-orng">Bathroom Cleaning</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3 col-md-6 mb-6" data-animate="zoomIn">
                                <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
                                    <img src="images2/properties-grid-08.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                                    <div class="card-img-overlay d-flex flex-column position-relative-sm">
                                        <div class="mt-auto px-2">
                                            <h4 class="mt-0 mb-2 lh-1"><a href="#" class="fs-16 bg-tp-orng">Kitchen Cleaning</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3 col-md-6 mb-6" data-animate="zoomIn">
                                <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
                                    <img src="images2/properties-grid-08.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                                    <div class="card-img-overlay d-flex flex-column position-relative-sm">
                                        <div class="mt-auto px-2">
                                            <h4 class="mt-0 mb-2 lh-1"><a href="#" class="fs-16 bg-tp-orng">Pest Control</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-lg text-secondary btn-accent rounded-lg mt-6">Let's Connect
                        <i class="far fa-long-arrow-right ml-1"></i>
                    </a>
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

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/footer-links.php' ?>



    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#" class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center" title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
</body>


</html>