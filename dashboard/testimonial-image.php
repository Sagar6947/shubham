<?php include 'config.php';
include('session.php');

$msg = '';
if (isset($_POST["submit"])) {


    $file_name = '';
    $errors = array();

    if ($_FILES['logo']['name'] != '') {

        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_tmp = $_FILES['logo']['tmp_name'];
        $file_type = $_FILES['logo']['type'];
        $file_extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $extensions = array("jpeg", "jpg", "png", "PNG", "webp");
        if (in_array($file_extension, $extensions) === false) {
            $errors = "extension not allowed, please choose a JPEG or PNG file.";
            echo "<script>alert('$errors');</script>";
        } else if (substr_count($file_name, '.') > 1) {
            $errors = "image name only allow one dot";
            echo "<script>alert('$errors');</script>";
        }
        if (empty($errors) == true) {
            $file_name = date("His") . $file_name;

            move_uploaded_file($file_tmp, "images/testimonials/" . $file_name);
        }
    }
    $type = $_POST['type'];
    $youtube = $_POST['youtube'];
    $youtube = preg_replace("#.*youtube\.com/watch\?v=#", "", $youtube);
    $youtube = preg_replace("#.*https://youtu.be/#", "", $youtube);


    $rt = "INSERT INTO `tbl_testimonial_image`( `type`, `img`, `video` ) VALUES ( '$type' , '$file_name' , '$youtube')";
    $result = mysqli_query($con, $rt);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert"> Testimonials Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert"> Something went wrong. Please try again later </div>';
    }
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
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <!--<link rel="stylesheet" type="text/css" href="assets/node_modules/summernote/dist/summernote-bs4.css">-->
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Testimonials Image/Video</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Testimonials</li>

                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Testimonials Image/Video</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="type" required>

                                                    <option value="">Select Type</option>
                                                    <option value="0">Image</option>
                                                    <option value="1">Video</option>

                                                </select>
                                                <label for="tb-fname">Tpey</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" name="logo" accept="image/png, image/jpg, image/webp, image/jpeg">
                                                <label for="tb-fname">Image</label>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="youtube">
                                                <label for="tb-fname">Youtube Link</label>
                                            </div>
                                        </div>


                                        <div class="col-md-2">

                                            <button type="submit" name="submit" class="btn btn-primary text-white">Submit</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Testimonial list </h4>


                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>

                                        <th>Happy Customer</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $er = "SELECT * FROM  `tbl_testimonial_image` ";
                                    $pro = mysqli_query($con, $er);
                                    while ($ro = mysqli_fetch_array($pro)) {
                                        $i = $i + 1;
                                    ?>

                                        <tr>
                                            <td><?= $i; ?></td>

                                            <td>     <?php if ($ro['img'] == '0') {  ?>

                                               <img src="images/testimonials/<?= $ro['img'] ?>" height="100px">

                                            <?php
                                            } else {

                                            ?>

                                                <iframe width="200" height="200" src="https://www.youtube.com/embed/<?= $ro['video'] ?>">
                                                </iframe>


                                            <?php }
                                            ?></td>

                                            <td><a href="delete.php?id=<?= $ro['id'] ?>&&tag=testimonial_image"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>



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