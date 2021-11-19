<?php include('header.php'); ?>

<body id="login">
	<div class="container">

		<form id="login_form" class="form-signin" method="post">
			<h3 class="form-signin-heading"><em class="icon-lock"></em> Identificarse</h3>
			<div class="control-group">
				<div class="controls">
					<input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Usuario" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
				</div>
			</div>
			<button name="login" class="btn btn-success" type="submit"><em class="icon-signin icon-large"></em> Iniciar Sesión</button>

			<a href='../index.php' class="btn btn-info"><em class="icon-backward icon"></em>&nbsp;Volver</a>
		</form>
		<script>
			jQuery(document).ready(function() {
				jQuery("#login_form").submit(function(e) {
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html) {
							if (html == 'true') {
								$.jGrowl("Bienvenido al Sistema Lecto-Escritura", {
									header: 'Acceso Permitido'
								});
								var delay = 2000;
								setTimeout(function() {
									window.location = 'dashboard.php'
								}, delay);
							} else {
								$.jGrowl("Por favor verifique su Usuario y Contraseña", {
									header: 'Login Failed'
								});
							}
						}

					});
					return false;
				});
			});
		</script>

	</div> <!-- /container -->
	<?php include('script.php'); ?>
</body>

</html>