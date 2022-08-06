<?php
session_start();

$con = mysqli_connect("localhost", "weban82x_shubham", "H2#o;vO-J1a2", "weban82x_shubham_property") or die("Error " . mysqli_error($con));

$con = mysqli_connect("localhost", "root", "", "shubham") or die("Error " . mysqli_error($con));

function slug($text, string $divider = '')
{
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, $divider);
  $text = preg_replace('~-+~', $divider, $text);
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
