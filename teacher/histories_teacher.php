<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_class_id = $_GET['id'];
$get_id = $_GET['id']; ?>

<body>
	<?php include('navbar_teacher.php') ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar_class.php'); ?>
			<!-- <div class="span3" id="adduser">
				<?php //include('add_games.php'); 
				?>		   			
			</div> -->
			<div class="span9" id="content">
				<div class="row-fluid">

					<!-- block -->

					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Juegos</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<div class="control-group">
									<h2>Tablas de Cuentos</h2>
									
								</div>
							</div>
						</div>
					</div>
					<!-- /block  -->
				</div>
			</div>
		</div>

		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>