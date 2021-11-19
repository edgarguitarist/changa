<div class="span3" id="sidebar"><center>
	<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class=""><a href="dashboard_student.php"><em class="icon-chevron-right"></em><em class="icon-chevron-left"></em>&nbsp;Volver</a></li>
				<li class=""><a href="my_classmates.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-group"></em>&nbsp;Mis Compañeros</a></li>
				<li class=""><a href="subject_overview_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-file"></em>&nbsp;Descripción de Curso</a></li>
				<li class=""><a href="progress.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-bar-chart"></em>&nbsp;Mi Progreso</a></li>
				<li class=""><a href="assignment_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-download"></em>&nbsp;Prácticas</a></li>
				<li class=""><a href="video_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-play"></em>&nbsp;Videos</a></li>
				<li class=""><a href="downloadable_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-book"></em>&nbsp;Material Adicional</a></li>
				<li class=""><a href="announcements_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-info-sign"></em>&nbsp;Avisos</a></li>
				<li class=""><a href="class_calendar_student.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-calendar"></em>&nbsp;Horario de Clases</a></li>
				<li class="active"><a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-reorder"></em>&nbsp;Examenes</a></li>
		</ul>
	<?php /* include('search_other_class.php'); */ ?>	
</div>