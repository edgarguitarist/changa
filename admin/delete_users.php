<?php
include('dbcon.php');
if (isset($_POST['delete_user'])) {
	if ($_POST['selector'] != null) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM users where user_id='$id[$i]'");
		}
		header("location: admin_user.php");
	} else {
		header("location: admin_user.php");
	}
} else {
	header("location: admin_user.php");
}
?>