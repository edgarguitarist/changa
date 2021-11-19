						<!-- block -->
						<div class="block mincon" style=" min-height:min-content;">
							<div class="navbar navbar-inner block-header">
								<div id="" class="muted pull-left">
									<h4><em class="icon-plus-sign"></em> Agregar Curso</h4>
								</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<form method="post" id="add_class">
										<div class="control-group">
											<label>Curso:</label>
											<div class="controls">
												<input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
												<select name="class_id" class="" required>
													<option></option>
													<?php
													$query = mysqli_query($con, "SELECT * from class order by class_name");
													while ($row = mysqli_fetch_array($query)) {

													?>
														<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label>Paralelo:</label>
											<div class="controls">
												<select name="paralelo_id" class="" required>
													<option></option>
													<?php
													$query = mysqli_query($con, "SELECT * from paralelo order by paralelo_name");
													while ($row = mysqli_fetch_array($query)) {

													?>
														<option value="<?php echo $row['paralelo_id']; ?>"><?php echo $row['paralelo_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label>Materia:</label>
											<div class="controls">
												<select name="subject_id" class="" required>
													<option></option>
													<?php
													$query = mysqli_query($con, "SELECT * from subject order by subject_code");
													while ($row = mysqli_fetch_array($query)) {
													?>
														<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_title']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label>Periodo:</label>
											<div class="controls">
												<select name="school_year" class="" required>
													<option></option>
													<?php
													$query = mysqli_query($con, "SELECT * from school_year where status='Activated' order by school_year DESC");
													while ($row = mysqli_fetch_array($query)) {

													?>
														<option value="<?php echo $row['school_year_id']; ?>"><?php echo $row['school_year']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label for="code">Codigo (6 Caracteres)</label>
											<div class="controls">
												<input minlength="6" maxlength="6" type="text" name="code" class="form-control" required>
											</div>
										</div>
										<div class="control-group">
											<div class="controls" style="text-align: center;">
												<button name="save" class="btn btn-success"><em class="icon-save"></em> Guardar</button>
											</div>
										</div>
									</form>

									<script>
										jQuery(document).ready(function($) {
											$("#add_class").submit(function(e) {
												e.preventDefault();
												var _this = $(e.target);
												var formData = $(this).serialize();
												$.ajax({
													type: "POST",
													url: "add_class_action.php",
													data: formData,
													success: function(html) {
														if (html == "true") {
															$.jGrowl("Curso existente", {
																header: 'El Curso ya existe'
															});
														} else if( html == "false") {
															$.jGrowl("Codigo ya existe en otro Curso", {
																header: 'El Codigo ya existe'
															});
														} else {
															$.jGrowl("Curso agregado exitosamente", {
																header: 'Curso agregado'
															});
															var delay = 500;
															setTimeout(function() {
																window.location = 'dasboard_teacher.php'
															}, delay);
														}
													}
												});
											});
										});
									</script>

								</div>
							</div>
						</div>
						<!-- /block -->