<?php include 'includes/header-links.php' ?>

<body>
   
    <?php include 'includes/header.php' ?>


    <main id="content">
        <section class="pb-4">
        <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="service-single-page.php">Services</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Payment Summrey</li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Selected Package</h4>
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

                                </ul>
                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between p-0 align-items-center">
                                <p class="text-heading mb-0">Total Price:</p>
                                <span class="fs-32 font-weight-bold text-heading">₹ 999</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 offset-lg-1">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Choose Payment Methods</h4>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="paypal" name="pay" value="paypal" checked class="custom-control-input">
                            <label for="paypal" class="font-weight-500 mb-0 custom-control-label">
                                <span class="fs-12 text-heading d-inline-block mr-1"><i class="fab fa-paypal"></i></span>
                            Pay with UPI   
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="card" name="pay" value="card" class="custom-control-input">
                            <label for="card" class="font-weight-500 mb-0 custom-control-label"><span class="fs-12 text-heading d-inline-block mr-1"><i class="fas fa-credit-card"></i></span>Pay With Credit / Debit Card</label>
                        </div>
                        <!-- <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="wire" name="pay" value="wire" class="custom-control-input">
                            <label for="wire" class="font-weight-500 mb-0 custom-control-label"><span class="text-heading fs-12  d-inline-block mr-1"><i class="fas fa-paper-plane"></i></span>Wire Transfer</label>
                        </div> -->
                        
                       
                        <p class="mb-6">Please read <a href="#" class="text-heading font-weight-500 border-bottom hover-primary">Term &
                                Conditions</a> first</p>
                        <a href="add-address.php" class="btn btn-primary px-8 py-2 lh-238">Pay Now</a>
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