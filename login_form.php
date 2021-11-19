<!-- block -->

<form id="login_form1" class="form-signin" method="post">
	<h3 class="form-signin-heading"><em class="icon-lock"></em> Iniciar Sesión</h3>
	<div class="control-group">
		<div class="controls">
			<input type="text" class="input-block-level" id="username" name="username" placeholder="Usuario" required>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
		</div>
	</div>

	<button data-placement="right" title="Iniciar Sesión" id="signin" name="login" class="btn btn-success" type="submit"><em class="icon-signin icon-large"></em> Iniciar Sesión</button>

	<a href='admin/' class="btn btn-info" style="float: right;"><em class="icon-user icon"></em>&nbsp;Administrador</a>
	<script>
		$(document).ready(function() {
			$('#signin').tooltip('show');
			$('#signin').tooltip('hide');
		});
	</script>
</form>

<script>
	jQuery(document).ready(function() {
		jQuery("#login_form1").submit(function(e) {
			e.preventDefault();
			var formData = jQuery(this).serialize();
			$.ajax({
				type: "POST",
				url: "login.php",
				data: formData,
				success: function(html) {
					if (html == 'true') {
						$.jGrowl("Cargando archivo, espere por favor......", {
							sticky: true
						});
						$.jGrowl("Bienvenido al Sistema Lecto-Escritura", {
							header: 'Acceso Permitido'
						});
						var delay = 1000;
						setTimeout(function() {
							window.location = 'teacher/dasboard_teacher.php'
						}, delay);
					} else if (html == 'true_student') {
						$.jGrowl("Bienvenido al Sistema Lecto-Escritura", {
							header: 'Acceso Permitido'
						});
						var delay = 1000;
						setTimeout(function() {
							window.location = 'student/student_notification.php'
						}, delay);
					} else {
						$.jGrowl("Porfavor revise su Usuario y Contraseña", {
							header: 'Inicio de Sesión Fallido'
						});
					}
				}
			});
			return false;
		});
	});
</script>

<div id="button_form" class="form-signin">
	<h4 class="tcenter">
		Si ya estas inscrito en el Sistema Lecto-Escritura, no necesitas registrarte!!
	</h4>
	<hr>
	<h3 class="form-signin-heading"><em class="icon-edit"></em> Registro</h3>
	<button data-placement="top" title="Registrarse como estudiante" id="signin_student" onclick="window.location='signup_student.php'" id="btn_student" name="login" class="btn btn-success" type="submit"><em class="icon-group icon"></em>&nbsp;Soy Estudiante</button>
	<div class="pull-right">
		<button data-placement="top" title="Registrarse como docente" id="signin_teacher" onclick="window.location='signup_teacher.php'" name="login" class="btn btn-success" type="submit"><em class="icon-user icon"></em>&nbsp;Soy Profesor</button>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#signin_student').tooltip('show');
			$('#signin_student').tooltip('hide');
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#signin_teacher').tooltip('show');
			$('#signin_teacher').tooltip('hide');
		});
	</script>
</div>
<div class="row-fluid">
	<div class="span9"></div>
</div>
</div>

<!-- /block -->