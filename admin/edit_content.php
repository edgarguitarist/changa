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
					<a href="" class="btn btn-info"><em class="icon-plus-sign icon-large"></em> Agregar Contenido</a>
					<!-- block -->
					<div class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Editar Contenido</div>
						</div>
						<div class="block-content collapse in">
							<a href="content.php"><em class="icon-arrow-left"></em> Volver</a>
							<?php
							$query = mysqli_query($con, "select * from content where content_id = '$get_id'") or die(mysqli_error($con));
							$row = mysqli_fetch_array($query);
							?>

							<form class="form-horizontal" method="POST">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Titulo</label>
									<div class="controls">
										<input type="text" name="title" id="inputEmail" placeholder="Titulo Evento" value="<?php echo $row['title']; ?>">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputPassword">Contenido</label>
									<div class="controls">
										<textarea name="content" id="ckeditor_standard">
												<?php echo $row['content']; ?>
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
								$title = $_POST['title'];
								$content = $_POST['content'];
								mysqli_query($con, "update content set title = '$title' , content = '$content' where content_id = '$get_id'") or die(mysqli_error($con));
							?>
								<script>
									window.location = 'content.php';
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