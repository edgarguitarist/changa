<?php 

include '../../dbcon.php';

$id_history = $_GET['id_history'];
$id_student = $_GET['id_student'];
$id_class = $_GET['id_class'];


$query = "DELETE FROM histories WHERE id_history = '$id_history' AND id_student = '$id_student' AND id_class = '$id_class'";
$result = mysqli_query($con, $query);

header("Location: index.php?id_student=$id_student&id_class=$id_class");

?>