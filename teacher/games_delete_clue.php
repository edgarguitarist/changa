<?php

include('../admin/dbcon.php');



$id = $_GET['id'];
$game = $_GET['game'];
$clue = $_GET['clue'];
$games_words_class_id = $_GET['games_words_class_id'];

$queryDelete = "DELETE FROM games_words_clue WHERE games_words_class_id = '$games_words_class_id'";

$resultDelete = mysqli_query($con, $queryDelete);
if ($resultDelete) {
    header('location: games_edit.php?id=' . $id . '&game=' . $game);
} else {
    echo "Error, retroceda y vuelva a intentarlo";
}
