<?php include 'config.php';
include('session.php');

$msg = '';
if (isset($_POST["submit"])) {



    $tst_name = mysqli_real_escape_string($con, $_POST['tst_name']);
    $tst_content = mysqli_real_escape_string($con, $_POST['tst_content']);
    $rt = "INSERT INTO `tbl_testimonials`(`tst_name`, `tst_content` ) VALUES ('$tst_name','$tst_content')";
    $result = mysqli_query($con, $rt);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">  Testimonials Added Successfully</div>';
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
    <title>SHUBHAM ENTERPRISES (One Step Solution)</title>
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Testimonials</h4>
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
                                <h4 class="card-title">Add Testimonials</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Name here" name="tst_name">
                                                <label for="tb-fname">Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating  mb-3">
                                                <textarea id="editor1" name="tst_content">
                                                </textarea>

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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Testimonial list </h4>


                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Testimonial</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $er = "SELECT * FROM  tbl_testimonials ";
                                    $pro = mysqli_query($con, $er);
                                    while ($ro = mysqli_fetch_array($pro)) {
                                        $i = $i + 1;
                                    ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $ro['tst_name'] ?></td>
                                            <td><?= wordwrap($ro['tst_content'], 100, '<br>'); ?></td>

                                            <td> <a href="test-status.php?id=<?= $ro['tstid'] ?>&&status=<?= (($ro['status'] == '1') ? '0' : '1')  ?>" class="btn btn-<?= (($ro['status'] == '1') ? 'success' : 'dark')  ?>"> <?= (($ro['status'] == '1') ? 'Show' : 'Hide')  ?> In website </a></td>

                                            <td><a href="delete.php?id=<?= $ro['tstid'] ?>&&tag=testimonial"><i class="fa fa-trash" aria-hidden="true"></i></a>
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