<?php include 'includes/header-links.php' ?>

<body>

    <?php include 'includes/header.php' ?>


    <main id="content">

        <section class="bg-patten-05 mb-13">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="primary-sidebar-inner">
                            <div class="card border-0 widget-request-tour">
                                <ul class="nav nav-tabs d-flex" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active px-3" data-toggle="tab" href="#schedule" role="tab" aria-selected="true">Fill Your Details</a>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <a class="nav-link px-3" data-toggle="tab" href="#request-info" role="tab" aria-selected="false">Request
                                            Info</a>
                                    </li> -->
                                </ul>
                                <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                                    <form>
                                        <div class="tab-content pt-1 pb-0 px-0 shadow-none">
                                            <div class="tab-pane fade show active" id="schedule" role="tabpanel">
                                                <div class="slick-slider calendar arrow-hide-disable mx-n1" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false}'>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer active border-0 shadow-xxs-1" data-date="March 17, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Tue</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    17</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 18, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Wed</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    18</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 19, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Thur</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    19</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 20, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Fri</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    20</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 21, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Sat</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    21</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 22, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Sun</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    22</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box px-1 py-4">
                                                        <div class="card pointer border-0 shadow-xxs-1" data-date="March 23, 2020">
                                                            <div class="card-body p-1 text-center">
                                                                <p class="day fs-12 text-muted lh-2 mb-0">Mon</p>
                                                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold">
                                                                    23</p>
                                                                <p class="month fs-13 letter-spacing-087 mb-0">Mar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="date" name="date" value="March 17, 2020">
                                                <div class="form-group mb-2">
                                                    <div class="input-group input-group-lg bootstrap-timepicker timepicker">
                                                        <input type="text" class="form-control border-0 text-body shadow-none" placeholder="Choose a time">
                                                        <div class="input-group-append input-group-addon">
                                                            <button class="btn bg-input shadow-none fs-18 lh-1" type="button"><i class="fal fa-angle-down"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control form-control-lg border-0" placeholder="First Name, Last Name">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="email" class="form-control form-control-lg border-0" placeholder="Your Email">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <input type="text" class="form-control form-control-lg border-0" placeholder="Your Address">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <input type="text" class="form-control form-control-lg border-0" placeholder="Your Landmark">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Submit
                                                </button>
                                                
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
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