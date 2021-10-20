<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body id="class_div">
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_teacher.php'); ?>
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
							<li><a href="#"><b>Mis Cursos</b></a><span class="divider">/</span></li>
							<li><a href="#">Periodo / <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
					</div><!-- end breadcrumb -->

					<!-- block -->
					<div class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="count_class" class="muted pull-right">

							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span8">
								<form class="" id="add_downloadble" method="post">
									<div class="control-group">

										<div class="controls">


											<textarea name="content" id="ckeditor_full"></textarea>
										</div>
									</div>



									<script>
										jQuery(document).ready(function($) {
											$("#add_downloadble").submit(function(e) {
												e.preventDefault();
												var formData = $(this).serialize();
												$.ajax({
													type: "POST",
													url: "add_announcement_save.php",
													data: formData,
													success: function(html) {
														$.jGrowl("Aviso publicado", {
															header: 'Publicar aviso'
														});
														window.location = 'add_announcement.php';
													}

												});
											});
										});
									</script>


							</div>
							<div class="span4">

								<div class="alert alert-info">Seleccione el Curso al que desea enviar el archivo.</div>

								<div class="pull-left">
									Seleccionar Todo <input type="checkbox" name="selectAll" id="checkAll" />
									<script>
										$("#checkAll").click(function() {
											$('input:checkbox').not(this).prop('checked', this.checked);
										});
									</script>
								</div>
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

									<thead>
										<tr>
											<th></th>
											<th>Curso</th>
											<th>Paralelo</th>
											<th>Materia</th>
										</tr>

									</thead>
									<tbody>

										<?php $query = mysqli_query($con, "SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN paralelo ON paralelo.paralelo_id = teacher_class.paralelo_id
										where teacher_id = '$session_id' and school_year = '$school_year_id' ") or die(mysqli_error($con));
										$count = mysqli_num_rows($query);


										while ($row = mysqli_fetch_array($query)) {
											$id = $row['teacher_class_id'];

										?>
											<tr id="del<?php echo $id; ?>">
												<td width="30">
													<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['class_name']; ?></td>
												<td><?php echo $row['paralelo_name']; ?></td>
												<td><?php echo $row['subject_title']; ?></td>
											</tr>

										<?php } ?>



									</tbody>
								</table>


							</div>
							<div class="span10">
								<hr>
								<center>
									<div class="control-group">
										<div class="controls">
											<button name="Upload" type="submit" value="Upload" class="btn btn-success"><i class="icon-check"></i>&nbsp;Publicar</button>
										</div>
									</div>
								</center>

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