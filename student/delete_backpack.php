<?php
include('../admin/dbcon.php');
if (isset($_POST['backup_delete'])){
	if($_POST['selector']!=null){
		$id=$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{
			$result = mysqli_query($con,"DELETE FROM student_backpack where file_id='$id[$i]'");
		}
		header("location: backpack.php");
	}else{
		header("location: backpack.php");
	}
}else{
	header("location: backpack.php");
}
?>