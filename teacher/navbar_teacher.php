	<div class="navbar navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Bienvenido al Sistema Lecto-Escritura</a>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						<?php $query = mysqli_query($con, "select * from teacher where teacher_id = '$session_id'") or die(mysqli_error($con));
						$row = mysqli_fetch_array($query);
						?>
						<li class="dropdown">
							<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<em class="icon-user icon-large"></em><?php echo $row['firstname'] . " " . $row['lastname'];  ?> <em class="caret"></em></a>
							<ul class="dropdown-menu">
								<li>
									<a href="change_password_teacher.php"><em class="icon-circle"></em> Cambiar Contraseña</a>
									<a href="#myModal" data-toggle="modal"><em class="icon-picture"></em> Cambiar imagen de perfil</a>
									<a href="profile_teacher.php"><em class="icon-user"></em> Perfil</a>
								</li>
								<li class="divider"></li>
								<li><a href="logout.php"><em class="icon-signout"></em>&nbsp;Cerrar Sesión</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<?php include('avatar_modal.php'); ?>