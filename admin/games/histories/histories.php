<?php
include '../../dbcon.php';

$id_student  = $_POST['id_student'];
$id_class = $_POST['id_class'];
$title   = $_POST['title'];
$content = $_POST['content'];

########################## SUBIDOR DE FOTO #############################
$timeStamp = new DateTime();
$namePhoto = $timeStamp->getTimestamp();
$today = date("Y-m-d");

$path = "../../uploads/";
$ext = pathinfo($_FILES['img_cuento']['name'] ?? "", PATHINFO_EXTENSION);

$uploaded_photo = $path . $namePhoto . '.' . $ext;
$path_photo = "uploads/" . $namePhoto . '.' . $ext;
move_uploaded_file($_FILES['img_cuento']['tmp_name'], $uploaded_photo);

$img_cuento = $path_photo;
#########################################################################

$query = "INSERT INTO histories (id_student, id_class, title, content, imagen) VALUES ('$id_student', '$id_class', '$title', '$content', '$img_cuento')";

$result = mysqli_query($con, $query);

if (!$result) {
  header( "Location: index.php?id_student=$id_student&id_class=$id_class&success=false" );
}else{
    header( "Location: index.php?id_student=$id_student&id_class=$id_class&success=true" );
}

