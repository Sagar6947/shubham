<?php include 'config.php';
include('session.php');

$id = base64_decode($_GET['id']);
$er = "SELECT * FROM `tbl_team` WHERE `id` = '$id'  ";
$pro = mysqli_query($con, $er);
$ro = mysqli_fetch_array($pro);

$msg = '';
if (isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $descr = mysqli_real_escape_string($con, $_POST['description']);
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        $tmpfile = $_FILES['image']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        move_uploaded_file($tmpfile, 'images/team/' . $folder);
    } else {
        $folder = $_POST['img'];
    }
    $rt = "UPDATE `tbl_team` SET `update_date`=CURRENT_TIMESTAMP,`image`='$folder',`name`=' $name',`phone`=' $phone',`email`='$email',`designation`=' $designation',`description`='$descr' WHERE `id` = '$id'";
    $result = mysqli_query($con, $rt);

    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
           Team Update Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
               Something went wrong. Please try again later 
           </div>';
    }
    echo'<script>window.location="team.php"</script>';
}
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
    <title>SHUBHAM ENTERPRISES (One Step Solution)</title>
    <?php include 'header-link.php'; ?>

    <link rel="stylesheet" type="text/css" href="assets/node_modules/summernote/dist/summernote-bs4.css">
</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Team Edit</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Team</li>

                            </ol>
                            <a href="service.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">Team list</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Team</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Title here" name="name" value="<?= $ro['name']  ?>">
                                                <label for="tb-fname">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating  mb-3">
                                                <input type="file" class="form-control" placeholder="Profile Image" name="image" accept="image/png, image/jpg, image/jpeg , image/webp">

                                                <input type="hidden" name="img" value="<?= $ro['image'] ?>">

                                                <label for="tb-cpwd">Image</label>

                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="phone" placeholder="Contact Number" value="<?= $ro['phone']  ?>">
                                                <label for="tb-pwd">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?= $ro['email']  ?>">
                                                <label for="tb-email">Email address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="designation" placeholder="Designation" value="<?= $ro['designation']  ?>">
                                                <label for="tb-pwd">Designation</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="summernote" name="description"><?= $ro['description'];  ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-md-flex align-items-center mt-3">

                                                <div class="ms-auto mt-3 mt-md-0">
                                                    <button type="submit" name="submit" class="btn btn-primary text-white">Submit</button>
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
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>

    <script src="assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
</body>

</html>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>


<script>
    $(function() {

        $('.summernote').summernote({
            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
</script>