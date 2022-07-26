<?php
include 'config.php';
?>

<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Realtor List | Shubham Enterprises (One stop solution)</title>
<?php include('head.php'); ?>

<body>

    <?php include('menu.php') ?>
    <main id="content">


        <section class="section-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-lg-0 pb-3">
                        <li class="breadcrumb-item fs-12 letter-spacing-087">
                            <a href="index.php">Home</a>
                        </li>

                        <li class="breadcrumb-item fs-12 letter-spacing-087 active">Realtors List</li>
                    </ol>

                    <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">
                        Realtors List
                    </h1>
                </nav>
            </div>

        </section>
        <section class="pt-8 pb-13 bg-gray-01">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <?php
                            $i = 0;
                            $listing = mysqli_query($con, "SELECT * FROM `tbl_agent` WHERE `agent_status` = '1' ORDER BY `agent_id` ASC ");
                            while ($list = mysqli_fetch_array($listing)) {
                                $sell = mysqli_query($con, "SELECT * FROM `tbl_property_sell` WHERE `ba_id` = '" . $list['agent_id'] . "' ");
                                $buy = mysqli_query($con, "SELECT * FROM `tbl_property_buy` WHERE `ba_id` = '" . $list['agent_id'] . "' ");
                            ?>



                                <div class="col-md-4 mb-4">
                                    <div class="card border-0 shadow-hover-3 px-6">
                                        <div class="card-body text-center pt-6 pb-2 px-0">
                                            <a href="#" class="d-inline-block mb-2">
                                                <img src="<?= (($list['agent_image'] == '') ? 'images/user.jpg'  : 'dashboard/images/agents/' . $list['agent_image'] . ' ') ?>" alt="<?= $list['agent_name'] ?>" style="height: 125px;border-radius: 50%;">
                                            </a>
                                            <a href="#" class="d-block fs-16 lh-214 text-dark mb-0 font-weight-500 hover-primary"><?= $list['agent_name'] ?></a>


                                        </div>
                                        <div class="card-footer bg-white px-0 pt-1 pb-6">
                                            <ul class="list-group list-group-no-border pb-1">

                                                <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                                                    <span class="col-sm-4 p-0 fs-13 mb-1 mb-sm-0">Mobile</span>
                                                    <span class="col-sm-8 p-0 text-heading font-weight-500"><?= $list['agent_phone'] ?> <?php if ($list['agent_mobile'] != '') {
                                                                                                                                            echo  ',' . $list['agent_mobile'];
                                                                                                                                        } ?></span>
                                                </li>

                                                <li class="list-group-item d-flex align-items-sm-center row m-0 px-0 pt-2 pb-0">
                                                    <span class="col-sm-4 p-0 fs-13 lh-114">Email</span>
                                                    <span class="col-sm-8 p-0"><?= $list['agent_email'] ?></span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

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