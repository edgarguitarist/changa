<div class="span3" id="">
	<div class="row-fluid">

				      <!-- block -->
                        <div class="block mincon">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><em class="icon-pencil"></em> Crear Mensaje</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								    <ul class="nav nav-tabs">
										<li>
											<a href="student_message.php">Para Profesor</a>
										</li>
										<li class="active"><a href="student_message_student.php">Para Estudiante</a></li>
							
									</ul>
								
						

								<form method="post" id="send_message_student">
									<div class="control-group">
											<label>A:</label>
                                          <div class="controls">
                                            <select name="student_id"  class="chzn-select" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"SELECT * from student order by firstname ASC");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Contenido del mensaje:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-success"><em class="icon-envelope-alt"></em> Enviar </button>

                                          </div>
                                        </div>
                                </form>
												<script>
															jQuery(document).ready(function(){
															jQuery("#send_message_student").submit(function(e){
																	e.preventDefault();
																	var formData = jQuery(this).serialize();
																	$.ajax({
																		type: "POST",
																		url: "send_message_student_to_student.php",
																		data: formData,
																		success: function(html){
																		
																		$.jGrowl("Mensaje enviado con éxito", { header: 'Mensaje enviado' });
																		var delay = 2000;
																			setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
																		}
																	});
																	return false;
																});
															});
												</script>
								
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>