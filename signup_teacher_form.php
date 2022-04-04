			<form id="signin_teacher" onkeyup="crearUsername()" class="form-signin" method="post">
				<h3 class="form-signin-heading"><em class="icon-lock"></em> Registrar como Profesor</h3>
				<input type="text" onkeyup="checkCedula(this, 'signin')" class="input-block-level solo-numeros" minlength="10" maxlength="10" id="dni" name="dni" placeholder="Cedula" required>
				<span id="dni_error" style="margin: 0; margin-top: -10px; color:red; font-size:smaller; font-weight: bold;"></span>
				<input type="text" class="input-block-level solo-letras" id="firstname" name="firstname" placeholder="Nombre" required>
				<input type="text" class="input-block-level solo-letras" id="lastname" name="lastname" placeholder="Apellido" required>

				<input type="text" class="input-block-level solo-numeros" id="cellphone" name="cellphone" minlength="10" maxlength="10" placeholder="Celular" required>

				<input type="text" class="input-block-level" id="username2" name="username2" placeholder="Nombre de usuario" disabled>
				<input type="hidden" class="input-block-level" id="username" name="username" placeholder="Nombre de usuario" required>

				<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
				<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Repita Contraseña" required>
				<div class="center">
					<button id="signin" name="login" class="btn btn-success" type="submit"><em class="icon-check icon-large"></em> Registrar</button>
				</div>
			</form>
			<script>
				function crearUsername() {
					var dni = $("#dni").val();
					var lastname = $("#lastname").val();
					var firstname = $("#firstname").val();
					var username = firstname.substring(0, 1).toLowerCase() + "." + lastname.toLowerCase() + dni.substring(7, 10);
					username = username == "." ? "" : username;
					$("#username").val(username);
					$("#username2").val(username);
				}

				jQuery(document).ready(function() {
					jQuery("#signin_teacher").submit(function(e) {
						e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
						if (password == cpassword) {
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "signup_teacher_data.php",
								data: formData,
								success: function(html) {
									if (html == 'true') {
										$.jGrowl("Bienvenido al Sistema Lecto-Escritura", {
											header: 'Acceso Permitido'
										});
										var delay = 1000;
										setTimeout(function() {
											window.location = 'teacher/dasboard_teacher.php'
										}, delay);
									} else {
										$.jGrowl("Usuario ya existente", {
											header: 'Registro Fallido'
										});
									}
								}
							});

						} else {
							$.jGrowl("Las contraseñas no coinciden", {
								header: 'Registro Fallido'
							});
						}
					});
				});
			</script>
			<div class="center">
				<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn btn-success" type="submit"><em class="icon-signin icon-large"></em> Regresar</a>
			</div>