<div class="span3" id="sidebar"><center>
		<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
		<?php include('count.php'); ?>
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class=""><a href="dashboard_student.php"><em class="icon-chevron-right"></em><em class="icon-group"></em>&nbsp;Mis cursos</a></li>
			<li class="">
				<a href="student_notification.php"><em class="icon-chevron-right"></em><em class="icon-info-sign"></em>&nbsp;Notificaciones
				<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
				</a>
			</li>
			 <li class=""><a href="student_message.php"><em class="icon-chevron-right"></em><em class="icon-envelope-alt"></em>&nbsp;Mensajes</a></li>
			 <li class=""><a href="backpack.php"><em class="icon-chevron-right"></em><em class="icon-suitcase"></em>&nbsp;Portafolio</a></li>
		</ul>
		<?php /* include('search_other_class.php'); */ ?>	
</center>
</div>
