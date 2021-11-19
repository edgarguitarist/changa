   <div class="row-fluid">
                        <!-- block -->
                        <div class="block mincon">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Docente</div>
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
										
										  <div class="control-group">
											<label>Area:</label>
                                          <div class="controls">
                                            <select name="paralelo"  class="" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"select * from paralelo order by paralelo_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['paralelo_id']; ?>"><?php echo $row['paralelo_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Nombres">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Apellidos">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="phone" id="focusedInput" type="text" placeholder = "Teléfono/Celular">
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><em class="icon-plus-sign icon-large"></em></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					    <?php
                            if (isset($_POST['save'])) {
                           
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $paralelo_id = $_POST['paralelo'];
								$phone = $_POST['phone'];
								
								$query = mysqli_query($con,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error($con));
								$count = mysqli_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Ya existe ese registro');
								</script>
								<?php
								}else{

                                mysqli_query($con,"insert into teacher (firstname,lastname,location,about,paralelo_id)
								values ('$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$phone','$paralelo_id')         
								") or die(mysqli_error($con)); ?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
						 
						 