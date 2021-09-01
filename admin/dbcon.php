<?php
//mysqli_select_db('capstone',mysql_connect('localhost','root',''))or die(mysqli_error($con));
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'platea21_virtual';
$con = mysqli_connect("$host", "$user", "$pass", "$name");

// Check connection
if (mysqli_connect_errno()) {  
  echo "<script>console.log(':C')</script>";
  mysqli_close($con);
  $bandera = true;
}else{
  echo "<script>//console.log('Usted esta en el entorno Local')</script>";
  mysqli_query($con, "SET NAMES 'utf8'");
}

if($bandera){
  $host = 'localhost';
  $user = 'u440807742_prueba';
  $pass = '1q2w3e4r5t6Y';
  $name = 'u440807742_prueba';
  $con = mysqli_connect("$host", "$user", "$pass", "$name");
  echo "<script>console.log('C:')</script>";
  mysqli_query($con, "SET NAMES 'utf8'");
}


?>