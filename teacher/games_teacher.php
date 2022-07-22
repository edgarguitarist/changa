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
									<h2>Juegos Disponibles</h2>
									<table border="0" class="table" id="example" aria-describedby="tabla">
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
											$user_query = mysqli_query($con, "SELECT
											g.game_id,
											g.description,
											g.name,
											g.status AS estado,
											gc.status,
											gc.teacher_class_id,
											IF(g.game_id IN ( SELECT game_ID FROM games_class WHERE teacher_class_id = $get_class_id ),'si','no') AS existe
										FROM
											games g
										LEFT JOIN games_class gc ON
											g.game_id = gc.game_id
										WHERE
											g.status = 'Activated'
										ORDER BY
											g.name") or die(mysqli_error($con));
											while ($row = mysqli_fetch_array($user_query)) {
												$game_id = $row['game_id'];
												$status = $row['status'];
												$game_class_id = $row['teacher_class_id'];
												$existe = $row['existe'];
												if ($existe == 'no') {
											?>
													<tr>
														<td width="140"><?php echo $row['name']; ?></td>
														<td><?php echo $row['description']; ?></td>
														<?php
														$other = mysqli_query($con, "SELECT
														*, (SELECT word FROM games_words  WHERE gwc.game_word_id = game_word_id) AS word, (SELECT clue FROM games_words_clue WHERE gwc.games_words_class_id = games_words_class_id) AS clue
													FROM
														games_words_class gwc
													WHERE gwc.games_class_id = (SELECT games_class_id from games_class where teacher_class_id = $get_class_id AND game_id = $game_id) AND gwc.game_id = $game_id AND status='Activated' ORDER BY word") or die(mysqli_error($con));

														?>

														<td width="130">
															<span class="error_critic f-20"> </span>
														</td>

														<td width="90">
															<!-- <a href="games_edit.php<?php echo '?id=' . $get_class_id . '&game=' . $game_id; ?>" class="btn btn-warning"><em class="icon-pencil"></em> Editar </a> -->
														</td>

														<td width="120">
															<a href="games_changer.php<?php echo '?game=' . $game_id . '&class=' . $get_class_id . '&status=' . $status; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a>
														</td>

													</tr>

													<?php } else {
													if ($game_class_id == $get_class_id) {
													?>
														<tr>
															<td width="140"><?php echo $row['name']; ?></td>
															<td><?php echo $row['description']; ?></td>
															<?php
															$other = mysqli_query($con, "SELECT
														*, (SELECT word FROM games_words  WHERE gwc.game_word_id = game_word_id) AS word, (SELECT clue FROM games_words_clue WHERE gwc.games_words_class_id = games_words_class_id) AS clue
													FROM
														games_words_class gwc
													WHERE gwc.games_class_id = (SELECT games_class_id from games_class where teacher_class_id = $get_class_id AND game_id = $game_id) AND gwc.game_id = $game_id AND status='Activated' ORDER BY word") or die(mysqli_error($con));

															$words = array();
															$clues = array();

															while ($rows = mysqli_fetch_assoc($other)) {
																$words[] = $rows['word'];
																if ($rows['clue'] != null) {
																	$clues[] = $rows['clue'];
																}
															}

															$pistas = json_encode($clues);
															$num_pistas = count($clues);
															$pistas = base64_encode($pistas);
															$palabras = json_encode($words);
															$num_palabras = count($words);
															$palabras = base64_encode($palabras);

															$num_rows = mysqli_num_rows($other);
															if ($num_rows < 5) {
															?>
																<td width="130">
																	<span class="error_critic f-20"> El juego necesita al menos 5 palabras.</span>
																</td>
															<?php
															} else if ($num_pistas != $num_palabras && $game_id == 2) {
															?>
																<td width="130">
																	<span class="error_critic f-20"> Edite el juego y agregue las pistas a las palabras en uso.</span>
																</td>
															<?php
															} else {
															?>
																<td width="130">
																	<a href="games_check.php?id=<?php echo $get_class_id . '&game=' . $game_id . '&clues=' . $pistas . '&words=' . $palabras  ?>" class="btn btn-success"><em class="icon-check"></em> Revisar Juego</a>
																</td>
															<?php
															}
															?>
															<td width="90">
																<a href="games_edit.php<?php echo '?id=' . $get_class_id . '&game=' . $game_id; ?>" class="btn btn-warning"><em class="icon-pencil"></em> Editar </a>
															</td>
															<?php if ($status == "Activated") { ?>
																<td width="120"><a href="games_changer.php<?php echo '?game=' . $game_id . '&class=' . $game_class_id . '&status=' . $status; ?>" class="btn btn-danger"><em class="icon-remove"></em> Desactivar</a></td>
															<?php } else { ?>
																<td width="120"><a href="games_changer.php<?php echo '?game=' . $game_id . '&class=' . $game_class_id . '&status=' . $status; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a></td>
															<?php } ?>
														</tr>
											<?php }
												}
											} ?>
										</tbody>
									</table>
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