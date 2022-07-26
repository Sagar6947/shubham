<?php
include("config.php");
$msg = '';
if (isset($_POST["submit"])) {

	$name = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$fg =  "SELECT * FROM `tbl_adminlogin` WHERE `username` ='" . $name . "' ";
	$result = mysqli_query($con, $fg);
	if ($row = mysqli_fetch_array($result)) {
		if ($row['pass'] == $password) {

			$_SESSION['Remaxproperty'] = $row['id'];
			echo '<script>window.location="home.php"</script>';
		} else {
			$msg =  "<h4 style='color:;'>Incorrect Username  or Password ! ! ! </h4>";
		}
	} else {
		$msg =  "<h4 style='color:red;'>no user with register name ! ! ! </h4>";
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
    <title>shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
  
</head>

<body class="skin-default card-no-border">
   <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="" method="post">
                        <h3 class="text-center m-b-20">LOG IN TO Shubham Property</h3>
                        <?php echo $msg; ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username"  name="username"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password"></div>
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
    </section>
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  
    
</body>
</html>