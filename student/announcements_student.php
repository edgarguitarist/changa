<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar_student.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('student_class_sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->

					<?php $class_query = mysqli_query($con, "SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'") or die(mysqli_error($con));
					$class_row = mysqli_fetch_array($class_query);
					?>

					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<li><a href="#"><?= $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?= $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Avisos</b></a></li>
						</ul>
					</div><!-- end breadcrumb -->

					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<?php
								$query_announcement = mysqli_query($con, "SELECT * from teacher_class_announcements
																	where  teacher_class_id = '$get_id' order by date DESC
																	") or die(mysqli_error($con));
								$count = mysqli_num_rows($query_announcement);
								if ($count > 0) {
									while ($row = mysqli_fetch_array($query_announcement)) {
										$id = $row['teacher_class_announcements_id'];
								?>
										<div class="post" id="del<?= $id; ?>">
											<?php echo $row['content']; ?>
											<hr>
											<strong><em class="icon-calendar"></em> <?= $row['date']; ?></strong>
										</div>
									<?php }
								} else { ?>
									<div class="alert alert-info"><em class="icon-info-sign"></em> No hay avisos importantes.</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>
	</div>	
</body>

<?php include('footer-b.php'); ?>
<?php include('script.php'); ?>
</html>