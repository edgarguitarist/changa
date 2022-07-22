<?php
include('dbcon.php');
$get_id = $_GET['id'];
$get_status = $_GET['status'];
if($get_status == "Activated"){
    $status = "Desactivated";
}else{
    $status = "Activated";
}

mysqli_query($con,"UPDATE school_year SET status = '$get_status' WHERE school_year_id != '$get_id'");
mysqli_query($con,"UPDATE school_year SET status = '$status' WHERE school_year_id = '$get_id' AND STATUS = '$get_status'");

header('location:school_year.php');
?>