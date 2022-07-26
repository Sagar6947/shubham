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
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile -pic" href="logout.php" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= (($agentdata['agent_image'] != '') ? '../dashboard/images/agents/' . $agentdata['agent_image'] . '' : 'assets/images/icon.png') ?>" alt="user" height="40px">
                        <span class="hidden-md-down"><?= $agentdata['agent_name'] ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
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

                <li>
                    <a class="waves-effect waves-dark" href="home.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="property-list.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Properties</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="property-list.php">All Properties</a></li>
                         <li><a href="property-add.php">Add Properties</a></li>

                      
                    </ul>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="buyer-match.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu"> Buyer match </span>
                    </a>
                </li>
               
                <li> <a class="waves-effect waves-dark" href="seller.php"><i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Seller List</span></a></li>

                <li>
                    <a class="waves-effect waves-dark" href="buyer.php" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu"> Buyer List </span>
                    </a>
                </li>

                <li> <a class="waves-effect waves-dark" href="profile.php"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">My Profile</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>