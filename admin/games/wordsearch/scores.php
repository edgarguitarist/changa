<?php
include '../../dbcon.php';

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



$query = "INSERT INTO games_class_student (id_student, id_class, id_game, score, id_game_class) VALUES ('$user_id', '$class_id', '$game_id', '$score' ,'$games_class_id')";

$result = mysqli_query($con, $query);

if ($result) {
    echo "Datos Guardados";
}else{
    echo "Error, al guardar los datos";
}
