<?php
include('../admin/dbcon.php');
$get_id = $_GET['id'];
$get_class = $_GET['class'];
$get_status = $_GET['status'];
if($get_status == "Activated"){
    $status = "Desactivated";
}else{
    $status = "Activated";
}

$user_query = mysqli_query($con, "SELECT * FROM games_class WHERE teacher_class_id= $get_class AND game_id= $get_id") or die(mysqli_error($con));

if (mysqli_num_rows($user_query)>0){
    mysqli_query($con,"update games_class set status = '$status' where game_id = '$get_id'");
    header('location:games_teacher.php?id='.$get_class);
}else{
    mysqli_query($con,"INSERT INTO games_class (teacher_class_id, game_id) VALUES ($get_class, $get_id)");
    header('location:games_teacher.php?id='.$get_class);
}
?>