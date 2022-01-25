<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id'];
$get_class_id = $_GET['id']; ?>
<link rel="stylesheet" href="../admin/css/form_signup.css">

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
                            <li><a href="#"><b>Historias</b></a></li>
                        </ul>

                    </div><!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block mincon">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">
                                <h1 class="control-label">Tus Historias</h1>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <iframe title="" width="100%" style="height: 120vh !important;" class="maxcon" src="../admin/games/histories/" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>


            </div>

        </div>
    </div>
    <?php include('script.php'); ?>
</body>
<?php include('footer.php'); ?>


</html>