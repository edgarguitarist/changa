<?php
include('dbcon.php');
if (isset($_POST['delete_class'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM class where class_id='$id[$i]'");
		}
		header("location: class.php");
	} else {
		header("location: class.php");
	}
} else {
	header("location: class.php");
}
?>