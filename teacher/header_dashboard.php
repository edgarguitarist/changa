<!DOCTYPE html>
<html lang="es" class="no-js">

<?php $role = 'teacher'; ?>
<head>
	<title>Sistema Lecto-Escritura</title>
	<meta name="Descripcion" content="Sistema Lecto-Escritura">
	<meta name="keywords" content="">
	<meta name="author" content="Genesis Lizano - Andres Jurado">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8">

	<!-- Bootstrap -->
	<script src="../admin/vendors/jquery-1.12.4.min.js"></script>
	<link rel="icon" type="image/png" href="../admin/images/logo.png" />
	<link href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="../admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
	<link href="../admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	<link href="../admin/bootstrap/css/print.css" rel="stylesheet" media="print">
	<link href="../admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
	<link href="../admin/assets/styles.css" rel="stylesheet" media="screen">
	<!-- <link rel="stylesheet" href="../admin/bootstrap/fontawesome-5.15.4/css/fontawesome.min.css"> -->
	<!-- calendar css -->
	<link href="../admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
	<!-- index css -->
	<!-- <link href="../admin/bootstrap/css/index.css" rel="stylesheet" media="screen"> -->
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

	<script src="../admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<!-- data table -->
	<link href="../admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
	<!-- notification  -->
	<link href="../admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
	<!-- wysiwug  -->
	<link rel="stylesheet" type="text/css" href="../admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
	</link>
	<link href="../admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
	<script src="../admin/vendors/jGrowl/jquery.jgrowl.js"></script>
	<script src="../admin/vendors/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
	<script src="../admin/js/icons.js"></script>
</head>
<?php include('../admin/dbcon.php');
date_default_timezone_set('America/Guayaquil');

?>