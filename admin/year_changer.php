<?php
include('dbcon.php');
$get_id = $_GET['id'];
$get_status = $_GET['status'];
if($get_status == "Activated"){
    $status = "Desactivated";
}else{
    $status = "Activated";
}

mysqli_query($con,"update school_year set status = '$status' where school_year_id = '$get_id'");
header('location:school_year.php');
?>