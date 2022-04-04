			<ul id="da-thumbs" class="da-thumbs w-100">
				<?php $query = mysqli_query($con, "SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN paralelo ON paralelo.paralelo_id = teacher_class.paralelo_id
										where teacher_id = '$session_id' and school_year = '$school_year_id' ") or die(mysqli_error($con));
				$count = mysqli_num_rows($query);

				if ($count > 0) {
					while ($row = mysqli_fetch_array($query)) {
						$id = $row['teacher_class_id'];

				?>
						<li id="del<?php echo $id; ?>">
							<a href="my_students.php<?php echo '?id=' . $id; ?>">
								<img src="../<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt="">
								<div>
									<span>
										<p><?php echo $row['class_name'] . ' - ' . $row['paralelo_name']; ?></p>
									</span>
								</div>
							</a>
							<p class="class"><?php echo $row['class_name'] . ' - ' . $row['paralelo_name']; ?></p>
							<p class="subject"><?php echo $row['subject_title']; ?></p>
							<div>
								<a class="center" href="#<?php echo $id; ?>" data-toggle="modal"><em class="icon-trash"></em> Eliminar</a>
							</div>

						</li>
						<?php include("delete_class_modal.php"); ?>
					<?php }
				} else { ?>
					<div class="alert alert-info w-100"><em class="icon-info-sign"></em> No tiene ningún Curso agregado aún</div>
				<?php  } ?>
			</ul>