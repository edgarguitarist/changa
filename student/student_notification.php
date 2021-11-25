<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body>
	<?php include('navbar_student.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('student_sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->
					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<?php
							$school_year_query = mysqli_query($con, "SELECT * from school_year where status='Activated' order by school_year DESC") or die(mysqli_error($con));
							$school_year_query_row = mysqli_fetch_array($school_year_query);
							$school_year_id = $school_year_query_row['school_year_id'];
							?>
							<li><a href="#"><b>Mis cursos</b></a><span class="divider">/</span></li>
							<li><a href="#">Periodo: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
					</div><!-- end breadcrumb -->



					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">

								<!-- <h1>not read <?= $not_read; ?></h1>
								<h1>session id <?= $session_id; ?></h1>
								<h1>school year <?= $school_year_id; ?></h1> -->

								<form action="read.php" method="post">

								<div style="margin-bottom: 10px;">
									<button id="read" class="btn btn-info" name="read"><em class="icon-check"></em> Leer</button>
									<button id="clear" class="ml-5px btn btn-danger" name="clear"><em class="icon-trash"></em> Eliminar</button>
									
									<div class="pull-right">
										<div id="sel-all">
											Seleccionar Todo <input type="checkbox" class="margin-0" name="selectAll" id="checkAll" />
										</div>
										<script>
												$("#checkAll").click(function() { //check all checkboxes
													$('input:checkbox').not(this).prop('checked', this.checked);
												});
										</script>
									</div>
								</div>

<br>

									<?php $query = mysqli_query($con, "SELECT * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 	
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year_id'  order by notification.date_of_notification DESC") or die(mysqli_error($con));
									$count = mysqli_num_rows($query);
									if ($count  > 0) {
										while ($row = mysqli_fetch_array($query)) {
											$get_id = $row['teacher_class_id'];
											$id = $row['notification_id'];


											$query_yes_read = mysqli_query($con, "SELECT * from notification_read where notification_id = '$id' and student_id = '$session_id'") or die(mysqli_error($con));
											$read_row = mysqli_fetch_array($query_yes_read);						

											$yes = isset($read_row['student_read']) ? $read_row['student_read'] : 'no';
											$hided = isset($read_row['hided']) ? $read_row['hided'] : 'no';

											if ($hided == 'no'){
												
									?>
											<div class="post" id="del<?php echo $id; ?>">
												<?php
												if ($yes == 'yes') { ?>
													<div class="pull-right mr25px s-success">
														<span>Mensaje leido</span>
														<input id="" class="margin-0" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</div>
												<?php
												} else { ?>
													<div class="pull-right mr25px s-warning-check">
														<span>Mensaje no leido</span>
														<input id="" class="margin-0" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</div>
												<?php
												} ?>
												<strong><?php echo $row['firstname'] . " " . $row['lastname'];  ?></strong>
												<?php echo $row['notification']; ?> en
												<a href="<?php echo $row['link']; ?><?php echo '?id=' . $get_id; ?>">
													<?php echo $row['class_name']; ?>
													<?php echo $row['subject_code']; ?>
												</a>
												<hr>
												<div class="pull-right">
													<em class="icon-calendar"></em>&nbsp;<?php echo $row['date_of_notification']; ?>

												</div>
											</div>
											
										<?php
											}
										}
									} else {
										?>
										<div class="alert alert-info"><strong><em class="icon-info-sign"></em> No tiene notificaciones</strong></div>
										
									<?php
									}
									?>

								</form>

							</div>
						</div>
					</div>
					<!-- /block -->
				</div>


			</div>

		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>