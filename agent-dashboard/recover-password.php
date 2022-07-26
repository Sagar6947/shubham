<?php include 'config.php';
if(isset($_SESSION['agent_login'])  == '')
{
    //echo' <script>window.location=""</script>';
  
}
else{
    echo '<script>window.location="profile.php"</script>';
}  

$message = '';
if (isset($_POST["submit"])) {

    $email = $_POST['email'];
   
    $f = "SELECT * FROM `tbl_agent` WHERE `agent_email` = '" . $email . "' ";
   
    $resultx = mysqli_query($con, $f);
    $count = mysqli_num_rows($resultx);

    if ($count > 0) {
        $row = mysqli_fetch_array($resultx);
        
        if ($row['agent_status'] == '0') {
            
            $message = '<div class="text text-danger" >
           Your account has been deactivated. Please contact the administrator. 
           </div>';
            
        }
        
        
        else {
            
            $ToEmail = $_POST['email'];

            $EmailSubject = 'Recover Password ';

            $mailheader = 'From: RE/MAX Realty Services<info@remaxrealty.in>' . "\n";
            $mailheader .= "Reply-To:   info@remaxrealty.in\r\n";
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

            $msg .= "Hello " . $row['agent_name'] .  ("<br>");
            $msg .= "Your account password has been recovered  please check your login credentials below" . ("<br>");
            $msg .= "Email: " . $row['agent_email'] . ("<br>");
            $msg .= "Password: " . $row['agent_pass'] . ("<br>") . ("<br>");
            
            $msg .= "Click Here To Login:  <a href='https://www.remaxrealty.in/agent-dashboard/' class='btn btn-dark'>Login Now</a> ";
          

            $send =  mail($ToEmail,  $EmailSubject, $msg, $mailheader) or die("Failure");
            
            if($send)
            {
                 $message = '<div class="text text-success h4">
 Please Check Your Mail To Get your Password   
</div>';
            }
            
        } 
    } 
    
    
    else {
        $message = '<div class="text text-danger">
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
            <div class="login-box card" style="max-width:450px">
                <div class="card-body">

                    <div class="row">
                        
                            <div class="col-md-12">
                             <form method="post" enctype="multipart/form-data" >
                        <h3 class="box-title m-b-20">Recover Password</h3>
                        
                        <p><?= $message; ?></p>
                       
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="Enter Your Email">
                            </div>
                        </div>
                        <div class="form-group text-center p-b-10">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg w-100 text-uppercase waves-effect waves-light text-white" name="submit" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>