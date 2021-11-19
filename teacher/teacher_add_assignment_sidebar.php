<div class="span3" id="sidebar"><center>
	<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
	<?php include('teacher_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dasboard_teacher.php"><em class="icon-chevron-right"></em><em class="icon-group"></em>&nbsp;Mis clases</a></li>
		<li class=""><a href="notification_teacher.php"><em class="icon-chevron-right"></em><em class="icon-info-sign"></em>&nbsp;Notificaciones
			<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
		</a></li>
		<?php
			$message_query = mysqli_query($con,"SELECT * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error($con));
			$count_message = mysqli_num_rows($message_query);
			?>
		<li class=""><a href="teacher_message.php"><em class="icon-chevron-right"></em><em class="icon-envelope-alt"></em>&nbsp;Mensajes
		<?php if($count_message == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
		</a></li> 
		<li class=""><a href="teacher_backack.php"><em class="icon-chevron-right"></em><em class="icon-suitcase"></em>&nbsp;Portafolio</a></li> 
		<li class="active"><a href="add_assignment.php"><em class="icon-chevron-right"></em><em class="icon-plus-sign"></em>&nbsp;Agregar Prácticas</a></li>
		<li class=""><a href="add_video.php"><em class="icon-chevron-right"></em><em class="icon-play"></em>&nbsp;Agregar Videos</a></li>		
		<li class=""><a href="add_announcement.php"><em class="icon-chevron-right"></em><em class="icon-plus-sign"></em>&nbsp;Agregar Noticias</a></li> 
		<li class=""><a href="add_downloadable.php"><em class="icon-chevron-right"></em><em class="icon-plus-sign"></em>&nbsp;Agregar Material Adicional</a></li>
		<li class=""><a href="teacher_quiz.php"><em class="icon-chevron-right"></em><em class="icon-list"></em>&nbsp;Examenes</a></li>
		<li class=""><a href="teacher_share.php"><em class="icon-chevron-right"></em><em class="icon-file"></em>&nbsp;Documentos Compartidos</a></li>
	</ul>
	<?php include('search_other_class.php'); ?>	
</center>
</div>

