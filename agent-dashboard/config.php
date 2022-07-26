<?php
session_start();
// $con = mysqli_connect("localhost", "weban82x_shubham", "H2#o;vO-J1a2", "weban82x_shubham_property") or die("Error " . mysqli_error($con));

//  include('../credentials.php');
$con = mysqli_connect("localhost", "root", "", "shubham_property") or die("Error " . mysqli_error($con));


$base_url = 'http://shubhamproperty.in/';

if (isset($_SESSION['AGNETLOGIN']) == 'Active') {
  $agent = $_SESSION['agent_login'];
  $queryi = "SELECT * FROM `tbl_agent` WHERE `agent_id` = '" . $agent . "'";
  $ras = mysqli_query($con, $queryi);
  $agentdata = mysqli_fetch_array($ras);
}
function slug($text, string $divider = '')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
