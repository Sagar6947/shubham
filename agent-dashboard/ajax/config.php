<?php
session_start();
// $con = mysqli_connect("localhost", "exzpblvz_remax", "remaxproperty#2021", "exzpblvz_remax") or die("Error " . mysqli_error($con));
 include('../credentials.php');




    if(isset($_SESSION['AGNETLOGIN']) == 'Active')
 {
     $agent = $_SESSION['agent_login'];
     $queryi = "SELECT * FROM `tbl_agent` WHERE `agent_id` = '".$agent."'";
     $ras = mysqli_query($con,$queryi);
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

 