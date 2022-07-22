<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id'];
$get_class_id = $_GET['id']; ?>

<body>
	<?php include('navbar_student.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('student_class_sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->
					<?php $query = mysqli_query($con, "SELECT * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					JOIN class ON class.class_id = teacher_class.class_id 
					JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
					where student_id = '$session_id'
					") or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
					$id = $row['teacher_class_student_id'];
					?>
					<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="breadcrumb">
							<li><a href="#"><?php echo $row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">Periodo: <?php echo $row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Juegos</b></a></li>
						</ul>

					</div><!-- end breadcrumb -->

					<!-- block -->
					<div id="block_bg" class="block mincon">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<ul id="da-thumbs" class="da-thumbs">
									<?php
									$user_query = mysqli_query($con, "SELECT
											gc.games_class_id,
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
										$contador = 0;
									while ($row = mysqli_fetch_array($user_query)) {
									
										$id_game_class = $row['games_class_id'];
										$game_id = $row['game_id'];
										$status = $row['status'];
										$game_class_id = $row['teacher_class_id'];
										$existe = $row['existe'];

										if ($existe == 'si' && $game_class_id == $get_class_id) {
											
											$other = mysqli_query($con, "SELECT
												*, (SELECT word FROM games_words  WHERE gwc.game_word_id = game_word_id) AS word, (SELECT clue FROM games_words_clue WHERE gwc.games_words_class_id = games_words_class_id) AS clue
											FROM
												games_words_class gwc
											WHERE gwc.games_class_id = (SELECT games_class_id from games_class where teacher_class_id = $get_class_id AND game_id = $get_game_id) AND gwc.game_id = $game_id AND status='Activated' ORDER BY word") or die(mysqli_error($con));

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
												$contador++;
											?>
												<li id="del<?php echo $id_game_class; ?>">
												<p class="s-error center" style="color: white;" >No Disponible</p>
													<a href="games_check.php?id=<?php echo $get_class_id . '&game=' . $game_id . '&words=' . $palabras . '&clues=' . $pistas ?>" class="center classmate_cursor">
														<em class="fas fa-puzzle-piece fa-5x "></em>
													</a>
													<br>
													<p class="class"><?php echo $row['name']; ?></p>
												</li>
											<?php
											} else if ($num_pistas != $num_palabras && $game_id == 2) {
												$contador++;
											?>
												<li id="del<?php echo $id_game_class; ?>">
												<p class="s-error center" style="color: white;" >No Disponible</p>
													<a href="games_check.php?id=<?php echo $get_class_id . '&game=' . $game_id . '&words=' . $palabras . '&clues=' . $pistas ?>" class="center classmate_cursor">
														<em class="fas fa-puzzle-piece fa-5x "></em>
													</a>
													<br>
													<p class="class"><?php echo $row['name']; ?></p>
												</li>
											<?php
											} else {
												$contador++;
											?>
												<li id="del<?php echo $id_game_class; ?>">
												<p class="s-success center" style="color: white;" >Disponible</p>
													<a href="games_check.php?id=<?php echo $get_class_id . '&game=' . $game_id . '&words=' . $palabras . '&clues=' . $pistas ?>" class="center">
														<em class="fas fa-puzzle-piece fa-5x"></em>
													</a>
													<br>
													<p class="class"><?php echo $row['name']; ?></p>
												</li>
									<?php
											}
										}
									} ?>
								</ul>
								<?php if ($contador == 0) {
									echo "<h1 class='error_critic center bold'> Aún no hay juegos Disponibles</h1>";
								} ?>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>


			</div>

		</div>
		<?php include('footer-b.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>