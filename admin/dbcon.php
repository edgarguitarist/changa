<?php
//mysqli_select_db('capstone',mysql_connect('localhost','root',''))or die(mysqli_error($con));
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'platea21_virtual';
$con = mysqli_connect("$host", "$user", "$pass", "$name");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $user = 'u440807742_prueba';
  $pass = '1q2w3e4r5t6Y';
  $name = 'u440807742_prueba';
  $con = mysqli_connect("$host", "$user", "$pass", "$name");
}

mysqli_query($con, "SET NAMES 'utf8'");
?>