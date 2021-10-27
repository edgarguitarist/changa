<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

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
								<form action="delete_gs.php" method="post">
									<div class="control-group">
										<h2>Juegos Disponibles</h2>
										<table border="0" class="table" id="example" aria-describedby="tabla">
											<!-- <a data-toggle="modal" href="#anio_delete" id="delete" class="btn btn-danger"><i class="icon-trash icon-large"></i></a> -->
											<?php include('modal_delete.php'); ?>
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Descripción</th>
													<th></th>
													<th></th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$user_query = mysqli_query($con, "SELECT g.game_id, g.description, g.name, g.status AS estado, gc.status FROM games g LEFT JOIN games_class gc ON g.game_id = gc.game_id WHERE g.status = 'Activated' ORDER BY g.name") or die(mysqli_error($con));
												while ($row = mysqli_fetch_array($user_query)) {
													$id = $row['game_id'];
													$status = $row['status'];
												?>
													<tr>
														<td width="140"><?php echo $row['name']; ?></td>
														<td><?php echo $row['description']; ?></td>
														<td width="100">
															<a href="games_check.php<?php echo '?id=' . $get_id . '&game=' . $id; ?>" class="btn btn-success"><i class="icon-check"></i> Revisar </a>
														</td>
														<td width="90">
															<a href="games_edit.php<?php echo '?id=' . $get_id . '&game=' . $id; ?>" class="btn btn-warning"><i class="icon-pencil"></i> Editar </a>
														</td>
														<?php if ($status == "Activated") { ?>
															<td width="120"><a href="games_changer.php<?php echo '?id=' . $id . '&class=' . $get_id . '&status=' . $status; ?>" class="btn btn-danger"><i class="icon-remove"></i> Desactivar</a></td>
														<?php } else { ?>
															<td width="120"><a href="games_changer.php<?php echo '?id=' . $id . '&class=' . $get_id . '&status=' . $status; ?>" class="btn btn-success"><i class="icon-check"></i> Activar</a></td>
														<?php } ?>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</form>
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