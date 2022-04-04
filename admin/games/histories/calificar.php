<?php
include '../../dbcon.php';
$id_history = $_POST['id_history'];
$id_teacher = $_POST['id_teacher'];
$id_class = $_POST['id_class'];
$nota = $_POST['nota'];

$query = "UPDATE histories SET revisado = 1, calificacion = '$nota' WHERE id_history = '$id_history'";

$result = mysqli_query($con, $query);

echo '<script>window.location.href = "index2.php?id_teacher=' . $id_teacher . '&id_class=' . $id_class . '";</script>';

