	<?php include('dbcon.php'); ?>
	<form action="delete_student.php" method="post">
		<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
			<a data-toggle="modal" href="#student_delete" id="delete" class="btn btn-danger" name=""><em class="icon-trash icon-large"></em></a>
			<div class="pull-right">
				<ul class="nav nav-pills">
					<li class="">
						<a href="students.php">Todos</a>
					</li>
					<li class="active">
						<a href="unreg_students.php">Inactivos</a>
					</li>
					<li class="">
						<a href="reg_students.php">Activos</a>
					</li>
				</ul>
			</div>
			<?php include('modal_delete.php'); ?>
			<thead>
				<tr>
					<th></th>
					<th>Nombre</th>
					<th>Curso</th>
					<th>Paralelo</th>
					<th>Periodo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php
				$query = mysqli_query($con, "SELECT student.student_id, student.status, student.username, student.firstname, student.lastname, paralelo.paralelo_name, class.class_name, school_year.school_year FROM student 
								LEFT JOIN class ON student.class_id = class.class_id 
								LEFT JOIN paralelo ON paralelo.paralelo_id=student.paralelo 
								LEFT JOIN school_year ON school_year.school_year_id= student.cod_ciclo WHERE school_year.status='Activated' AND student.status = 'Unregistered' ORDER BY student.student_id DESC") or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($query)) {
					$id = $row['student_id'];
					$est_status = $row['status'];
				?>

					<tr>
						<td width="30">
							<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
						</td>

						<td>
							<?php echo $row['firstname'] . " " . $row['lastname']; ?>
						</td>
						<td width="100">
							<?php echo $row['class_name']; ?>
					</td>
						<td width="100">
							<?php echo $row['paralelo_name']; ?>
					</td>
					<td width="100">
							<?php echo $row['school_year']; ?>
					</td>
						<td width="30">
							<a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><em class="icon-pencil"></em> </a>
						</td>
						<?php if ($est_status == "Registered") { ?>
							<td width="120"><a href="es_desactivate.php<?php echo '?id=' . $id; ?>" class="btn btn-danger"><em class="icon-remove"></em> Desactivar</a></td>
						<?php } else { ?>
							<td width="120"><a href="es_activate.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a></td>
						<?php } ?>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</form>