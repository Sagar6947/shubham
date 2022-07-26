<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <div class="navbar-header">
            <a class="navbar-brand" href="<?= $base_url ?>">
                <b>
                    <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <span class="hidden-xs"><span class="font-bold">Shubham</span>Property</span>
            </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a></li>

            </ul>

            <ul class="navbar-nav dnone">

                <li class="nav-item u-pro"> <a href="property-list.php" class="btn btn-info">All Properties</a></li>
                <li class="nav-item u-pro"> <a href="ba-list.php" class="btn btn-info">Realtor List</a></li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="logout.php" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/icon.png" alt="user">
                        <span class="hidden-md-down">Shubham Property &nbsp;<i class="fa fa-angle-down"></i></span> </a>


                    <div class="dropdown-menu dropdown-menu-end animated flipInY">

                        <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        <!--<a href="#" class="dropdown-item"><i class="fa fa-user"></i> View Profile</a>-->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li> <a class="waves-effect waves-dark" href="home.php"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Dashboard</span></a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="property-list.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Properties</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="property-list.php">All Properties</a></li>
                        <li><a href="property-add.php">Add Properties</a></li>

                        <?php
                        $leads =  mysqli_query($con, "SELECT * FROM `tbl_status`");
                        while ($status = mysqli_fetch_array($leads)) {
                        ?>
                            <!--<li><a href="property-status.php?id=<?= base64_encode($status['s_id']); ?>&&status=<?= $status['status'] ?>"><?= $status['status'] ?></a></li>-->

                        <?php
                        }
                        ?>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="seller.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="waves-effect waves-dark" href="main-category.php">
                                <span class="hide-menu">Main Category</span></a></li>

                        <li><a class="waves-effect waves-dark" href="sub-category.php">
                                <span class="hide-menu">Sub Category</span></a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="new-service.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">New Services</span>
                    </a>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="seller.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Seller</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="waves-effect waves-dark" href="seller.php">
                                <span class="hide-menu">Seller List</span></a></li>

                        <li><a class="waves-effect waves-dark" href="Transfer-seller.php">
                                <span class="hide-menu">Transfer Seller to Realtor</span></a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="buyer.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Buyer</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="waves-effect waves-dark" href="buyer.php">
                                <span class="hide-menu">Buyer List</span></a></li>

                        <li><a class="waves-effect waves-dark" href="Transfer-buyer.php">
                                <span class="hide-menu">Transfer Buyer to Realtor</span></a></li>
                    </ul>
                </li>


                <li>
                    <a class="waves-effect waves-dark" href="join-request.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Join Shubham Property</span>
                    </a>
                </li>





                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu"> Realtor</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ba-list.php">Realtor List</a></li>
                        <li><a href="ba-add.php">Add Realtor</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="contact.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">All Enqueries</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="ameneties.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Ameneties List</span>
                    </a>
                </li>


                <li>
                    <a class="waves-effect waves-dark" href="property-location.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Location List</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="service.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Service</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="team.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Team</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="clients.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Clients</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="testimonials.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Testimonial</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="testimonial-image.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Testimonial Image/video </span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="privacy-policy.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Privacy Policy</span>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>