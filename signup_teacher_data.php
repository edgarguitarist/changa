<?php
include('admin/dbcon.php');
session_start();
$dni = $_POST['dni'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$cellphone = $_POST['cellphone'];
//$paralelo_id = $_POST['paralelo_id'];

$query = mysqli_query($con, "select * from teacher where firstname='$firstname' and lastname='$lastname'") or die(mysqli_error($con));
$count = mysqli_num_rows($query);

if ($count > 0) {
	echo 'false';
} else {
	mysqli_query($con, "INSERT INTO teacher(dni, firstname, lastname, username, password, phone) VALUES ('$dni', '$firstname', '$lastname', '$username', '$password', '$cellphone')") or die(mysqli_error($con));

	$query2 = mysqli_query($con, "select * from teacher where firstname='$firstname' and lastname='$lastname'") or die(mysqli_error($con));
	
	$row = mysqli_fetch_array($query2);
	$id = $row['teacher_id'];
	$_SESSION['id'] = $id;
	echo 'true';
}
