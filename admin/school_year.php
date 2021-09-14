<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="adduser">
				<?php include('add_school_year.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Periodos</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_sy.php" method="post">
									<table border="0" class="table" id="example" aria-describedby="tabla">
										<a data-toggle="modal" href="#anio_delete" id="delete" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
										<?php include('modal_delete.php'); ?>
										<thead>
											<tr>
												<th></th>
												<th>Periodo</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($con, "select * from school_year") or die(mysqli_error($con));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['school_year_id'];
												$year_status = $row['status'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['school_year']; ?></td>

													<td width="40">
														<a href="edit_year.php<?php echo '?id=' . $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
													</td>

													<?php if ($year_status == "Activated") { ?>
														<td width="120"><a href="year_changer.php<?php echo '?id=' . $id . '&status=' . $year_status; ?>" class="btn btn-danger"><i class="icon-remove"></i> Desactivar</a></td>
													<?php } else { ?>
														<td width="120"><a href="year_changer.php<?php echo '?id=' . $id . '&status=' . $year_status; ?>" class="btn btn-success"><i class="icon-check"></i> Activar</a></td>
													<?php } ?>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>


			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>