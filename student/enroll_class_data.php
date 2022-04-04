<?php
include('../admin/dbcon.php');

$classCode = $_POST['classCode'];
$id = $_POST['id_student'];


$query = mysqli_query($con, "SELECT * FROM teacher_class WHERE code = '$classCode'") or die(mysqli_error($con));
$rows = mysqli_num_rows($query);
if ($rows > 0) {
    $row = mysqli_fetch_array($query);
    $class_id = $row['class_id'];
    $paralelo = $row['paralelo_id'];
    $ciclo = $row['school_year'];
    $subject_id = $row['subject_id'];
    $teacher_id = $row['teacher_id'];
    $teacher_class_id = $row['teacher_class_id'];
    $query = mysqli_query($con, "INSERT INTO teacher_class_student (teacher_id,student_id,teacher_class_id) VALUE('$teacher_id','$id','$teacher_class_id')  ") or die(mysqli_error($con));
    header(
        "Location: my_classmates.php?id=$teacher_class_id"
    );
}else{
    header("location:javascript://history.go(-1)");
}
