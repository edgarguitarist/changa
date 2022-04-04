<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

//TODO: REVISAR SI UN ESTUDIANTE PUEDE ACCEDER COMO PROFESOR Y VICEVERSA
// if($role != $_SESSION['role']){
//     //header("location: index.php");
//     //exit();
// }


$session_id=$_SESSION['id'];
?>