<header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg">
    <div class="sticky-area">
        <div class="container container-xxl">
            <div class="d-flex align-items-center">
                <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
                    <a class="navbar-brand mr-7" href="index.php">
                        <img src="images/new_logo.png" alt="Shubham Property" class="normal-logo" style="height: 70px;">
                        <img src="images/new_logo.png" alt="Shubham Property" class="sticky-logo" style="height: 70px;">
                    </a>

                    <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse" data-target="#primaryMenu02" aria-controls="primaryMenu02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fs-24 cblack"><i class="fal fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4"><a class="nav-link p-0" href="home.php">E-House Hunting</a></li>

                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4"><a class="nav-link p-0" href="esolutions-for-home.php">E-Solutions For Homes</a></li>


                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4"><a class="nav-link p-0" href="home.php"> E-Solutions For other Sectors</a></li>

                            <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="about-us.php">
                                    Who we are
                                </a>
                            </li>

                        </ul>
                        <div class="d-block d-xl-none">
                            <ul class="navbar-nav flex-row justify-content-lg-end d-flex flex-wrap py-2">

                                <li class="nav-item ml-auto w-100 w-sm-auto">
                                    <a class="btn btn-primary btn-lg" href="regsiter-as-professional.php">
                                        Register as Professional
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
                            <a class="btn btn-outline-indigo btn-lg  rounded-lg bg-hover-primary border-hover-primary  d-none d-lg-block" href="regsiter-as-professional.php">
                                Register as Professional
                            </a>
                            <a class="btn btn-primary btn-lg d-block d-lg-none" href="regsiter-as-professional.php">
                                Register as Professional
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>



<div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog" aria-labelledby="login-register-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 p-0">
                <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
                    <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                    <div class="nav-item col-sm-6 ml-0 d-flex align-items-center justify-content-end">
                        <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body p-4 py-sm-7 px-sm-8">
                <div class="tab-content shadow-none p-0" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form class="form" method="post">
                            <div class="form-group mb-4">
                                <label for="username" class="sr-only">Username</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18" id="inputGroup-sizing-lg">
                                            <i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-0 shadow-none fs-13" id="username" name="username" required placeholder="Number / Your email">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                            <i class="far fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control border-0 shadow-none fs-13" id="password" name="password" required placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                            <i class="far fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="form-check">
                                    <!-- <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember me
                                    </label> -->
                                </div>
                                <a href="password-recovery.html" class="d-inline-block ml-auto text-orange fs-15">
                                    Lost password?
                                </a>
                            </div>

                            <button type="submit" name="loginsubmit" class="btn btn-primary btn-lg btn-block">Log in</button>
                        </form>


                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form class="form" method="post">
                            <div class="form-group mb-4">
                                <label for="full-name" class="sr-only">Full name</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                            <i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-0 shadow-none fs-13" id="full-name" name="name" required placeholder="Full name" require>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="username01" class="sr-only">Email</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                            <i class="far fa-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control border-0 shadow-none fs-13" id="Email01" name="email" required placeholder="Your email">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="username01" class="sr-only">Contact No.</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                            <i class="far fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-0 shadow-none fs-13" maxlength="10" id="number01" name="number" required placeholder="Your number">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password01" class="sr-only">Password</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                            <i class="far fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control border-0 shadow-none fs-13" id="password01" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required placeholder="Password*">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                            <i class="far fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <p class="form-text">Minimum 6 characters with 1 number and 1 letter</p>
                            </div>
                            <button type="submit" name="regsubmit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                        </form>


                        <div class="mt-2">By creating an account, you agree to Shubham Enterprises
                            <a class="text-heading" href="terms-and-condition.php"><u>Terms & Condition</u> </a> and
                            <a class="text-heading" href="privacy-policy.php"><u>Privacy Policy</u></a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
