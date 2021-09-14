<?php
include('dbcon.php');
$get_id = $_GET['id'];
$get_status = $_GET['status'];
if($get_status == "Activated"){
    $status = "Desactivated";
}else{
    $status = "Activated";
}

mysqli_query($con,"update games set status = '$status' where game_id = '$get_id'");
header('location:games.php');
?>