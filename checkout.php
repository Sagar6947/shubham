<?php include('config.php');
$total_price = 0;
$quantity = '';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title> Checkout | Welcome to Shubham Enterprises</title>
    <?php include 'includes/header-links.php'; ?>

</head>


<body>

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
                    <form method="post" action="checkoutpay.php">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-6 mb-md-0">
                                <div class="card border-0">
                                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center px-0 pb-3">
                                        <p class="fs-15 font-weight-bold text-heading mb-0 text-uppercase mr-2">My Cart<span class="font-weight-500"></span></p>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <ul class="list-unstyled mb-0">

                                            <?php
                                            if (!empty($_SESSION["shopping_cart"])) {
                                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {

                                                    $quantity = $quantity . "," . $values["product_id"] . "|" . $values["product_name"] . "|" . $values["product_quantity"] . "|" . $values["product_price"] . "|" . $values["product_image"];

                                                    $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                                            ?>
                                                    <li class="d-flex justify-content-between lh-22">
                                                        <p class="mb-0"><?= $values["product_name"] ?></p>
                                                        <p class="font-weight-500 text-heading mb-0">
                                                        <p class="qty">


                                                            <input type="number" name="qty" id="qty<?= $values['product_id'] ?>" min="1" max="10" step="1" value="<?= $values["product_quantity"] ?>" class="productqty" data-rowid="<?= $values['product_id'] ?>">

                                                        </p>
                                                        </p>
                                                        <p class="font-weight-500 text-heading mb-0">₹ <?= $values["product_price"] ?> </p>

                                                        <p class="font-weight-500  btn btn-danger mb-0 removebtn" id="clear_cart">Remove cart</p>
                                                    </li>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-between p-0 align-items-center">
                                        <p class="text-heading mb-0">Total Price:</p>
                                        <span class="fs-32 font-weight-bold text-heading total_priced"></span>
                                        <input class="form-control" type="hidden" name="grand_total" id="grand_total" value="<?= number_format($total_price, 2); ?>">
                                        <input type="hidden" name="cartstr" value="<?php echo $quantity; ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="fs-15 font-weight-bold text-heading mb-0 text-uppercase mr-2">Payment Details<span class="font-weight-500"></span></p>
                                <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">

                                    <div class="tab-content pt-1 pb-0 px-0 shadow-none">
                                        <div class="tab-pane fade show active" id="schedule" role="tabpanel">
                                            <div class="form-group mb-2">
                                                <input type="date" class="form-control form-control-lg border-0" name="date">
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-lg bootstrap-timepicker timepicker">
                                                    <input type="text" class="form-control border-0 text-body shadow-none" placeholder="Choose a time">
                                                    <div class="input-group-append input-group-addon">
                                                        <button class="btn bg-input shadow-none fs-18 lh-1" type="button"><i class="fal fa-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-check-input" type="hidden" name="user_id" value="<?= $userdata['uid'] ?>">

                                            <div class="form-group mb-2">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder=" Name" name="name" value="<?= $userdata['name'] ?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="email" class="form-control form-control-lg border-0" placeholder="Your Email" value="<?= $userdata['email'] ?>" name="email">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone" name="number" value="<?= $userdata['number'] ?>">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder="Your Address" value="<?= $userdata['address'] ?>" name="address">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control form-control-lg border-0" placeholder="Your Pincpde" name="pincode" value="<?= $userdata['pincode'] ?>">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input class="form-check-input" type="checkbox" value="" id="remember-me" checked>
                                                I accept Terms & condition
                                            </div>



                                            <button type="submit" name="bsubmit" class="btn btn-primary btn-lg btn-block rounded">Submit
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </section>
        </main>


        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>
    </body>


</html>

<script>
    $(document).ready(function() {



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


        $(document).on('change', '.productqty', function() {
            console.log('gh');
            var product_id = $(this).data('rowid');
            var product_quantity = $('#qty' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {

                        load_cart_data();
                        // alert("Item has been Added into Cart");
                    }
                });
            } else {
                alert("At lease Enter Number of Quantity");
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
                    location.reload();

                }
            });
        });

    });
</script>