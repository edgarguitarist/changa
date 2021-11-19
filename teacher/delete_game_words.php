<?php
include('../dbcon.php');

if (isset($_POST['word_delete'])) {
	$get_id = $_GET['id'];
	$get_game_id = $_GET['game'];
	if (isset($_POST['selector'])) {
		$id = $_POST['selector'];
		$N = count($id);
		for ($i = 0; $i < $N; $i++) {
			$result = mysqli_query($con, "DELETE FROM games_words_class WHERE games_words_class_id = '$id[$i]'") or die(mysqli_error($con));
			//echo $id[$i];
		}
		header("location: games_edit.php?id=" . $get_id . "&game=" . $get_game_id);
	}else{
		header("location: games_edit.php?id=" . $get_id . "&game=" . $get_game_id);
	}
} else {
	header("location: games_edit.php?id=" . $get_id . "&game=" . $get_game_id);
	echo "<script>alert('No se ha seleccionado ninguna palabra');";
	echo "</script>";
}
?>