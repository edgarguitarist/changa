<?php
include('admin/dbcon.php');
session_start();


//TODO: Hacer uno diferente para el Update de la password

$dni = $_POST['dni'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$code = $_POST['code'];
$username = $dni;

$consulta = mysqli_query($con, "SELECT * FROM teacher_class WHERE code = '$code'") or die(mysqli_error($con));
$rows = mysqli_num_rows($consulta);
$row = mysqli_fetch_array($consulta);
$class_id = $row['class_id'];
$paralelo = $row['paralelo_id'];
$ciclo = $row['school_year'];
$subject_id = $row['subject_id'];
$teacher_id = $row['teacher_id'];
if ($rows > 0) {
	$query = mysqli_query($con, "SELECT * FROM student WHERE username='$username' and firstname='$firstname' and lastname='$lastname'") or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		echo "student";
	} else{
		$query = mysqli_query($con, "INSERT INTO student(dni,username,password,firstname,lastname,class_id,paralelo,cod_ciclo) VALUES('$dni','$username','$password','$firstname','$lastname','$class_id','$paralelo','$ciclo')") or die(mysqli_error($con));
		echo "new";
	}
} else {
	echo "codigo";
}





/*
if ($count > 0){
	mysqli_query($con,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error($con));
	$_SESSION['id']=$id;
	echo 'true';
}else{
echo 'false';
}
*/