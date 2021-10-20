<?php
$hostname = 'localhost';
$username = 'u440807742_prueba';
$password = '1q2w3e4r5t6Y';

$username2 = 'root';
$password2 = '';

$dbname = 'u440807742_prueba';
#Para efectos del ejemplo supondremos que es la misma base de datos en ambas bases de datos tanto la remota como la local 

$con = @mysqli_connect($hostname, $username, $password);
#notese el @ antes del comando mysql_connect para evitar que arroje mensaje de error de PHP 

if (!($con)) {
  $con = @mysqli_connect($hostname, $username2, $password2) or die('No puedo conectarme a la base de datos local! Intentelo nuevamente.');
}

mysqli_select_db($con, $dbname);
mysqli_query($con, "SET NAMES 'utf8'");
?>