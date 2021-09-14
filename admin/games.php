<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar.php') ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<!--/span-->
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
									<table border="0" class="table" id="example" aria-describedby="tabla">

										<thead>
											<tr>
												<!-- <th></th> -->
												<th>Nombres</th>
												<th>Descripción</th>
												<th>Estado</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($con, "select * from games") or die(mysqli_error($con));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['game_id'];
												$status = $row['status'];
											?>

												<tr>
													<!-- <td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td> -->
													<td>
														<?php echo $row['name']; ?>
													</td>
													<td>
														<?php echo $row['description']; ?>
													</td>
													<td width="100">
														<?php $estado = ($row['status'] =='Activated') ? 'Activado' : 'Desactivado'; echo $estado; ?>
													</td>
													<?php if ($status == "Activated") { ?>
														<td width="120"><a href="games_changer.php<?php echo '?id=' . $id . '&status=' . $status; ?>" class="btn btn-danger"><i class="icon-remove"></i> Desactivar</a></td>
													<?php } else { ?>
														<td width="120"><a href="games_changer.php<?php echo '?id=' . $id . '&status=' . $status; ?>" class="btn btn-success"><i class="icon-check"></i> Activar</a></td>
													<?php } ?>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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