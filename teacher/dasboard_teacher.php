<?php include('header_dashboard.php');?>
<?php include('../session.php'); ?>

<body id="class_div">
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_teacher.php'); ?>
			<div class="span6" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->
					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<?php
							$school_year_query = mysqli_query($con, "SELECT * from school_year where status='Activated' order by school_year DESC") or die(mysqli_error($con));
							$school_year_query_row = mysqli_fetch_array($school_year_query);
							$school_year_id = $school_year_query_row['school_year_id'];
							//include('year.php');
							?>
							<li><a href="#"><b>Mis clases</b></a><span class="divider">/</span></li>
							<li><a href="#">Periodo: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
					</div><!-- end breadcrumb -->
					<!-- block -->
					<div class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="count_class" class="muted pull-right"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<?php include('teacher_class.php'); ?>
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
								url: "delete_class.php",
								data: ({
									id: id
								}),
								cache: false,
								success: function(html) {
									$("#del" + id).fadeOut('slow', function() {
										$(this).remove();
									});
									$('#' + id).modal('hide');
									$.jGrowl("Su clase ha sido borrada exitosamente", {
										header: 'Clase Borrada'
									});
								}
							});
							return false;
						});
					});
				</script>
			</div>
			<?php include('teacher_right_sidebar.php') ?>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>