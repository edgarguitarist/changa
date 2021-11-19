<?php
include('../admin/dbcon.php');
$get_game_id = $_GET['game'];
$get_class = $_GET['class'];
$get_status = $_GET['status'];
$get_word = $_GET['word'];
if($get_status == "Activated"){
    $status = "Desactivated";
}else{
    $status = "Activated";
}

$query = mysqli_query($con, "SELECT * FROM games_words_class WHERE game_word_id= $get_word AND game_id= $get_game_id AND games_class_id= $get_class") or die(mysqli_error($con));

if (mysqli_num_rows($query)>0){
    mysqli_query($con,"UPDATE games_words_class SET status = '$status' WHERE game_word_id = $get_word AND game_id = $get_game_id AND games_class_id = $get_class");
    header('location:games_edit.php?id='.$get_class.'&game='.$get_game_id);
}else{
    mysqli_query($con,"INSERT INTO games_words_class (games_class_id, game_id, game_word_id) VALUES ($get_class, $get_game_id, $get_word)");
    header('location:games_edit.php?id='.$get_class.'&game='.$get_game_id);
}
