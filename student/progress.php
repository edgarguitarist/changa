<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar_student.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('student_class_sidebar.php'); ?>
			<div class="span9" id="content">
				<!-- breadcrumb -->
				<?php include 'progress_class.php' ?>
				<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<ul class="breadcrumb">
						<li><a href="#"><?= $class_row['class_name']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><?= $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
						<li><a href="#">Periodo: <?= $class_row['school_year']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><b>Mi Progreso</b></a></li>
					</ul>
				</div><!-- end breadcrumb -->

				<div style="width: 100%; display:flex;" id="old">
					<?php include "progress_practica.php" ?>
					<?php include "progress_exam.php" ?>					
				</div>
				<div style="width: 100%; display:flex;" id="new">	
					<?php include "progress_games.php" ?>					
					<?php include "progress_histories.php" ?>
				</div>
			</div>
			<?php /* include('downloadable_sidebar.php') */ ?>
		</div>
		<?php include('footer-b.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>