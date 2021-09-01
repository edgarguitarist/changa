<?php
include('dbcon.php');
if (isset($_POST['delete_department'])){
	if ($_POST['selector']!=null){
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con,"DELETE FROM department where department_id='$id[$i]'");
		}
		header("location: department.php");
	}else{
		header("location: department.php");
	}
}else{
	header("location: department.php");
}
?>