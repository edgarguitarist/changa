<form id="signin_student" onkeyup="crearUsername()" class="form-signin" method="post">
	<h3 class="form-signin-heading"><em class="icon-lock"></em> Registrar como Estudiante</h3>
	<input type="text" class="input-block-level" id="code" name="code" placeholder="Código del Curso (06 Caracteres)" minlength="6" maxlength="6" required>
	<input type="text" onkeyup="checkCedula(this, 'signin')" class="input-block-level solo-numeros" maxlength="10" id="dni" name="dni" placeholder="Cedula" required>
	<span id="dni_error" style="margin: 0; margin-top: -10px; color:red; font-size:smaller; font-weight: bold;"></span>
	<input type="text" class="input-block-level solo-letras" id="firstname" name="firstname" placeholder="Nombre" required>
	<input type="text" class="input-block-level solo-letras" id="lastname" name="lastname" placeholder="Apellido" required>
	<input type="text" class="input-block-level" id="username2" name="username2" placeholder="Nombre de usuario" disabled >
	<input type="hidden" class="input-block-level" id="username" name="username" placeholder="Nombre de usuario" required>
	
	<!-- <label>Curso</label>
	<select name="class_id" class="input-block-level span5">
		<option></option>
		<?php
		$query = mysqli_query($con, "select * from class order by class_name ") or die(mysqli_error($con));
		while ($row = mysqli_fetch_array($query)) {
		?>
			<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
		<?php
		}
		?>
	</select> -->
	<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
	<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Repita Contraseña" required>
	<div class="center">
		<button id="signin" name="login" class="btn btn-success" type="submit"><em class="icon-check icon-large"></em> Registrar</button>
	</div>
</form>



<script>

	function crearUsername(){
		var dni = $("#dni").val();
		var lastname = $("#lastname").val();
		var firstname = $("#firstname").val();
		var username = firstname.substring(0,1).toLowerCase() + "." + lastname.toLowerCase() + dni.substring(7,10);
		username = username == "." ? "" : username;
		$("#username").val(username);
		$("#username2").val(username);
	}

	jQuery(document).ready(function() {
		jQuery("#signin_student").submit(function(e) {
			e.preventDefault();

			var password = jQuery('#password').val();
			var cpassword = jQuery('#cpassword').val();
			var code = jQuery('#code').val().length;
			//($(".txtReasonDecline").val().length == 0)
			if (code == 6) {
				if (password == cpassword) {
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "signup_student_data.php",
						data: formData,
						success: function(html) {
							if (html == 'new') {
								$.jGrowl("Bienvenido al Sistema Lecto-Escritura", {
									header: 'Registro Exitoso'
								});
								var delay = 3000;
								setTimeout(function() {
									window.location = 'index.php'
								}, delay);
							} else if (html == 'student') {
								$.jGrowl("Estudiante no registrado en la base de datos, Por favor verifique su codigo, nombres y apellidos, cedula", {
									header: 'Registro Fallido'
								});
							} else if (html == 'codigo') {
								$.jGrowl("Por Favor, Verifique el codigo ingresado", {
									header: 'Codigo no Existe'
								});
							}
						}
					});
				} else {
					$.jGrowl("Revise su contraseña por favor", {
						header: 'Las contraseñan no Coinciden'
					});
				}
			} else {
				$.jGrowl("El código debe ser de 06 Caracteres", {
					header: 'Error Código '
				});
			}
		});
	});
</script>


<div class="center">
	<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn btn-success" type="submit"><em class="icon-signin icon-large"></em> Regresar</a>
</div>