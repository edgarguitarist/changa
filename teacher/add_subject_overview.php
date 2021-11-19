<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_class.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					  <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Descripción de Curso</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block mincon">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
								<a href="subject_overview.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><em class="icon-arrow-left"></em> Atrás</a>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  								  <form class="form-horizontal" method="post">
								
										
								
										<div class="control-group">
											<label class="control-label" for="inputPassword">Descripción de Curso:</label>
											<div class="controls">
													<textarea name="content" id="ckeditor_full"></textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-success"><em class="icon-save"></em> Guardar</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['save'])){
										$content = $_POST['content'];
										mysqli_query($con,"insert into class_subject_overview	(teacher_class_id,content) values('$get_id','$content')")or die(mysqli_error($con));
										?>
										<script>
											window.location = 'subject_overview.php<?php echo '?id='.$get_id; ?>';
										</script>
										<?php
										}
										
										?>
						
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