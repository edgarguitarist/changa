<?php
include('dbcon.php');
if (isset($_POST['delete_subject'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM subject where subject_id='$id[$i]'");
		}
		header("location: subjects.php");
	} else {
		header("location: subjects.php");
	}
} else {
	header("location: subjects.php");
}
?>