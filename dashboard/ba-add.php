<?php include'config.php'; 
include('session.php');

  $msg='';
if(isset($_POST["submit"]))
{

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

$file=$_FILES['image']['name'];
$tmpfile=$_FILES['image']['tmp_name'];
$folder = (($file == '') ? '' : date("dmYHis") . $file);
move_uploaded_file($tmpfile,'images/agents/'.$folder);

$user_password = substr($agent_name, 0, 3) . substr($agent_phone, 0, 3);

$bank = $_POST['bank'];
$acc_no = $_POST['acc_no'];
$ifsc_code = $_POST['ifsc_code'];

$agent_des = $_POST['agent_des'];


$rt = "INSERT INTO `tbl_agent`(`agent_name`, `father_name`, `agent_image`, `agent_email`, `agent_phone`, `agent_mobile`, `agent_address`, `agent_adhar`, `agent_pan`, `agreement_date`, `effective_date`, `renewal_date`, `bank`, `acc_no`, `ifsc_code`, `agent_pass` , `agent_des` ) VALUES ('$agent_name','$father_name','$folder','$agent_email', '$agent_phone','$agent_mobile','$agent_address','$agent_adhar',  '$agent_pan','$agreement_date','$effective_date','$renewal_date', '$bank' ,'$acc_no' , '$ifsc_code', '$user_password'  , '$agent_des' )";
$result = mysqli_query($con, $rt);

if($result)
{
  $msg = '<div class="alert alert-success" role="alert">
 Agent Added Successfully</div>';
}
else
{
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
    <title>Shubham Property : Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
     <?php include'header-link.php'; ?>
   
</head>
<body class="skin-megna fixed-layout">
  
 <div id="main-wrapper">
   <?php include'header.php'; ?>

   <div class="page-wrapper">
             <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Broker Associate</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Add Realtor</li>
                              
                            </ol>
                            <a href="ba-list.php" type="button"  class="btn btn-info d-none d-lg-block m-l-15 text-white">Realtor list</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Realtor</h4>
                                <p><?= $msg; ?></p>
                                <form method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname"
                                                    placeholder="Enter Name here" name="agent_name" required> 
                                                <label for="tb-fname">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="tb-fname"
                                                    placeholder="Enter father's Name here" name="father_name">
                                                <label for="tb-fname">Father's Name</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="agent_email"
                                                    placeholder="name@example.com" required>
                                                <label for="tb-email">Email address</label>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="file" class="form-control"
                                                    placeholder="Profile Image" name="image" accept="image/png, image/jpg, image/jpeg , image/webp" >
                                                <label for="tb-cpwd">Profile Image</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_phone"
                                                    placeholder="Contact Number" required>
                                                <label for="tb-pwd">Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_mobile"
                                                    placeholder="Contact Number" >
                                                <label for="tb-pwd">Phone Number-2</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_address"
                                                    placeholder="Permanent Address	">
                                                <label for="tb-pwd">Permanent Address	</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_adhar"
                                                    placeholder="Aadhar No.">
                                                <label for="tb-pwd">Aadhar No.</label>
                                            </div>
                                        </div>
 
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="agent_pan"
                                                    placeholder="PAN No.">
                                                <label for="tb-pwd">PAN No.</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="agreement_date"
                                                    placeholder="Agreement Date">
                                                <label for="tb-pwd">Agreement Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="effective_date"
                                                    placeholder="Effective Date">
                                                <label for="tb-pwd">Effective Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="date" class="form-control" name="renewal_date"
                                                    placeholder="Renewal Date">
                                                <label for="tb-pwd">Renewal Date</label>
                                            </div>
                                        </div>


                                      

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="bank"
                                                    placeholder="Bank">
                                                <label for="tb-pwd">Bank Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="acc_no"
                                                    placeholder="Account Number">
                                                <label for="tb-pwd">Account Number</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating  mb-3">
                                                <input type="text" class="form-control" name="ifsc_code"
                                                    placeholder="IFSC Code">
                                                <label for="tb-pwd">IFSC Code</label>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="col-md-12">
                                            <div class="form-floating  mb-3">
                                               <textarea class="form-control" name="agent_des" id="editor1"></textarea>
                                              
                                            </div>
                                        </div>


                                       
                                         
                                        <div class="col-12">
                                            <div class="d-md-flex align-items-center mt-3">
                                               
                                                <div class="ms-auto mt-3 mt-md-0">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary text-white">Submit</button>
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



   
   <?php include'footer.php'; ?>
    </div>
    <?php include'footer-link.php'; ?>
</body>
</html>


<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>