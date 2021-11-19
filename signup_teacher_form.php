			<form id="signin_teacher" class="form-signin" method="post">
					<h3 class="form-signin-heading"><em class="icon-lock"></em> Registrar como Profesor</h3>
					<input type="text" class="input-block-level"  name="lastname" placeholder="Apellidos" required>
					<input type="text" class="input-block-level"  name="firstname" placeholder="Nombres" required>
					<label>Materia</label>
					<select name="paralelo_id" class="input-block-level span12">
						<option></option>
						<?php
						$query = mysqli_query($con,"select * from paralelo order by paralelo_name ")or die(mysqli_error($con));
						while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['paralelo_id'] ?>"><?php echo $row['paralelo_name']; ?></option>
						<?php
						}
						?>
					</select>
					<input type="text" class="input-block-level" id="username" name="username" placeholder="Usuario" required>
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
					<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Repita Contraseña" required>
					<div class="center">
						<button id="signin" name="login" class="btn btn-success" type="submit"><em class="icon-check icon-large"></em> Registrar</button>
					</div>
			</form>
			<script>
			jQuery(document).ready(function(){
			jQuery("#signin_teacher").submit(function(e){
					e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "signup_teacher_data.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Bienvenido al Sistema Lecto-Escritura", { header: 'Acceso Permitido' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'teacher/dasboard_teacher.php'  }, delay);  
						}else{
							$.jGrowl("Su información no esta registrada en la basa de datos", { header: 'Registro Fallido' });
						}
						}
					});
			
					}else
						{
						$.jGrowl("su información no esta registrada en la base de datos", { header: 'Registro Fallido' });
						}
				});
			});
			</script>
			<div class="center">
				<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn btn-success" type="submit"><em class="icon-signin icon-large"></em> Regresar</a>
			</div>
			
			
			
				
		
					
		