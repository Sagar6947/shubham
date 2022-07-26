<?php 
include 'config.php';
include('session.php');
$msg = '';
if (isset($_POST["submit"])) {

    $PrivacyPolicy = $_POST['PrivacyPolicy'];
    $rt = "UPDATE `tbl_content` SET `ctext`='".$PrivacyPolicy."' WHERE `cid`='9'";
    $result = mysqli_query($con, $rt);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert"> Policy Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert"> Something went wrong. Please try again later </div>';
    }
}

$query = "SELECT * FROM `tbl_content` WHERE `cid`='9' ";
$runquery = mysqli_query($con, $query);
$fetchquery = mysqli_fetch_array($runquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Privacy Policy</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Privacy Policy</li>

                            </ol>
                            <!--<a href="gym-list.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">Privacy Policy</a>-->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Privacy Policy</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <textarea name="PrivacyPolicy" class="form-control" id="editor1" ><?= $fetchquery['ctext'] ?></textarea>
                                                <label for="tb-fname">Privacy Policy</label>
                                            </div>
                                        </div>
                                         
                                        <div class="col-12">
                                            <div class="d-md-flex align-items-center mt-3">

                                                <div class="ms-auto mt-3 mt-md-0">
                                                    <button type="submit" name="submit" class="btn btn-primary text-white">Update </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
</body>

</html>
<script>
CKEDITOR.replace( 'editor1' );
</script>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>