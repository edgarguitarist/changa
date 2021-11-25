<?php
include('../admin/dbcon.php');
include('../session.php');
if (isset($_POST['selector'])) {
	$id = $_POST['selector'];
	$N = count($id);
	if(isset($_POST['read'])){
		for ($i = 0; $i < $N; $i++) {	

			$query = mysqli_query($con, "SELECT * FROM notification_read Where student_id = '$session_id' AND notification_id = '$id[$i]'") or die(mysqli_error($con));
			$count = mysqli_num_rows($query);
			$rows = mysqli_fetch_array($query);
			$bol= $rows['student_read'] == 'yes' ? 'no' : 'yes';

			if($count == 0){
				mysqli_query($con, "INSERT INTO notification_read (student_id,student_read,notification_id) VALUES('$session_id','yes','$id[$i]')") or die(mysqli_error($con));
			}else {
				mysqli_query($con, "UPDATE notification_read SET student_read = '$bol' WHERE student_id = '$session_id' AND notification_id = '$id[$i]' ") or die(mysqli_error($con));
			}			
		}
	}
	if(isset($_POST['clear'])){
		for ($i = 0; $i < $N; $i++) {	
			mysqli_query($con, "UPDATE notification_read SET hided = 'yes' WHERE student_id = '$session_id' AND notification_id = '$id[$i]' ") or die(mysqli_error($con));
		}
	}

	header("location: student_notification.php");
}else{
	header("location: student_notification.php");
}
?>