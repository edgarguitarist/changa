<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_class.php'); ?>
			<div class="span5" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->

					<?php $class_query = mysqli_query($con, "SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										
										where teacher_class_id = '$get_id'") or die(mysqli_error($con));
					$class_row = mysqli_fetch_array($class_query);
					?>

					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Avisos</b></a></li>
						</ul>
					</div><!-- end breadcrumb -->

					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form method="post">
									<textarea name="content" id="ckeditor_full"></textarea>
									<br>
									<div class="tcenter">
										<button name="post" class="btn btn-info"><em class="icon-check icon-large"></em> Publicar</button>
									</div>
								</form>
							</div>

							<?php
							if (isset($_POST['post'])) {
								$content = $_POST['content'];

								mysqli_query($con, "insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$get_id','$session_id','$content',NOW())") or die(mysqli_error($con));
								mysqli_query($con, "insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','Agregó aviso',NOW(),'announcements_student.php')") or die(mysqli_error($con));
							?>
								<script>
									window.location = 'announcements.php<?php echo '?id=' . $get_id; ?>';
								</script>
							<?php
							}
							?>
						</div>
					</div>
					<!-- /block -->
				</div>


			</div>

			<div class="span4 row-fluid">
				<!-- block -->
				<br><br>
				<div id="block_bg" class="block mincon">
					<div class="navbar navbar-inner block-header">
						<div id="" class="muted pull-left"></div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
							<?php
							$query_announcement = mysqli_query($con, "SELECT * from teacher_class_announcements
																	where teacher_id = '$session_id'  and  teacher_class_id = '$get_id' order by date DESC
																	") or die(mysqli_error($con));
							$numero = mysqli_num_rows($query_announcement);
							if ($numero===0) {
								echo '<div class="alert alert-info"><em class="icon-info-sign"></em> Aun no hay anuncios agregados.</div>';
							} else {
								while ($row = mysqli_fetch_array($query_announcement)) {
									$id = $row['teacher_class_announcements_id'];
							?>
									<div class="post" id="del<?php echo $id; ?>">
										<?php echo $row['content']; ?>

										<hr>


										<strong><em class="icon-calendar"></em> <?php echo $row['date']; ?></strong>

										<div class="pull-right">
											<a class="btn btn-link" href="#<?php echo $id; ?>" data-toggle="modal"><em class="icon-remove"></em> </a>
										</div>

										<div class="pull-right">
											<form method="post" action="edit_post.php<?php echo '?id=' . $get_id; ?>">
												<input type="hidden" name="id" value="<?php echo $id; ?>">
												<button class="btn btn-link" name="edit"><em class="icon-pencil"></em> </button>
											</form>
										</div>

									</div>
									<?php include("remove_sent_message_modal.php"); ?>
							<?php }
							} ?>
						</div>
					</div>
				</div>
				<!-- /block -->
			</div>


			<script type="text/javascript">
				$(document).ready(function() {


					$('.remove').click(function() {

						var id = $(this).attr("id");
						$.ajax({
							type: "POST",
							url: "remove_announcements.php",
							data: ({
								id: id
							}),
							cache: false,
							success: function(html) {
								$("#del" + id).fadeOut('slow', function() {
									$(this).remove();
								});
								$('#' + id).modal('hide');
								$.jGrowl("Tu publicación fue eliminada", {
									header: 'Eliminar información'
								});
								location.reload();
							}
						});

						return false;
					});
				});
			</script>

		</div>


	</div>





	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>