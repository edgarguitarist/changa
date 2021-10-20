<?php
include('dbcon.php');
if (isset($_POST['delete_paralelo'])){
	if ($_POST['selector']!=null){
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con,"DELETE FROM paralelo where paralelo_id='$id[$i]'");
		}
		header("location: paralelo.php");
	}else{
		header("location: paralelo.php");
	}
}else{
	header("location: paralelo.php");
}
?>