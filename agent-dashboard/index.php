<?php include 'config.php';
if(isset($_SESSION['agent_login'])  == '')
{
    //echo' <script>window.location=""</script>';
  
}
else{
    echo '<script>window.location="profile.php"</script>';
}  

$msg = '';
if (isset($_POST["submit"])) {

    $email = $_POST['username'];
    $password = $_POST['password'];
    $f = "SELECT * FROM `tbl_agent` WHERE `agent_email` = '" . $email . "'";



    $resultx = mysqli_query($con, $f);

    $count = mysqli_num_rows($resultx);

    if ($count > 0) {
        $row = mysqli_fetch_array($resultx);
        
        if ($row['agent_status'] == '0') {
            
            $msg = '<div class="text text-danger" >
        Your account has been deactivated. Please contact the administrator. 
</div>';
            
        }
        
        
        else if ($row['agent_pass'] == $password) {
            $_SESSION['AGNETLOGIN'] = 'Active';
            $_SESSION['agent_login'] = $row['agent_id'];
            echo '<script>window.location="home.php"</script>';
        } else {

            $msg = '<div class="text text-danger" >
        Password is Incorrect
</div>';
        }
    } else {
        $msg = '<div class="text text-danger">
    No Account found with this username
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
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body class="skin-default card-no-border">
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <img src="images/agent.jpg" width="100%"  /> 
                        
                        </div>
                            <div class="col-md-6">
                            <form method="post" enctype="multipart/form-data" >
                                    <div class="row">
      
                            <h3 class="text-center m-b-20"><b>LOG IN TO <span class="red">Shubham Property </span>DASHBOARD</b></h3>
                            <p><?=  $msg; ?></p>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="username" placeholder="Enter Your Email">
                                <label for="tb-fname">Email</label>  
                                </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="*******">
                                <label for="tb-fname">Password</label>  
                                </div>
                                </div>
                            </div>
                              <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ms-auto">
                                        <a href="recover-password.php" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit" name="submit">Log In</button>
                                </div>
                            </div>

                        </form>

                            </div>

                    </div>
                </div>
            </div>
    </section>
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>