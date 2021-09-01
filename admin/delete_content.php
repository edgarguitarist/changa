<?php
include('dbcon.php');
if (isset($_POST['delete_content'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM content where content_id='$id[$i]'");
		}
		header("location: content.php");
	} else {
		header("location: content.php");
	}
} else {
	header("location: content.php");
}
?>