<?php
include('dbcon.php');
if (isset($_POST['delete_user'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM avisos where avisos_id='$id[$i]'");
		}
		header("location: add_announcement.php");
	}else{
		header("location: add_announcement.php");
	}
}else{
	header("location: add_announcement.php");
}
?>