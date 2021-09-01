<!DOCTYPE html>
<html lang="es">
<?php $titulo = "Recuperar Password"; ?>
<?php include "includes/clases.php" ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/styles.php" ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
</head>

<body class="has-background-white">

<?PHP
    if (isset($_GET["info"])) {
        $estado = $_GET["info"];
        $success = "display:none";
        $error = "display:none";
        $claseE ="";
        $claseS ="";
        if ($estado == "success") {
            $success = "display: block; width: auto;";
            $mensaje = "<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Se ha Enviado el Correo!</strong>";
            $claseS ="alert alert-success alert-dismissable";
        }
        if ($estado == "error") {
            $error = "display: block; width: auto;";
            $mensaje = "<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Correo No Existe!</strong>";
            $claseE ="alert alert-danger alert-dismissable";
        }
    } else {
        $success = "display: none";
        $error = "display: none";
        $claseE ="";
        $claseS ="";
    }
    ?>
   
    <div style='background-image: url(img/fondo2.jpg);
    background-size: cover; height:100%;' class="conter-login">
      <div class="container-login">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div style='margin-top: 7rem!important; margin-bottom: 5rem!important;' class="card shadow-sm my-5">
              <div class="card-body p-0">
                <div style='margin-right: -1.75rem; margin-left: -1.75rem;' class="row">
                  <div class="col-lg-12">
                    <div style="margin-bottom: 25px;" class="login-form">
                      <div class="text-center">
                        <img style="margin: 0px 0px 15px 0px; max-width: 50%;" src="./img/res/correo.png" alt="correo">
                        <br>
                        <h1 class="h4 text-gray-900 mb-4">Recuperar Contraseña</h1>
                      </div>
                      <form method="POST" action="enviar_correo.php">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Ingrese su Correo" required>
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
                          <button type="submit" class="btn btn-primary btn-block">ENVIAR</a>
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