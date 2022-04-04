<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Descripcion" content="Sistema Lecto-Escritura">
    <meta name="keywords" content="">
    <meta name="author" content="Genesis Lizano - Andres Jurado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=utf-8">

    <!-- Bootstrap -->
    <link rel="icon" type="image/png" href="../../images/logo.png" />
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../../bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="../../bootstrap/css/my_style.css" rel="stylesheet" media="screen">
    <link href="../../bootstrap/css/print.css" rel="stylesheet" media="print">
    <link href="../../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="../../assets/styles.css" rel="stylesheet" media="screen">

    <script src="../../vendors/jquery-1.9.1.min.js"></script>
    <script src="../../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- data table -->
    <link href="../../assets/DT_bootstrap.css" rel="stylesheet" media="screen">


    <!-- wysiwug  -->
    <link rel="stylesheet" type="text/css" href="../../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
    </link>

    <script src="../../vendors/jGrowl/jquery.jgrowl.js"></script>
    <script src="../../js/icons.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include '../../dbcon.php';
    $id_student = $_GET['id_student'];
    $id_class = $_GET['id_class'];
    $id_history = $_GET['id_history'];
    ?>
    <a class="btn btn-info" style="font-size:large; padding: 10px 20px; margin-bottom:20px !important; margin-left:40px !important;" href="index.php?id_student=<?= $id_student ?>&id_class=<?= $id_class ?>"><em class="fas fa-undo-alt"></em> Regresar</a>

    <div style="margin: 0 20px;">
        <?php
        $query = "SELECT * FROM histories WHERE id_student = '$id_student' AND id_class = '$id_class' AND id_history = '$id_history'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <h1 class="title-fabula"><?= $row['title'] ?></h1>
        <div>
            <img class="image-fabula" src="../../<?= $row['imagen'] ?>" alt="<?= $row['title'] ?>">
            <div style="margin-top: 30px;" class="content-fabula">
                <?= $row['content'] ?>
            </div>
        </div>

    </div>
</body>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="../../assets/scripts.js"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({
            animate: 1000
        });
    });
</script>
<!-- data table -->
<script src="../../vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/DT_bootstrap.js"></script>

</html>