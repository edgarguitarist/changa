					<?php
						$school_year_query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year_id = $school_year_query_row['school_year_id'];
						?>
				
	 				<?php $query_yes = mysqli_query($con,"SELECT *, IF('yes' IN (SELECT student_read from notification_read where notification_id = notification.notification_id and student_id = teacher_class_student.student_id), 'YES', 'NO' ) AS existe from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year_id'   order by notification.date_of_notification DESC
					")or die(mysqli_error($con));
					//$count_no = mysqli_num_rows($query_yes);
					
					$count = 0;
					
					while ($row = mysqli_fetch_array($query_yes)) {
						$id_not = $row['notification_id'];
						$existe = $row['existe'];
				
						if($existe == 'YES'){
							$query_no = mysqli_query($con, "SELECT * from notification_read where notification_id = '$id_not' and student_id = '$session_id' and student_read = 'no' and hided = 'no'") or die(mysqli_error($con));
							$count += mysqli_num_rows($query_no);
						}else{
							$count += 1;
						}
					
		         	// $query_no = mysqli_query($con,"SELECT * from notification 
					// LEFT JOIN notification_read ON notification_read.notification_id = notification.notification_id
					// where notification_read.student_id  = '$session_id'
					// ")or die(mysqli_error($con));
					// $count_yes = mysqli_num_rows($query_no);
                             
					}
		            ?>
					
					<?php $not_read = $count; ?>