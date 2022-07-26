<?php include 'config.php';
include('session.php');


$id = base64_decode($_GET['id']);

$er = "SELECT * FROM `tbl_agent` WHERE `agent_id` = '$id'  ";
$pro = mysqli_query($con, $er);
$ro = mysqli_fetch_array($pro);
$msg = '';
if (isset($_POST["submit"])) {

    $agent_name = $_POST['agent_name'];
    $father_name = $_POST['father_name'];
    $agent_phone = $_POST['agent_phone'];
    $agent_mobile = $_POST['agent_mobile'];
    $agent_email = $_POST['agent_email'];
    $agent_address = $_POST['agent_address'];
    $agent_adhar = $_POST['agent_adhar'];
    $agent_pan = $_POST['agent_pan'];
    $agreement_date = $_POST['agreement_date'];
    $effective_date = $_POST['effective_date'];
    $renewal_date = $_POST['renewal_date'];
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        $tmpfile = $_FILES['image']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        move_uploaded_file($tmpfile, 'images/agents/' . $folder);
    } 
    else 
    {
        $folder = $_POST['img'];
    }


    $bank = $_POST['bank'];
    $acc_no = $_POST['acc_no'];
    $ifsc_code = $_POST['ifsc_code'];


    $rt = "UPDATE `tbl_agent` SET `update_date`=CURRENT_TIMESTAMP,`agent_name`='$agent_name',`father_name`='$father_name',`agent_image`='$folder',`agent_email`='$agent_email',`agent_phone`='$agent_phone',`agent_mobile`='$agent_mobile',`agent_address`='$agent_address',`agent_adhar`='$agent_adhar',`agent_pan`='$agent_pan',`agreement_date`='$agreement_date',`effective_date`='$effective_date', `bank`='$bank',`acc_no`='$acc_no',`ifsc_code`='$ifsc_code' , `renewal_date`='$renewal_date' WHERE `agent_id` = '$id' ";
    $result = mysqli_query($con, $rt);

    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
 Agent Edited Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
 Something went wrong. Please try again later 
</div>';
    }
echo'<Script>window.location="ba-list.php"</script>';



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
    <?php include 'header-link.php'; ?>

</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Realtor</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Realtor</li>

                            </ol>
                            <a href="ba-list.php" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">Realtor list</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="images/agents/<?= $ro['agent_image']  ?>" height="120px;"> 


                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Realtor</h4>
                                
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter Name here" name="agent_name" value="<?= $ro['agent_name']  ?>">
                                                <label for="tb-fname">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname" placeholder="Enter father's Name here" name="father_name" value="<?= $ro['father_name']  ?>">
                                                <label for="tb-fname">Father's Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="agent_email" placeholder="name@example.com" value="<?= $ro['agent_email']  ?>">
                                                <label for="tb-email">Email Editress</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="file" class="form-control" placeholder="Profile Image" name="image" accept="image/png, image/jpg, image/jpeg , image/webp">
                                                <input type="hidden"  value="<?= $ro['agent_image']  ?>" name="img" >
                                                <label for="tb-cpwd">Profile Image</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_phone" placeholder="Contact Number" value="<?= $ro['agent_phone']  ?>">
                                                <label for="tb-pwd">Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_mobile" placeholder="Contact Number" value="<?= $ro['agent_mobile']  ?>">
                                                <label for="tb-pwd">Phone Number-2</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_address" placeholder="Permanent Editress" value="<?= $ro['agent_address']  ?>">
                                                <label for="tb-pwd">Permanent Editress </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_adhar" placeholder="Aadhar No.">
                                                <label for="tb-pwd" value="<?= $ro['agent_adhar']  ?>">Aadhar No.</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_pan" placeholder="PAN No.">
                                                <label for="tb-pwd" value="<?= $ro['agent_pan']  ?>">PAN No.</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="agreement_date" placeholder="Agreement Date" value="<?= $ro['agreement_date']  ?>">
                                                <label for="tb-pwd">Agreement Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="effective_date" placeholder="Effective Date" value="<?= $ro['effective_date']  ?>">
                                                <label for="tb-pwd">Effective Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="renewal_date" placeholder="Renewal Date" value="<?= $ro['renewal_date']  ?>">
                                                <label for="tb-pwd">Renewal Date</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="bank"
                                                    placeholder="Bank" value="<?= $ro['bank']  ?>">
                                                <label for="tb-pwd">Bank Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="acc_no"
                                                    placeholder="Account Number" value="<?= $ro['acc_no']  ?>">
                                                <label for="tb-pwd">Account Number</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="ifsc_code"
                                                    placeholder="IFSC Code" value="<?= $ro['ifsc_code']  ?>">
                                                <label for="tb-pwd">IFSC Code</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating  mb-3">
                                               <textarea class="form-control" name="agent_des" id="editor1">
                                                   <?= $ro['agent_des']  ?>
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

            </div>
        </div>
    </div>




    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
</body>

</html>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>