 <?php
 include('admin/dbcon.php');
 include('session.php');
 
 
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "admin/uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];
								
								mysqli_query($con,"update  teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysqli_error($con));
								
								?>
 
								<script>
								window.location = "dasboard_teacher.php";  
								</script>

                       <?php     }  ?>