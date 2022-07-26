<?php
include 'config.php';

$query = "SELECT * FROM `tbl_content` WHERE `cid`='9' ";
$runquery = mysqli_query($con, $query);
$fetchquery = mysqli_fetch_array($runquery);
?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Privacy Policy | Shubham Enterprises (One stop solution)</title>
<?php include('head.php'); ?>

<body>
    <?php include('menu.php') ?>
    <main id="content">

        <main id="content">
            <section class="section-light">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pt-lg-0 pb-3">
                            <li class="breadcrumb-item fs-12 letter-spacing-087">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item fs-12 letter-spacing-087 active">Privacy Policy</li>
                        </ol>
                        <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">
                            Privacy Policy
                        </h1>
                    </nav>
                </div>
            </section>


            <section style="background-image: url('images/pattern.jpg');">
                <div class="container">
                    <div class="py-lg-8 py-6 border-top">
                        <div class="mx-0 partners">
                            <p><?= $fetchquery['ctext'] ?></p>


                        </div>
                    </div>
                </div>
            </section>





        </main>
        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>
</body>

</html>