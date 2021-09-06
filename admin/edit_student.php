<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="adduser">
				<?php include('edit_students_form.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Lista Estudiantes</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_student.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-toggle="modal" href="#student_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
										<?php include('modal_delete.php'); ?>
										<thead>
											<tr>
												<th></th>
												<th>Nombre</th>
												<th>Curso</th>
												<th>Paralelo</th>
												<th>Periodo</th>
												<th></th>g
											</tr>
										</thead>
										<tbody>

											<?php
											$query = mysqli_query($con, "SELECT * FROM student LEFT JOIN class ON class.class_id = student.class_id 
																		LEFT JOIN department ON department.department_id=student.paralelo LEFT JOIN school_year ON school_year.school_year_id = student.cod_ciclo ORDER BY student.student_id DESC") or die(mysqli_error($con));
											while ($row = mysqli_fetch_array($query)) {
												$id = $row['student_id'];
											?>

												<tr>
													<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
													<!-- <td><?php //echo $row['username']; ?></td> -->
													<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
													<!-- <td><?php //echo $row['dni']; ?></td> -->
													<td width="100"><?php echo $row['class_name']; ?></td>
													<!--<td> <?php //echo $row['celular']; 
																?></td> -->
													<td><?php echo $row['department_name']; ?></td>
													<td width="100">
														<?php echo $row['school_year']; ?>
													</td>
													<td width="30"><a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>

												</tr>
											<?php } ?>

										</tbody>
									</table>
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