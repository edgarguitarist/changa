 <form id="signin_student" class="form-signin" method="post">
 	<h4 class="form-signin-heading"><em class="icon-plus-sign"></em> Agregar Evento</h4>
 	<input type="text" class="input-block-level datepicker" name="date_start" id="date01" placeholder="Fecha Inicio" required />
 	<input type="text" class="input-block-level datepicker" name="date_end" id="date01" placeholder="Fecha Fin" required />
 	<input type="text" class="input-block-level" id="username" name="title" placeholder="Titulo Evento" required />
 	<div class="tcenter">
		 <button id="signin" name="add" class="btn btn-success" type="submit"><em class="icon-save"></em> Guardar</button>
	 </div>
 </form>
 <?php
	if (isset($_POST['add'])) {
		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];
		$title = $_POST['title'];

		$query = mysqli_query($con, "insert into event (date_end,date_start,event_title,teacher_class_id) values('$date_end','$date_start','$title','$get_id')") or die(mysqli_error($con));
	?>
 	<script>
 		window.location = "class_calendar.php<?php echo '?id=' . $get_id; ?>";
 	</script>
 <?php
	}
	?>

 <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

 	<?php //include('move_to_school_year.php'); 
		?>
 	<thead>
 		<tr>
 			<th>Evento</th>
 			<th>Fecha</th>
 			<th></th>

 		</tr>

 	</thead>
 	<tbody>


 		<?php $event_query = mysqli_query($con, "SELECT * from event where teacher_class_id = '$get_id' ") or die(mysqli_error($con));
			while ($event_row = mysqli_fetch_array($event_query)) {
				$id  = $event_row['event_id'];
			?>
 			<tr id="del<?php echo $id; ?>">

 				<td><?php echo $event_row['event_title']; ?></td>
 				<td><?php echo date("d/m/Y", strtotime($event_row['date_start'])); ?>
 					<br>
 					<?php echo date("d/m/Y", strtotime($event_row['date_end'])); ?>
 				</td>
 				<td width="40">
 					<form method="post" action="delete_class_event.php">
 						<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
 						<input type="hidden" name="id" value="<?php echo $id; ?>">
 						<button class="btn btn-danger" name="delete_event"><em class="icon-remove icon-large"></em></button>
 					</form>
 				</td>
 			</tr>
 		<?php } ?>


 	</tbody>
 </table>