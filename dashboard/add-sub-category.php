<?php include 'config.php';
include('session.php');

$msg = '';
if (isset($_POST["submit"])) {


    $main_cat = $_POST['main_cat_name'];
    $cat_name = $_POST['subcat_name'];
    $file = $_FILES['image']['name'];
    $tmpfile = $_FILES['image']['tmp_name'];
    $folder = (($file == '') ? '' : date("dmYHis") . $file);
    move_uploaded_file($tmpfile, 'images/subcategory/' . $folder);


    $rt = "INSERT INTO `tbl_sub_category`( `category_id`, `subcat_name` , `image` ) VALUES ('$main_cat','$cat_name' , '$folder')";
    $result = mysqli_query($con, $rt);

    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
           Category Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
               Something went wrong. Please try again later 
           </div>';
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
                        <h4 class="text-themecolor">Main Category Add</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Add Main Category</li>

                            </ol>
                            <a href="sub-category.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">Category list</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Sub Category</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Title here" name="subcat_name" required>
                                                <label for="tb-fname">Category Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="main_cat_name">

                                                <option value="">Main Category</option>
                                                <?php
                                                $main_cat = mysqli_query($con, "SELECT * FROM `tbl_category`  ");
                                                while ($res = mysqli_fetch_array($main_cat)) {
                                                ?>
                                                    <option value="<?= $res['cid'] ?>"><?= $res['cat_name'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="tb-fname" placeholder="Enter image here" name="image" required>
                                                <label for="tb-fname">Sub-Category Image</label>
                                            </div>
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