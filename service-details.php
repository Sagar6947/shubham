<?php include('config.php');

$cat_id = base64_decode($_GET['id']);

$er = "SELECT * FROM `tbl_category` where  `cid` = " . $cat_id;
$pro = mysqli_query($con, $er);
$cate = mysqli_fetch_assoc($pro);



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title> <?= $cate['cat_name'] ?> | Welcome to Shubham Enterprises</title>
    <?php include 'includes/header-links.php'; ?>

</head>


<body>

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

                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6">
                            <div class="card border-0 px-6 pt-6 pb-6">
                                <div class="card-body p-0">
                                    <button class="btn btn-outline-indigo btn-lg  rounded-lg bg-hover-danger border-hover-danger ">100% Safe </button>
                                    <h2 class="card-title  lh-15 mb-1 text-dark ">
                                        <?php echo $cate['cat_name']; ?> Service
                                    </h2>

                                    <h6 class="text-success">Book Your Service Now</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="slick-slider mx-0 custom-arrow-spacing-30" data-slick-options='{"slidesToShow    {"breakpoint": 768,"settings": {"slidesToShow": 1,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false}}]}'>
                                <?php
                                $er = "SELECT * FROM `tbl_sub_category` WHERE `category_id` = " . $cat_id;


                                $pro = mysqli_query($con, $er);
                                while ($subcate = mysqli_fetch_assoc($pro)) {


                                ?>

                                    <div class="box px-0" data-animate="fadeInUp">
                                        <div class="media d-flex flex-column flex-md-row align-items-md-center position-relative cusstom-bg-slider-gray no-gutters">
                                            <div class="mr-lg-10 mr-md-12 card border-0 col-md-12">

                                                <img src="dashboard/images/subcategory/<?= $subcate['image'] ?>" alt="<?= $subcate['subcat_name'] ?>" class="card-img fimg" style="max-height:300px" />

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
                </div>
            </section>

            <p class="mt-3"></p>

            <section class="pt-lg-6 bg-grey">
                <div class="container container-xxl">

                    <div class="tab-content p-0 shadow-none" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div class="row">


                                <?php
                                $er = "SELECT * FROM `tbl_sub_category` WHERE `category_id` = " . $cat_id;
                                $pro = mysqli_query($con, $er);
                                while ($subcate = mysqli_fetch_assoc($pro)) {


                                ?>

                                    <div class="col-xxl-2 col-lg-2 col-md-6 mb-6" data-animate="zoomIn">
                                        <a href="#<?= base64_encode($subcate['sid']) ?>">
                                            <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
                                                <img src="dashboard/images/subcategory/<?= $subcate['image'] ?>" class="card-img" alt="<?= $subcate['subcat_name'] ?>">
                                                <div class="card-img-overlay d-flex flex-column position-relative-sm">
                                                    <div class="mt-auto px-2 ">
                                                        <h4 class="mt-0 mb-2 lh-1 "><span class="fs-16 bg-tp-orng"><?= $subcate['subcat_name'] ?></span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php

                                }
                                ?>


                            </div>
                        </div>

                    </div>

                </div>
            </section>



            <div class="primary-content pt-8">
                <div class="container">
                    <div class="row">
                        <?php
                        $er = "SELECT * FROM `tbl_sub_category` WHERE `category_id` = " . $cat_id;
                        $pro = mysqli_query($con, $er);
                        while ($subcate = mysqli_fetch_array($pro)) {

                        ?>
                            <article class="col-lg-8 pr-xl-7" id="<?= base64_encode($subcate['sid']) ?>">
                                <h3 class="text-heading pt-3"> <?= $subcate['subcat_name'] ?></h3>


                                <?php
                                $service = "SELECT * FROM `new_service` WHERE cat_id = " . $cat_id . " AND  `subcat_id` = " .
                                    $subcate['sid'];

                                $resulte = mysqli_query($con, $service);
                                while ($row = mysqli_fetch_array($resulte)) {




                                ?>


                                    <section class="pb-7 border-bottom-black">

                                        <div class="d-sm-flex justify-content-sm-between mt-5">

                                            <div>
                                                <h5 class="font-weight-600 lh-15 text-heading"><?= $row['service_name'] ?></h5>
                                                <p class="mb-0"><i class="fas fa-star mr-2"></i>4.2 (1k)</p>
                                                <p class=""><span class="fs-18 text-heading font-weight-bold mb-0">₹ <?= $row['price'] ?> </span> | <span>1 hr 30 mins</span> </p>
                                                <hr>
                                                <p><?= $row['description'] ?></p>
                                            </div>

                                            <div class="mt-2 text-lg-right">

                                                <button class="add-to-cart-button add_to_cart" id="<?= $row['nsid'] ?>"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span>Add to cart</span> </button>
                                                <input type="hidden" name="name" id="name<?= $row['nsid'] ?>" value="<?= $row['service_name'] ?>" />
                                                <input type="hidden" name="hidden_image" id="image<?= $row['nsid'] ?>" value="<?= $row['image'] ?>" />
                                                <input type="hidden" name="price" id="price<?= $row['nsid'] ?>" value="<?= $row['price'] ?>" />
                                                <input type="hidden" value="1" name="quantity" id="quantity<?= $row['nsid'] ?>" class="form-control" />


                                            </div>

                                        </div>


                                    </section>



                                <?php
                                }

                                ?>
                            </article>

                        <?php
                        }
                        ?>




                        <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                            <div class="primary-sidebar-inner">
                                <div class="card border-0 widget-request-tour">
                                    <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                                        <div class="row">
                                            <div class="mb-md-0">
                                                <div class="card border-0">
                                                    <div id="cart_details"></div>

                                                </div>
                                                <div class="cart-buttons">
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["shubhamservice"]) != '') {
                                                        echo '<a href="checkout.php" class="btn btn-outline-indigo  rounded-lg bg-hover-primary border-hover-primary   d-lg-block">Proceed</a>';
                                                    } else {
                                                        echo '<a class="btn btn-outline-indigo  rounded-lg bg-hover-primary border-hover-primary  d-lg-block"  data-toggle="modal" href="#login-register-modal">Proceed</a>';
                                                    }
                                                    ?>
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


        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>

    </body>


</html>



<script>
    load_cart_data();


    function load_cart_data() {
        $.ajax({
            url: "fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {

                console.log(data);
                $('#cart_details').html(data.cart_details);
                $('.total_priced').text(data.total_price);
                $('.count').text(data.total_item);
            }
        });
    }



    $(document).on('click', '.add_to_cart', function() {
        var product_id = $(this).attr("id");
        var product_name = $('#name' + product_id + '').val();
        var product_image = $('#image' + product_id + '').val();
        var product_price = $('#price' + product_id + '').val();
        var product_quantity = $('#quantity' + product_id + '').val();
        var colornm = $('#colornm' + product_id).val();
        var action = "add";
        if (product_quantity > 0) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_image: product_image,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    colornm: colornm,
                    action: action
                },
                success: function(data) {

                    load_cart_data();
                    alert("Service has been Added into Cart");
                }
            });
        } else {
            alert("lease Enter Number of Quantity");
        }
    });

    $(document).on('click', '.delete', function() {
        var product_id = $(this).attr("id");
        var action = 'remove';
        if (confirm("Are you sure you want to remove this product?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function() {

                    load_cart_data();
                    $('#cart-popover').popover('hide');
                    alert("Item has been removed from Cart");
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '#clear_cart', function() {
        var action = 'empty';
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: action
            },
            success: function() {
                load_cart_data();
                $('#cart-popover').popover('hide');
                alert("Your Cart has been clear");
            }
        });
    });
</script>