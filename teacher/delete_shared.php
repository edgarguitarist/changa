<?php
include('../admin/dbcon.php');
include('../session.php');
if (isset($_POST['share'])){
$id=$_POST['selector'];
$class_id = $_POST['teacher_class_id'];
/*  $get_id=$_POST['get_id'];  */
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"SELECT * from teacher_shared  where teacher_shared_id = '$id[$i]' ")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($result)){
	
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
/* 	$uploaded_by = $row['uploaded_by']; */

	
	
	mysqli_query($con,"insert into files (floc,fdatein,fdesc,class_id,fname,teacher_id) value('$floc',NOW(),'$fdesc','$class_id','$fname','$session_id')")or die(mysqli_error($con));
	
	
	}
}
?>
<script>
window.location = 'downloadable.php<?php echo '?id='.$class_id; ?>';
</script>
<?php } ?>