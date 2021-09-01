<?php
	include 'conexion.php';
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	
	$idus = base64_decode($_POST['idus']);
	$password = sha1(md5($_POST["password"]));
	$con_password = sha1(md5($_POST["con_password"]));
	
	if(validaPassword($password, $con_password))
	{
		$consulta="UPDATE usuarios SET password = '{$password}' WHERE email = '{$idus}'";
		$resultado=mysqli_query($conexion, $consulta);
			if($consulta){
				header('Location: index.php');}
			else{
				header('Location: update_pass.php?idus='.$_POST['idus'].'&info=error');
				echo "No se Pudieron Actualizar los Datos";	
				mysqli_close($conexion);
			}
		} else {
		header('Location: update_pass.php?idus='.$_POST['idus'].'&info=warning');
		echo 'Las contraseñas no coinciden';
		
	}
	
?>	