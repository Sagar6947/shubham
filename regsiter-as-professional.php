<?php include 'config.php';

if (isset($_POST["submit"])) {

    $name = strip_tags($_POST['name']);
    $number = strip_tags($_POST['number']);
    $email = strip_tags($_POST['email']);

    $file = $_FILES['aadhar']['name'];
    $tmpfile = $_FILES['aadhar']['tmp_name'];
    $folder = (($file == '') ? '' : date("dmYHis") . $file);
    move_uploaded_file($tmpfile, 'img/professional/' . $folder);

    $file2 = $_FILES['pan']['name'];
    $tmpfile2 = $_FILES['pan']['tmp_name'];
    $folder2 = (($file == '') ? '' : date("dmYHis") . $file2);
    move_uploaded_file($tmpfile2, 'img/professional/' . $folder2);


    $file3 = $_FILES['photo']['name'];
    $tmpfile3 = $_FILES['photo']['tmp_name'];
    $folder3 = (($file == '') ? '' : date("dmYHis") . $file3);
    move_uploaded_file($tmpfile3, 'img/professional/' . $folder3);

    $service =  implode(" , ", $_POST['service']);

    $bank = strip_tags($_POST['bank']);
    $ifsc = strip_tags($_POST['ifsc']);
    $account = strip_tags($_POST['account']);


    $sal = mysqli_query($con, "INSERT INTO `tbl_professional`( `name`, `number`, `email`, `aadhar`, `pan`, `photo`, `service`, `bank`, `ifsc`, `account`) VALUES ('$name','$number',' $email','$folder','$folder2','$folder3',' $service',' $bank','$ifsc','$account')");

    if ($sal) {
        echo '<script>alert("Thank You for Register with Us. We will Contact You Soon!", "You clicked the button!", "success")</script>';
    } else {
        echo '<script>alert("something went wrong!", "You clicked the button!", "danger")</script>';
    }
}



?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Regsiter As Professionol | Shubham Enterprises (One stop solution)</title>
<?php include('head.php'); ?>

<body>
    <?php include 'includes/header.php'; ?>
    <main id="content">

        <main id="content">


            <section class="bg-gray-02 pt-9 pb-lg-8" style="background: url(img2/bg2.webp);">
                <div class="container">
                    <div class="card border-0 z-index-3 pb-8 pt-10">
                        <div class="card-body p-0">
                            <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16">
                                Register As Professional
                            </h2>

                            <form class="px-md-5" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="deal_client_name" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input type="text" name="number" required="required" class="form-control form-control-lg border-0" id="deal_client_contact_number" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Phone number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Aadhar Card</label>
                                            <input type="file" name="aadhar" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pan Card</label>
                                            <input type="file" name="pan" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Email">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" name="photo" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Email">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Bank Name">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="account" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Account Number">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>IFSC</label>
                                            <input type="text" name="ifsc" id="deal_client_email" required="required" class="form-control form-control-lg border-0" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="IFSC ">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Services</label> </br>
                                            <div class="row">

                                                <?php
                                                $i = 0;
                                                $er = "SELECT * FROM `tbl_category`";
                                                $pro = mysqli_query($con, $er);
                                                while ($ro = mysqli_fetch_assoc($pro)) {
                                                    $i = $i + 1;
                                                ?>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" id="vehicle<?= $i ?>" name="service[]" value="<?= $ro['cat_name'] ?>">
                                                        <label for="vehicle<?= $i ?>"> <?= $ro['cat_name'] ?></label><br>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                    </div>


                                </div>


                                <div class="form-group mb-6">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-lg btn-primary px-9">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>

        </main>


    </main>
    <?php include('footer.php'); ?>
    <?php include('footer-link.php'); ?>


</body>


</html>