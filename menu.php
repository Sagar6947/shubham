<?php

$ss = "SELECT * FROM `tbl_social` ";
$sos = mysqli_query($con, $ss);
$social = mysqli_fetch_array($sos);

?>


<header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg">
    <div class="sticky-area">
        <div class="container container-xxl">
            <div class="d-flex align-items-center">
                <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
                    <a class="navbar-brand mr-7" href="index.php">
                        <img src="images/new_logo.png" alt="Shubham Property" class="normal-logo">
                        <img src="images/new_logo.png" alt="Shubham Property" class="sticky-logo">
                    </a>

                    <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse" data-target="#primaryMenu02" aria-controls="primaryMenu02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fs-24 cblack"><i class="fal fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="index.php">
                                    Home
                                </a>
                            </li>
                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="about-us.php">
                                    Who we are
                                </a>
                            </li>
                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link   p-0" href="all-property.php">
                                    All Properties </a>
                            </li>
                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link   p-0" href="services.php">
                                    Our Services</a>
                            </li>

                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link   p-0" href="realtor.php">
                                    Our Realtors</a>
                            </li>

                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link   p-0" href="contact-us.php">
                                    Contact Us
                                </a>
                            </li>

                        </ul>
                        <div class="d-block d-xl-none">
                            <ul class="navbar-nav flex-row justify-content-lg-end d-flex flex-wrap py-2">

                                <li class="nav-item ml-auto w-100 w-sm-auto">
                                    <a class="btn btn-primary btn-lg" href="property-add.php">
                                        Add Property
                                        <!-- <img src="images/add-listing-icon.png" alt="Contact us" class="ml-1"> -->
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="ml-auto d-none d-xl-block">
                    <ul class="navbar-nav flex-row justify-content-lg-end d-flex flex-wrap py-2">

                        <li class="nav-item">
                            <a class="btn btn-outline-indigo btn-lg  rounded-lg bg-hover-primary border-hover-primary  d-none d-lg-block" href="property-add.php">
                                Add Property
                            </a>
                            <a class="btn btn-primary btn-lg d-block d-lg-none" href="property-add.php">
                                Add Property
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>