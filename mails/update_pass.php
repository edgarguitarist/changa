<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>CAMBIAR MI CONTRASEÑA</title>
	<?php //include "includes/scripts.php"; 
	?>

	<script src="https://uniwebsidad.com/static/libros/ejemplos/bootstrap-3/js/jquery.min.js" type="text/javascript"></script>
	<script src="https://uniwebsidad.com/static/libros/ejemplos/bootstrap-3/js/bootstrap.min.js" type="text/javascript"></script>

	<link href="./img/logo/logo.png" rel="icon">
	<link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="./css/ruang-admin.min.css" rel="stylesheet">
</head>

<body>
<?PHP
		if (isset($_GET["idus"])) {
			$idus = $_GET['idus'];
		}
		if (isset($_GET["info"])) {
			$estado = $_GET["info"];
			$success = "display:none";
			$error = "display:none";
			$claseE = "";
			$claseS = "";
			if ($estado == "success") {
				$success = "display: block; width: auto;";
				$mensaje = "<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Se ha Enviado el Correo!</strong>";
				$claseS = "alert alert-success alert-dismissable";
			}
			if ($estado == "error") {
				$error = "display: block; width: auto;";
				$mensaje = "<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Correo No Existe!</strong>";
				$claseE = "alert alert-danger alert-dismissable";
			}
			if ($estado == "warning") {
				$warning = "display: block; width: auto;";
				$mensaje = "<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Correo No Existe!</strong>";
				$claseW = "alert alert-warning alert-dismissable";
			}
		} else {
			$success = "display: none";
			$error = "display: none";
			$warning = "display: none;";
			$claseE = "";
			$claseS = "";
			$claseW = "";
		}
		?>

	

	<div style='background-image: url(img/fondo2.jpg);
    background-size: cover; height:100%;' class="conter-login">
      <div class="container-login">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div style='margin-top: 4rem!important; margin-bottom: 5rem!important;' class="card shadow-sm my-5">
              <div class="card-body p-0">
                <div style='margin-right: -1.75rem; margin-left: -1.75rem;' class="row">
                  <div class="col-lg-12">
                    <div style="margin-bottom: 25px;" class="login-form">
                      <div class="text-center">
                        <img style="margin: 0px 0px 15px 0px; max-width: 50%;" src="./img/res/contra.png" alt="correo">
                        <br>
                        <h1 class="h4 text-gray-900 mb-4">ACTUALIZAR CONTRASEÑA</h1>
                      </div>
                      <form method="POST" action="guarda_pass.php">
						<input type="hidden" id="idus" name="idus" value="<?php echo $idus; ?>" />
                        <div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Nueva Contraseña" required>
                        </div>

						<div class="form-group">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Contraseña" required>
						</div>

                        <div class="form-group">
                            <div class="<?php echo $claseS; ?>" style="<?php echo $success; ?>">
                                <?php echo isset($mensaje) ? $mensaje : ''; ?> 
                            </div>
                            <div class="<?php echo $claseE; ?>" style="<?php echo $error; ?>">
                                <?php echo isset($mensaje) ? $mensaje : ''; ?> 
                            </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">ACTUALIZAR</a>
                        </div>
                      </form>
                      <center><a href="./index.php">Iniciar Sesión</a></center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>