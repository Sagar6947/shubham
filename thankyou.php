<?php include 'includes/header-links.php' ?>

<body>

    <?php include 'includes/header.php' ?>


    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment Completed</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Payment Completed</h1>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">My Order</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Order Number:</p>
                                <p class="font-weight-500 text-heading mb-0">6112</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Date:</p>
                                <p class="font-weight-500 text-heading mb-0">September 17, 2022</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Total:</p>
                                <p class="font-weight-500 text-heading mb-0">₹ 999</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Payment Method:</p>
                                <p class="font-weight-500 text-heading mb-0">Wire Transfer</p>
                            </li>
                            <!-- <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Payment Type:</p>
                                <p class="font-weight-500 text-heading mb-0">Package</p>
                            </li> -->
                        </ul>
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Thank You</h4>
                        <p class="mb-5">
                            Thank Your so Much for Connecting with Shubham Enterprises
                        </p>
                        
                        <a href="index.php" class="btn btn-primary px-4 py-2 lh-238">Go to Home</a>
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