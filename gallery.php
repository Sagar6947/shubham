<?php include 'config.php'; ?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Gallery | Shubham Enterprises (One stop solution)</title>
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

                            <li class="breadcrumb-item fs-12 letter-spacing-087 active">Gallery</li>
                        </ol>

                        <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">
                            Our Gallery
                        </h1>
                    </nav>
                </div>

            </section>
            <section>
                <div class="container">
                    <div class="row galleries">
                        <?php

                        $gallery = "SELECT * FROM  tbl_gallery ";
                        $img = mysqli_query($con, $gallery);
                        while ($img_fetch = mysqli_fetch_array($img)) {

                        ?>

                            <div class="col-sm-6 col-lg-4 mb-6">
                                <div class="item item-size-4-3">
                                    <div class="card p-0 hover-zoom-in">
                                        <a href="images/gallery-lg-10.jpg" class="card-img" data-gtf-mfp="true" data-gallery-id="05" style="background-image: url('images/gallery-lg-10.jpg'); ">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>




                    </div>
                </div>
            </section>
        </main>


    </main>
    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>
</body>

</html>