<div class="span3" id="sidebar">
	<center>
		<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class=""><a href="dashboard_student.php"><em class="icon-chevron-right"></em><em class="icon-chevron-left"></em>&nbsp;Volver</a></li>
			<li class=""><a href="my_classmates.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-group"></em>&nbsp;Mis Compañeros</a></li>
			<li class=""><a href="subject_overview_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-file"></em>&nbsp;Descripción de Curso</a></li>
			<li class=""><a href="progress.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-bar-chart"></em>&nbsp;Mi Progreso</a></li>
			<li class=""><a href="assignment_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-download"></em>&nbsp;Tareas</a></li>
			<li class=""><a href="games_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="fa fa-puzzle-piece ml5px"></em>&nbsp;Juegos</a></li>
			<li class=""><a href="histories_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-book"></em>&nbsp;Historias</a></li>
			<li class=""><a href="announcements_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-info-sign"></em>&nbsp;Avisos</a></li>
			<li class=""><a href="class_calendar_student.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-calendar"></em>&nbsp;Horario de Clases</a></li>
			<li class=""><a href="student_quiz_list.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-reorder"></em>&nbsp;Examenes</a></li>
		</ul>
		<?php /* include('search_other_class.php'); */ ?>
	</center>
</div>


<script>
	//COPILOT: hacer una funcion que al hacer hover en el sidebar se agregue la clase active
	function gg() {
		$('.nav-list').find('a').each(function() {
			if (this.href == window.location.href) {
				$(this).parent().addClass('active');
				$(this).parent().parent().parent().addClass('active');
				$(this).parent().parent().parent().parent().parent().addClass('active');
			}
		});
	};
	gg();
</script>