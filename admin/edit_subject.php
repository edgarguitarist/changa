<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>

			<div class="span9" id="content">
				<div class="row-fluid">
					<a href="add_subject.php" class="btn btn-info"><em class="icon-plus-sign icon-large"></em> Agregar Materia</a>
					<!-- block -->
					<div id="" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Editar Materia</div>
						</div>
						<div class="block-content collapse in">
							<a href="subjects.php"><em class="icon-arrow-left"></em> Atrás</a>

							<?php
							$query = mysqli_query($con, "select * from subject where subject_id = '$get_id'") or die(mysqli_error($con));
							$row = mysqli_fetch_array($query);
							?>

							<form class="form-horizontal" method="post">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Codigo Materia</label>
									<div class="controls">
										<input type="text" value="<?php echo $row['subject_code']; ?>" name="subject_code" id="inputEmail" placeholder="Codigo Materia">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Titulo de Materia</label>
									<div class="controls">
										<input type="text" value="<?php echo $row['subject_title']; ?>" class="span8" name="title" id="inputPassword" placeholder="Titulo de Materia" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Número de Unidades</label>
									<div class="controls">
										<input type="text" value="<?php echo $row['unit']; ?>" class="span1" name="unit" id="inputPassword" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Descripcion</label>
									<div class="controls">
										<textarea name="description" id="ckeditor_standard">
													<?php echo $row['description']; ?>
													</textarea>
									</div>
								</div>



								<div class="control-group">
									<div class="controls tcenter">

										<button name="update" type="submit" class="btn btn-success"><em class="icon-save icon-large"></em> Actualizar</button>
									</div>
								</div>
							</form>

							<?php
							if (isset($_POST['update'])) {
								$subject_code = $_POST['subject_code'];
								$title = $_POST['title'];
								$unit = $_POST['unit'];
								$description = $_POST['description'];



								mysqli_query($con, "update subject set subject_code = '$subject_code' ,
																		subject_title = '$title',
																		unit  = '$unit',
																		description = '$description'
																		where subject_id = '$get_id' ") or die(mysqli_error($con));

								mysqli_query($con, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Editar Materia $subject_code')") or die(mysqli_error($con));

							?>
								<script>
									window.location = "subjects.php";
								</script>
							<?php
							}


							?>


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