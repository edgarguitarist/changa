<div class="span3" id="sidebar">
	<center>
		<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Volver</a></li>
			<li class=""><a href="my_students.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Mis Estudiantes</a></li>
			<li class=""><a href="subject_overview.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Descripción de &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Curso</a></li>
			<li class=""><a href="assignment.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Tareas</a></li>
			<!-- <li class=""><a href="video.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-play"></i>&nbsp;Videos</a></li> -->
			<!-- <li class=""><a href="downloadable.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Material Adicional</a></li> -->
			<li class=""><a href="games_teacher.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="fa fa-puzzle-piece ml5px"></i>&nbsp;Games</a></li>
			<li class=""><a href="announcements.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Avisos</a></li>
			<li class=""><a href="class_calendar.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i><span>Calendario de &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Eventos</span></a></li>
			<li class=""><a href="class_quiz.php<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Examenes</a></li>
		</ul>
		<?php include('search_other_class.php'); ?>
	</center>
</div>