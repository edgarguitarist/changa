<?php
include('../admin/dbcon.php');

if(isset($_POST['id']) && isset($_POST['get_id'])){
	$id = $_POST['id'];
	$get_id = $_POST['get_id'];
	mysqli_query($con,"delete from assignment where assignment_id = '$id' ")or die(mysqli_error($con));
}
?>
<script>
	window.location = 'assignment.php<?php echo '?id='.$get_id; ?>'
</script>