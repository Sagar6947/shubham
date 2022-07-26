<?php include 'config.php';

if (isset($_POST['submit'])) {

  $name =  strip_tags($_POST['name']);
  $email =  strip_tags($_POST['email']);
  $phone =  strip_tags($_POST['number']);
  $message =  strip_tags($_POST['message']);
  $url = $_POST['url'];
  $query = "INSERT INTO `tbl_contact`(`name`, `number`, `email`, `message`) VALUES  ('" . $name . "'  ,'" . $phone . "'  , '" . $email . "', '" . $message . "')";
  $sal = mysqli_query($con, $query);

  $html_table = '<table border="1" cellspacing="0" cellpadding="2">';

  foreach ($_POST as $key => $value) {
    $html_table .= "<tr><th>" . ucwords(str_replace("_", " ", $key)) . "</th>";
    $html_table .= "<th>" . $value . "</th></tr>";
  }

  $html_table .= "<tr><th>IP Address :</th>";
  $html_table .= "<th>" . $_SERVER['REMOTE_ADDR'] . "</th></tr>";

  $html_table .= "<tr><th>Device :</th>";
  $html_table .= "<th>" . $_SERVER['HTTP_USER_AGENT'] . "</th></tr>";

  foreach ($_SESSION as $key => $value) {
    $html_table .= "<tr><th>" . ucwords(str_replace("_", " ", $key)) . "</th>";
    $html_table .= "<th>" . $value . "</th></tr>";
  }

  $html_table .= '</table>';

  $to = "hereshubhamenterprises@gmail.com";
  // $to = "theawzdigital@gmail.com";
  $subject = "Contact" . " - Shubham Properties";
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: Shubham Properties<info@shubhamproperty.in>' . "\n";
  $mail_result = mail($to, $subject, $html_table, $headers);

  if ($sal) {
    echo '<script>alert("Thank You for contacting Us. We will Contact You Soon!", "You clicked the button!", "success")</script>';
  } else {
    echo '<script>alert("something went wrong!", "You clicked the button!", "danger")</script>';
  }

  echo '<script>window.location="' . $url . '"</script>';
}
