<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_teacher.php'); ?>
			<div class="span6" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->


					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<?php
							$sy = $_POST['school_year'];
							$school_year_query = mysqli_query($con, "SELECT * from school_year where  school_year = '$sy'") or die(mysqli_error($con));
							$school_year_query_row = mysqli_fetch_array($school_year_query);
							$school_year_id = $school_year_query_row['school_year_id'];
							?>
							<li><a href="#"><b>Mis clases</b></a><span class="divider">/</span></li>
							<li><a href="#"><?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
					</div><!-- end breadcrumb -->

					<!-- block -->
					<div class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">

								<ul id="da-thumbs" class="da-thumbs">
									<?php $query = mysqli_query($con, "SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN paralelo ON paralelo.paralelo_id = teacher_class.paralelo_id										
										where teacher_id = '$session_id' and school_year = '$school_year_id' ") or die(mysqli_error($con));
									while ($row = mysqli_fetch_array($query)) {
										$id = $row['teacher_class_id'];

									?>
										<li>
											<a href="my_students.php<?php echo '?id=' . $id; ?>">
												<img src="../<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
												<div>
													<span>
														<p><?php echo $row['class_name']; ?></p>
													</span>
												</div>
											</a>
											<p class="class"><?php echo $row['class_name']. ' - ' . $row['paralelo_name'];; ?></p>
											<p class="subject"><?php echo $row['subject_code']; ?></p>
											<a href="#<?php echo $id; ?>" data-toggle="modal"><em class="icon-trash"></em> Eliminar</a>

										</li>
										<?php include("delete_class_modal.php"); ?>


									<?php } ?>
								</ul>

							</div>
						</div>
					</div>
					<!-- /block -->
				</div>


			</div>
			<?php include('teacher_right_sidebar.php') ?>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>