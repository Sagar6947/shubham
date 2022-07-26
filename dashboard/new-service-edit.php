<?php include 'config.php';
include('session.php');

$id = base64_decode($_GET['id']);
$er = "SELECT * FROM `new_service` WHERE `nsid` = '$id'  ";
$pro = mysqli_query($con, $er);
$ro = mysqli_fetch_array($pro);

$msg = '';
if (isset($_POST["submit"])) {

    $name = $_POST['ser_name'];
    $price = $_POST['price'];
    $category = $_POST['cat_id'];
    $subcat_id = $_POST['subcat_id'];
    $desc = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        $tmpfile = $_FILES['image']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        move_uploaded_file($tmpfile, 'images/newservice/' . $folder);
    } else {
        $folder = $_POST['img'];
    }
    $rt = "UPDATE `new_service` SET `update_date`=CURRENT_TIMESTAMP,`image`='$folder',`service_name`=' $name',`price`=' $price',`cat_id`='$category',`subcat_id`=' $subcat_id',`description`='$desc' WHERE `nsid` = '$id'";
    $result = mysqli_query($con, $rt);

    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
           Service Update Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
               Something went wrong. Please try again later 
           </div>';
    }
    echo '<script>window.location="new-service.php"</script>';
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
                        <h4 class="text-themecolor">New Service Edit</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit New Serive</li>

                            </ol>
                            <a href="new-service.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">Service list</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Service</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Title here" name="ser_name" value="<?= $ro['service_name'] ?>">
                                                <label for="tb-fname">Service Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-floating  mb-3">
                                                <input type="file" class="form-control" placeholder="Profile Image" name="image" accept="image/png, image/jpg, image/jpeg , image/webp" required>

                                                <input type="hidden" name="img" value="<?= $ro['image'] ?>">
                                                <label for="tb-cpwd">Service Image</label>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Title here" name="price" value="<?= $ro['price'] ?>">
                                                <label for="tb-fname">Price</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="margin-bottom: 15px;">
                                            <?php
                                            $sql1 = "SELECT * FROM tbl_category";

                                            $result1 = mysqli_query($con, $sql1) or die("Query Unsuccessful");

                                            if (mysqli_num_rows($result1) > 0) {

                                                echo '<select name="cat_id" class="form-control">
                            <option value="" disabled>Select Category</option>';

                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                    if ($ro['cat_id'] == $row1['cid']) {
                                                        $select = 'selected';
                                                    } else {
                                                        $select = "";
                                                    }
                                                    echo "<option {$select} value='{$row1['cid']}'>{$row1['cat_name']}</option>";
                                                }
                                                echo '</select>';
                                            }
                                            ?>
                                        </div>



                                        <div class="col-md-6" style="margin-bottom: 15px;">
                                            <?php
                                            $sql2 = "SELECT * FROM tbl_sub_category";

                                            $result2 = mysqli_query($con, $sql2) or die("Query Unsuccessful");

                                            if (mysqli_num_rows($result2) > 0) {

                                                echo '<select name="subcat_id" class="form-control">
                            <option value="" disabled>Select Sub Category</option>';

                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    if ($ro['cat_id'] == $row2['sid']) {
                                                        $select = 'selected';
                                                    } else {
                                                        $select = "";
                                                    }
                                                    echo "<option {$select} value='{$row2['sid']}'>{$row2['subcat_name']}</option>";
                                                }
                                                echo '</select>';
                                            }
                                            ?>
                                        </div>

                                        <div class="col-sm-12">
                                            <textarea class="summernote" name="description"><?php echo $ro['description']; ?></textarea>
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