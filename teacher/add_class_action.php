<?php
include('../admin/dbcon.php');
$session_id = $_POST['session_id'];
$subject_id = $_POST['subject_id'];
$class_id = $_POST['class_id'];
$school_year = $_POST['school_year'];
$paralelo_id = $_POST['paralelo_id'];
$code = $_POST['code'];

$query = mysqli_query($con, "SELECT * from teacher_class where subject_id = '$subject_id' and class_id = '$class_id' and school_year = '$school_year' and paralelo_id = '$paralelo_id' OR code = '$code' ") or die(mysqli_error($con));
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
if ($count > 0) {
    $resp =  $row['code'] == $code ? "false" : "true";
    echo $resp;
} else {

    mysqli_query($con, "INSERT INTO teacher_class (teacher_id,subject_id,class_id,thumbnails,school_year,paralelo_id) VALUES('$session_id','$subject_id','$class_id','admin/uploads/thumbnails.jpg','$school_year','$paralelo_id')") or die(mysqli_error($con));

    $teacher_class = mysqli_query($con, "SELECT * FROM teacher_class ORDER BY teacher_class_id DESC") or die(mysqli_error($con));
    $teacher_row = mysqli_fetch_array($teacher_class);
    $teacher_id = $teacher_row['teacher_class_id'];


    $insert_query = mysqli_query($con, "SELECT * FROM student WHERE class_id = '$class_id' AND cod_ciclo='$school_year' AND paralelo = '$paralelo_id'") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($insert_query)) {
        $id = $row['student_id'];
        mysqli_query($con, "insert into teacher_class_student (teacher_id,student_id,teacher_class_id) value('$session_id','$id','$teacher_id')") or die(mysqli_error($con));
        echo "yes";
    }
}
