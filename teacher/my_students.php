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
						 <?php include('my_students_breadcrums.php'); ?>
						 <div class="right">
						 	<a href="add_student.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><em class="icon-plus-sign"></em> Agregar Estudiante</a>
							<a onclick="window.open('print_student.php<?php echo '?id='.$get_id; ?>')"  class="btn btn-success"><em class="icon-list"></em> Lista Estudiantes</a>
						</div>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
								<?php 
								$my_student = mysqli_query($con,"SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														LEFT JOIN class ON class.class_id = student.class_id 
														LEFT JOIN school_year ON school_year.school_year_id= student.cod_ciclo 
														where teacher_class_id = '$get_id' and school_year.status='Activated'
														order by lastname ")or die(mysqli_error($con));
														
								/*$my_student = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
										where teacher_class_id = '$get_id'")or die(mysqli_error());*/
										
								$count_my_student = mysqli_num_rows($my_student);?>
								Numero de estudiantes: <span class="badge badge-info"><?php echo $count_my_student; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul	 id="da-thumbs" class="da-thumbs">
										    <?php
														$my_student = mysqli_query($con,"SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id 
														LEFT JOIN school_year ON school_year.school_year_id= student.cod_ciclo 
														where teacher_class_id = '$get_id' and school_year.status='Activated' order by lastname ")or die(mysqli_error($con));
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>
											<li id="del<?php echo $id; ?>">
													<a href="#">
															<img id="student_avatar_class" src ="../admin/<?php echo $row['location'] ?>" width="124" height="140" class="img-polaroid">
														<div>
														<span>
														<p><?php ?></p>
														
														</span>
														</div>
													</a>
													<p class="class"><?php echo $row['lastname'];?></p>
													<p class="subject"><?php echo $row['firstname']; ?></p>
													<a  href="#<?php echo $id; ?>" data-toggle="modal"><em class="icon-trash"></em> Eliminar</a>	
											</li>
											<?php include("remove_student_modal.php"); ?>
											<?php } ?>
									</ul>
												<script type="text/javascript">
													$(document).ready( function() {
														$('.remove').click( function() {
														var id = $(this).attr("id");
															$.ajax({
															type: "POST",
															url: "remove_student.php",
															data: ({id: id}),
															cache: false,
															success: function(html){
																$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
																$('#'+id).modal('hide');
																$.jGrowl("Your Student is Successfully Remove", { header: 'Student Remove' });
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
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>