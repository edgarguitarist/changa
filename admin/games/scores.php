<?php
include '../../dbcon.php';
date_default_timezone_set('America/Guayaquil');
$user_id = $_POST["user_id"];
$class_id = $_POST["class_id"];
$game_id = $_POST["game_id"];
$score = $_POST["score"];

//TODO: Preguntar si ya existe un score y actualizarlo
//TODO: Hacer lo mismo con el crossword
//TODO: Mostrar el score en el progreso

$consulta = "SELECT games_class_id FROM games_class WHERE teacher_class_id = '$class_id' AND game_id = '$game_id'";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_array($resultado);
$games_class_id = $fila['games_class_id'];

$existe = "SELECT * FROM games_class_student WHERE id_student = '$user_id' AND id_class = '$class_id' AND id_game = '$game_id' AND id_game_class = '$games_class_id'";

$resultExiste = mysqli_query($con, $existe);

$rowExiste = mysqli_fetch_array($resultExiste);

$fechabase= strtotime($rowExiste['fecha']);
$fechabase = date('Y-m-d', $fechabase);

$fecha = date("Y-m-d");
$fechahora = date("Y-m-d H:i:s");

if(mysqli_num_rows($resultExiste) > 0 && $fechabase == $fecha){
    $query = "UPDATE games_class_student SET score = '$score', fecha = '$fechahora' WHERE id_student = '$user_id' AND id_class = '$class_id' AND id_game = '$game_id' AND id_game_class = '$games_class_id'";
    $result = mysqli_query($con, $query);
}else{
    $query = "INSERT INTO games_class_student (id_student, id_class, id_game, score, id_game_class, fecha) VALUES ('$user_id', '$class_id', '$game_id', '$score' ,'$games_class_id', '$fechahora')";
    $result = mysqli_query($con, $query);
}


if ($result) {
    echo "Datos Guardados";
}else{
    echo "Error, al guardar los datos";
}
