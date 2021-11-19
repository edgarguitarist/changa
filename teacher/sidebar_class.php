<div class="span3" id="sidebar">
	<center>
		<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class=""><a href="dasboard_teacher.php"><em class="icon-chevron-right"></em><em class="icon-chevron-left"></em>&nbsp;Volver</a></li>
			<li class=""><a href="my_students.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-group"></em>&nbsp;Mis Estudiantes</a></li>
			<li class=""><a href="subject_overview.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-file"></em>&nbsp;Descripción de &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Curso</a></li>
			<li class=""><a href="assignment.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-download"></em>&nbsp;Tareas</a></li>
			<!-- <li class=""><a href="video.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-play"></em>&nbsp;Videos</a></li> -->
			<!-- <li class=""><a href="downloadable.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-book"></em>&nbsp;Material Adicional</a></li> -->
			<li class=""><a href="games_teacher.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="fa fa-puzzle-piece ml5px"></em>&nbsp;Juegos</a></li>
			<li class=""><a href="announcements.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-info-sign"></em>&nbsp;Avisos</a></li>
			<li class=""><a href="class_calendar.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-calendar"></em><span>Calendario de &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;Eventos</span></a></li>
			<li class=""><a href="class_quiz.php<?php echo '?id=' . $get_id; ?>"><em class="icon-chevron-right"></em><em class="icon-list"></em>&nbsp;Examenes</a></li>
		</ul>
		<?php include('search_other_class.php'); ?>
	</center>
</div>