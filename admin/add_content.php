<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">

					<!-- block -->
					<div class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Agregar Contenido</div>
						</div>
						<div class="block-content collapse in">
							<a href="content.php"><em class="icon-arrow-left"></em> Atrás</a>


							<form class="form-horizontal" method="POST">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Title</label>
									<div class="controls">
										<input type="text" name="title" id="inputEmail" placeholder="Titulo Evento">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputPassword">Content</label>
									<div class="controls">
										<textarea name="content" id="ckeditor_standard">

												</textarea>
									</div>
								</div>



								<div class="control-group">
									<div class="controls tcenter">

										<button name="save" type="submit" class="btn btn-success"><em class="icon-save icon-large"></em> Guardar</button>
									</div>
								</div>
							</form>

							<?php
							if (isset($_POST['save'])) {
								$title = $_POST['title'];
								$content = $_POST['content'];
								mysqli_query($con, "insert into content (title,content) value('$title','$content')") or die(mysqli_error($con));
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