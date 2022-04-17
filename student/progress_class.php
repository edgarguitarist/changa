<?php $class_query = mysqli_query($con, "SELECT * from teacher_class
									LEFT JOIN class ON class.class_id = teacher_class.class_id
									LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
									LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
									where teacher_class_id = '$get_id'") or die(mysqli_error($con));
$class_row = mysqli_fetch_array($class_query);
$class_id = $class_row['class_id'];
$school_year = $class_row['school_year'];
