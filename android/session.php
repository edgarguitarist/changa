<?php
include '../dbcon.php';

if (isset($_GET["usuario"]) && isset($_GET["contrasena"])) {

    $username = $_GET["usuario"];
    $contrasena = $_GET["contrasena"];

    $consulta = "SELECT * FROM student stu LEFT JOIN student_observation so ON stu.student_id = so.id_student INNER JOIN teacher_class tc ON tc.class_id = stu.class_id WHERE stu.username = '$username' AND stu.password = '$contrasena'";
    $resultado = mysqli_query($con, $consulta);
    if ($resultado) {

        if ($reg = mysqli_fetch_array($resultado)) {
            $json['datos'][] = $reg;
        }
        mysqli_close($con);
        echo json_encode($json);
    } else {
        $results["student_id"] = '';
        $results["username"] = '';
        $results["password"] = '';
        $results["firstname"] = '';
        $results["lastname"] = '';
        $results["teacher_class_id"] = '';
        $results["location"] = '';
        $json['datos'][] = $results;
        echo json_encode($json);
    }
} else {
    $results["student_id"] = '';
    $results["username"] = '';
    $results["password"] = '';
    $results["firstname"] = '';
    $results["lastname"] = '';
    $results["class_id"] = '';
    $results["location"] = '';
    $json['datos'][] = $results;
    echo json_encode($json);
}
