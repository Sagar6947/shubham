<?php include 'config.php'; ?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Contact Us | Shubham Enterprises (One stop solution)</title>
<?php include('head.php'); ?>

<body>
    <?php include('menu.php') ?>
    <main id="content">

        <main id="content">

            <section class="py-14 py-lg-17 page-title bg-overlay-opacity-02" style="background-image: url('images/BG4.jpg'); background-size: cover; background-position: center; "> </section>
            <section>
                <div class="container">
                    <div class="card border-0 mt-n13 z-index-3 pb-8 pt-10">
                        <div class="card-body p-0">
                            <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16">
                                Let's Discuss about your Project
                            </h2>
                            <p class="text-center mxw-670 mb-8">
                                Please share following information to understand your requirements for detailed proposal.
                            </p>
                            <form action="query-submit.php" class="mxw-751 px-md-5" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control border-0" placeholder="Your Property desire?" placeholder="Message" name="message" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="url" value="<?= $actual_link ?>">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="deal_client_name" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" required="required" class="form-control form-control-lg border-0" id="deal_client_contact_number" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Phone number">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="email" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Email">
                                        </div>
                                    </div>


                                </div>


                                <div class="form-group mb-6">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="querySubmit" class="btn btn-lg btn-primary px-9">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
            <?php include 'clients.php'; ?>
        </main>


    </main>
    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>


</body>


</html>