   <div class="row-fluid">
       <a href="teachers.php" class="btn btn-info"><em class="icon-plus-sign icon-large"></em> Agregar Profesor</a>
                        <!-- block -->
                        <div class="block mincon">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Profesor</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								<!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->	
									<?php
									$query = mysqli_query($con,"select * from teacher where teacher_id = '$get_id' ")or die(mysqli_error($con));
									$row = mysqli_fetch_array($query);
									?>
										
										  <div class="control-group">
											<label>Paralelo</label>
                                          <div class="controls">
                                            <select name="paralelo"  class="chzn-select"required>
											<?php
											$query_teacher = mysqli_query($con,"select * from teacher join  paralelo")or die(mysqli_error($con));
											$row_teacher = mysqli_fetch_array($query_teacher);
											
											?>
											
                                             	<option value="<?php echo $row_teacher['paralelo_id']; ?>">
												<?php echo $row_teacher['paralelo_name']; ?>
												</option>
											<?php
											$paralelo = mysqli_query($con,"select * from paralelo order by paralelo_name");
											while($paralelo_row = mysqli_fetch_array($paralelo)){
											
											?>
											<option value="<?php echo $paralelo_row['paralelo_id']; ?>"><?php echo $paralelo_row['paralelo_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Nombres">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Apellidos">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['about']; ?>"  name="phone" id="focusedInput" type="text" placeholder = "Teléfono/Celular">
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><em class="icon-save icon-large"></em></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
				   <?php
                            if (isset($_POST['update'])) {
                       
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $paralelo_id = $_POST['paralelo'];
								$phone = $_POST['phone'];
								
								$query = mysqli_query($con,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error($con));
								$count = mysqli_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Ya existe ese registro');
								</script>
								<?php
								}else{
								
								mysqli_query($con,"update teacher set firstname = '$firstname' , lastname = '$lastname' , paralelo_id = '$paralelo_id' , about = '$phone' where teacher_id = '$get_id' ")or die(mysqli_error($con));	
								
								?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
						 
						 