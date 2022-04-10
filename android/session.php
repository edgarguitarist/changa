<?php
include '../dbcon.php';

if (isset($_GET["usuario"]) && isset($_GET["contrasena"])) {

    $username = $_GET["usuario"];
    $contrasena = $_GET["contrasena"];

    $consulta = "SELECT *FROM student WHERE username = '$username' AND password = '$contrasena'";
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
        $results["class_id"] = '';
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
