<?php
include('../dbcon.php');
$contador=0;
if (isset($_POST['dni'])){
    $dni = $_POST['dni'];
    $consulta="SELECT * FROM student WHERE dni= '$dni'";
    $resultado=mysqli_query($con,$consulta);
    $contador1 = mysqli_num_rows($resultado);
    
    $consulta2="SELECT * FROM teacher WHERE dni= '$dni'";
    $resultado2=mysqli_query($con,$consulta2);
    $contador2 = mysqli_num_rows($resultado2);
    
    $contador = $contador1 + $contador2;
    echo $contador > 0 ? 'existe' : 'no existe';
}

?>