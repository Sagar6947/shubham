<?php include 'includes/header-links.php';
include 'config.php';

$service_id = $_GET['sid'];

?>

<body>
    <?php include 'includes/header.php' ?>



    <main id="content">
        <section>
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Services</a></li>
                    </ol>
                </nav>
            </div>


            <div class="container">
                <?php
                $select = "SELECT * FROM `new_service` WHERE `nsid` = '".$service_id."' ";
                $result = mysqli_query($con, $select) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                
                ?>
                <div class="row h-100">
                    <div class="col-lg-6">
                        <div class="card border-0 px-6 pt-6 pb-6">
                            <div class="card-body p-0">
                                <h2 class="card-title fs-22 lh-15 mb-1 text-dark color-orange">
                                    <?php echo $row['service_name']; ?>
                                </h2>
                                <p class="card-text mb-1">
                                    <?php echo $row['description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- <img class="rounded-lg border card-img" src="img2/s3.jpg" alt="Eco house company"> -->
                        <div class="galleries position-relative">
                            <ul class="nav nav-pills position-absolute pos-fixed-top-right z-index-3 pt-4 pr-5 flex-nowrap nav-gallery" id="pills-tab" role="tablist">
                                <li class="nav-item mr-2" role="presentation">
                                    <a class=" p-0 active d-flex align-items-center justify-content-center w-48px h-48  text-heading  hover-white  fs-18" data-toggle="pill" href="#image" role="tab" aria-selected="true">
                                        <!-- <i class="fal fa-camera"></i> -->
                                        <img src="img2/favicon.png" alt="">
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-0 shadow-none">
                                <div class="tab-pane fade show active" id="image" role="tabpanel">
                                    <div class="slick-slider dots-white arrow-inner" data-slick-options='{"slidesToShow": 1, "autoplay":false}'>
                                        <div class="box">
                                            <div class="item item-size-3-2">
                                                <div class="card p-0">
                                                    <a href="img2/s3.jpg" class="card-img" data-gtf-mfp="true" data-gallery-id="03" style="background-image:url('dashboard/images/newservice/<?php echo $row['image']; ?>')">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="map-view" role="tabpanel">
                                    <div id="map-01" style="height:620px;" class="mapbox-gl" data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ" data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011],"container":"map-01"}'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }}
                ?>

            </div>
            </div>
        </section>
                    
        <div class="primary-content pt-8">
            <div class="container">
                <div class="row">
                    <article class="col-lg-8 pr-xl-7">
                        <section class="pb-7 border-bottom-black">
                            <h2>Kitchen Cleaning</h2>
                            <div class="d-sm-flex justify-content-sm-between mt-5">
                                <div>
                                    <h5 class="font-weight-600 lh-15 text-heading">Move in Kitchen Cleaning</h5>
                                    <p class="mb-0"><i class="fas fa-star mr-2"></i>4.2 (1k)</p>
                                    <p class=""><span class="fs-18 text-heading font-weight-bold mb-0">₹ 999 </span> | <span>1 hr 30 mins</span> </p>
                                    <hr>
                                    <p>Deep Stain & Grease removal & Placing Back not include</p>
                                </div>

                                <div class="mt-2 text-lg-right">

                                    <button class="add-to-cart-button">
                                        <svg class="add-to-cart-box box-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="2" fill="#ffffff" />
                                        </svg>
                                        <svg class="add-to-cart-box box-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="2" fill="#ffffff" />
                                        </svg>
                                        <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                        <svg class="tick" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="none" d="M0 0h24v24H0V0z" />
                                            <path fill="#ffffff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM9.29 16.29L5.7 12.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l6.88-6.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-7.59 7.59c-.38.39-1.02.39-1.41 0z" />
                                        </svg>
                                        <span class="add-to-cart">Add to cart</span>
                                        <span class="added-to-cart">Added to cart</span>
                                    </button>

                                </div>

                            </div>


                        </section>
                        <section class="pt-6 border-bottom-black">
                            <div class="d-sm-flex justify-content-sm-between mt-5">
                                <div>
                                    <h5 class="font-weight-600 lh-15 text-heading">Complete Kitchen Cleaning</h5>
                                    <p class="mb-0"><i class="fas fa-star mr-2"></i>4.2 (1k)</p>
                                    <p class=""><span class="fs-18 text-heading font-weight-bold mb-0">₹ 999 </span> | <span>1 hr 30 mins</span> </p>
                                    <hr>
                                    <p>Deep Stain & Grease removal & Placing Back not include</p>
                                </div>
                                <div class="mt-2 text-lg-right">

                                    <button class="add-to-cart-button">
                                        <svg class="add-to-cart-box box-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="2" fill="#ffffff" />
                                        </svg>
                                        <svg class="add-to-cart-box box-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="2" fill="#ffffff" />
                                        </svg>
                                        <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                        <svg class="tick" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="none" d="M0 0h24v24H0V0z" />
                                            <path fill="#ffffff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM9.29 16.29L5.7 12.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l6.88-6.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-7.59 7.59c-.38.39-1.02.39-1.41 0z" />
                                        </svg>
                                        <span class="add-to-cart">Add to cart</span>
                                        <span class="added-to-cart">Added to cart</span>
                                    </button>

                                </div>

                            </div>

                        </section>
                    </article>
                    <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card border-0 widget-request-tour">
                                <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                                    <div class="row">
                                        <div class="mb-md-0">
                                            <!-- <h4 class="text-heading fs-22 font-weight-500 lh-15">Selected Package</h4> -->
                                            <div class="card border-0">
                                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center px-0 pb-3">
                                                    <p class="fs-15 font-weight-bold text-heading mb-0 text-uppercase mr-2">Move in Kitchen Cleaning <span class="font-weight-500"></span></p>
                                                    <!-- <a href="#" class="btn btn-outline-primary py-2 lh-238 px-4">Change Package</a> -->
                                                </div>
                                                <div class="card-body px-0 py-2">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-flex justify-content-between lh-22">
                                                            <p class="text-gray-light mb-0">Service Duration:</p>
                                                            <p class="font-weight-500 text-heading mb-0">1 hr 30 mins</p>
                                                        </li>
                                                        <!-- <li class="d-flex justify-content-between lh-22">
                                                            <p class="text-gray-light mb-0">Listing Included:</p>
                                                            <p class="font-weight-500 text-heading mb-0">100</p>
                                                        </li>
                                                        <li class="d-flex justify-content-between lh-22">
                                                            <p class="text-gray-light mb-0">Featured Listing Included:</p>
                                                            <p class="font-weight-500 text-heading mb-0">50</p>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <div class="card-footer bg-transparent d-flex justify-content-between p-0 align-items-center">
                                                    <p class="text-heading mb-0">Total Price:</p>
                                                    <span class="fs-32 font-weight-bold text-heading">₹ 999</span>
                                                </div>
                                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center px-0 pb-3 text-center">
                                                    <a href="checkout.php" class="btn btn-outline-primary py-2 lh-238 px-4">View Cart</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>


    </main>



    <?php include 'includes/footer.php' ?>

    <?php include 'includes/footer-links.php' ?>

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#" class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center" title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
</body>


</html>