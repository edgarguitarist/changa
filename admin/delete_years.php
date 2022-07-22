<?php
include('dbcon.php');
if (isset($_POST['delete_year'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM school_year where school_year_id='$id[$i]'");
		}
		header("location: school_year.php");
	} else {
		header("location: school_year.php");
	}
} else {
	header("location: school_year.php");
}
?>