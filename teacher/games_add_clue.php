<?php 

include('../admin/dbcon.php');



$id = $_POST['id'];
$game = $_POST['game'];
$clue = $_POST['clue'];
$games_words_class_id = $_POST['games_words_class_id'];


$queryInsert = "INSERT INTO games_words_clue (games_words_class_id,clue) VALUES ('$games_words_class_id', '$clue')"; 


$resultInsert = mysqli_query($con, $queryInsert);
if ($resultInsert){
    header('location: games_edit.php?id=' . $id . '&game=' . $game);
}else{
    echo "Error, retroceda y vuelva a intentarlo";
}

?>