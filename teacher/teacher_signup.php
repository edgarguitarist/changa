<?php
include('../admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$paralelo_id = $_POST['paralelo_id'];

$query = mysqli_query($con,"select * from teacher where  firstname='$firstname' and lastname='$lastname' and paralelo_id = '$paralelo_id'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
$id = $row['teacher_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($con,"update teacher set username='$username',password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error($con));
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>