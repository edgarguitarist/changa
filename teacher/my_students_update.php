<?php
include '../admin/dbcon.php'; 

$id = $_POST['student'];
$class = $_POST['class'];
$observation = $_POST['observation'];
$parcial =  $_POST['parcial'];


$select = "SELECT * FROM student_observation WHERE id_student = '$id' AND id_class = '$class'";
$result = mysqli_query($con, $select);
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    $update = "UPDATE student_observation SET observation = '$observation', parcial = '$parcial' WHERE id_student = '$id' AND id_class = '$class'";
    $result = mysqli_query($con, $update);    
}else{
    $insert = "INSERT INTO student_observation (id_student, id_class, observation, parcial) VALUES ('$id', '$class', '$observation', '$parcial')";
    $result = mysqli_query($con, $insert);
}

header("Location: my_students.php?id=$class");

?>