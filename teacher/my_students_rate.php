<?php 
include('header_dashboard.php'); 
include('../session.php');  
$get_id = $_GET['id'];  
$get_class = $_GET['class']; 
$select_student = "SELECT * FROM student WHERE student_id = '$get_id'";
$result_student = mysqli_query($con, $select_student);
$row_student = mysqli_fetch_array($result_student);
$name_student = $row_student['firstname'] . " " . $row_student['lastname'];
?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_class.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<?php include('my_students_breadcrums.php'); ?>
					<div class="right">
						<a href="add_student.php<?= '?id=' . $get_id; ?>" class="btn btn-info"><em class="icon-plus-sign"></em> Agregar Estudiante</a>
					</div>
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="span3"></div>
						<div style="margin-top: 10%;" class="span6">
							<form action="my_students_update.php" method="POST">
								<h4 class="form-signin-heading"><em class="icon-plus-sign"></em> Observaciones</h4>
								<input type="hidden" name="student" value="<?= $get_id ?>">
								<input type="hidden" name="class" value="<?= $get_class ?>">
								<div style="display: flex; justify-content: space-between;">
									<h5>Estudiante: </h5>
									<input type="text" style="width: 80% !important;" value="<?= $name_student ?>" disabled>
								</div>
								<div style="display: flex; justify-content: space-between;">
									<h5>Parcial: </h5>
									<select name="parcial" style="width: 80% !important;" required>
										<option value="">Seleccione</option>
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
								</div>
								<div style="display: flex; justify-content: space-between;">
									<h5>Observación: </h5>
									<textarea maxlength="250" type="text" style="width: 82% !important; max-width: 82% !important; height: 100px;" class="input-block-level" name="observation" id="observacion" placeholder="Observación" required></textarea>
								</div>
								<div style="display: flex; justify-content: center;">
									<button id="signin" name="add" class="btn btn-success" type="submit"><em class="icon-save"></em> Guardar</button>
								</div>
							</form>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>