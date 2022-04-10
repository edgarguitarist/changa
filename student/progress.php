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
				<?php $class_query = mysqli_query($con, "SELECT * from teacher_class
									LEFT JOIN class ON class.class_id = teacher_class.class_id
									LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
									LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
									where teacher_class_id = '$get_id'") or die(mysqli_error($con));
				$class_row = mysqli_fetch_array($class_query);
				$class_id = $class_row['class_id'];
				$school_year = $class_row['school_year'];
				?>
				<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<ul class="breadcrumb">
						<li><a href="#"><?= $class_row['class_name']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><?= $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
						<li><a href="#">Periodo: <?= $class_row['school_year']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><b>Mi Progreso</b></a></li>
					</ul>
				</div><!-- end breadcrumb -->

				<div style="width: 100%; display:flex;" id="old">
					<div class="span6" id="content">
						<div class="row-fluid">

							<!-- block -->
							<div id="block_bg" class="block mincon">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-left">
										<h4> Progreso de las Prácticas</h4>
									</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

											<thead>
												<tr>
													<th>Fecha Subida</th>
													<th>Tarea</th>

													<th>Nota</th>
												</tr>

											</thead>
											<tbody>

												<?php
												$query = mysqli_query($con, "SELECT * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id
										WHERE student_assignment.student_id = '$session_id'
										order by fdatein DESC") or die(mysqli_error($con));
												$rows = mysqli_num_rows($query);
												while ($row = mysqli_fetch_array($query)) {
													$id  = $row['student_assignment_id'];
													$student_id = $row['student_id'];
												?>
													<tr>
														<td><?= $row['fdatein']; ?></td>
														<td><?= $row['fname']; ?></td>

														<?php if ($session_id == $student_id) { ?>
															<td>
																<span class="badge badge-success"><?= $row['grade']; ?></span>
															</td>
														<?php } else { ?>
															<td></td>
														<?php } ?>
													</tr>

												<?php } ?>
												

											</tbody>
										</table>
										<?php
										if($rows === 0){
											echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se han enviado tareas.</div>';
										}
										?>
									</div>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>

					<div class="span6" id="">
						<div class="row-fluid">

							<!-- block -->
							<div id="block_bg" class="block mincon">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-left">
										<h4> Progreso de Examenes</h4>
									</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">

										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
											<thead>
												<tr>
													<th>Titulo de Examen</th>
													<th>Descripcion</th>
													<th>TIEMPO DE EXAMEN (EN MINUTOS)</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = mysqli_query($con, "SELECT * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id' order by class_quiz_id DESC ") or die(mysqli_error($con));
												$rows = mysqli_num_rows($query);
												while ($row = mysqli_fetch_array($query)) {
													$id  = $row['class_quiz_id'];
													$quiz_id  = $row['quiz_id'];
													$quiz_time  = $row['quiz_time'];

													$query1 = mysqli_query($con, "SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'") or die(mysqli_error($con));
													$row1 = mysqli_fetch_array($query1);
													$grade = $row1['grade'];

												?>
													<?php if ($grade == "") {
													} else { ?>
														<tr>
															<td><?= $row['quiz_title']; ?></td>
															<td><?= $row['quiz_description']; ?></td>
															<td><?= $row['quiz_time'] / 60; ?></td>
															<td width="200">

																<b>Puntaje logrado <?= $grade; ?></b>

															</td>
															<script type="text/javascript">
																$(document).ready(function() {
																	$('#<?= $id; ?>Hacer esta tarea').tooltip('show');
																	$('#<?= $id; ?>Hacer esta tarea').tooltip('hide');
																});
															</script>
														</tr>
													<?php } ?>
												<?php } ?>
											</tbody>
										</table>
										<?php
										if($rows === 0){
											echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha realizado ningún Examen.</div>';
										}
										?>
									</div>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>
				</div>
				<div style="width: 100%; display:flex;" id="new">
					<div class="span6" id="content">
						<div class="row-fluid">

							<!-- block -->
							<div id="block_bg" class="block mincon">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-left">
										<h4> Progreso de los Juegos</h4>
									</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

											<thead>
												<tr>
													<th>Fecha Subida</th>
													<th>Juego</th>
													<th>Tiempo</th>
												</tr>

											</thead>
											<tbody>

												<?php
												$query = mysqli_query($con, "SELECT * FROM games_class_student gcs INNER JOIN games g ON g.game_id = gcs.id_game
										WHERE id_student = '$session_id' AND id_class = '$get_id' 
										order by fecha DESC") or die(mysqli_error($con));
												$rows = mysqli_num_rows($query);
												while ($row = mysqli_fetch_array($query)) {
													$student_id = $row['id_student'];
												?>
													<tr>
														<td><?= $row['fecha']; ?></td>
														<td><?= $row['name']; ?></td>
														<td><?= $row['score']; ?></td>
													</tr>

												<?php } ?>


											</tbody>
										</table>
										<?php
										if($rows === 0){
											echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha jugado ningún juego.</div>';
										}
										?>
									</div>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>

					<div class="span6" id="">
						<div class="row-fluid">

							<!-- block -->
							<div id="block_bg" class="block mincon">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-left">
										<h4> Progreso de las Historias</h4>
									</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">

										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
											<thead>
												<tr>
													<th>Título</th>
													<th>Fecha</th>
													<th>Calificación</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = mysqli_query($con, "SELECT * FROM histories WHERE id_student = $session_id and id_class = $get_id") or die(mysqli_error($con));
												$rows = mysqli_num_rows($query);
												while ($row = mysqli_fetch_array($query)) {
												?>
													<tr>
														<td><?= $row['title']; ?></td>
														<td><?= $row['fecha_subida']; ?></td>
														<td><?= $row['calificacion']; ?></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
										<?php
										if($rows === 0){
											echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha enviado ninguna historia.</div>';
										}
										?>
									</div>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>
				</div>
			</div>
			<?php /* include('downloadable_sidebar.php') */ ?>
		</div>
		<?php include('footer-b.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>