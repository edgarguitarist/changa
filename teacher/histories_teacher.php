<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_class_id = $_GET['id'];
$get_id = $_GET['id'];
$get_teacher_id = $_SESSION['id']; ?>

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
                            <div id="" class="muted pull-left">
                                <h1 class="control-label">Tus Historias</h1>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <iframe title="" width="100%" style="height: 90vh !important;" class="maxcon" src="../admin/games/histories/index2.php?id_teacher=<?= $get_teacher_id ?>&id_class=<?= $get_class_id ?>" frameborder="0"></iframe>
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