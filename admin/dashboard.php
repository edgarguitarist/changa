<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('navbar.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid"></div>

                <div class="row-fluid">

                    <!-- block -->

                    <div id="" class="block mincon">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><em class="icon-dashboard">&nbsp;</em>Inicio </div>
                            <div class="muted pull-right"><em class="icon-time"></em>&nbsp;</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <div class="block-content collapse in">
                                    <div id="page-wrapper">
                                        <?php
                                        $student = mysqli_query($con, "select * from teacher where teacher_status = 'Registered' ") or die(mysql_error());
                                        $student = mysqli_num_rows($student);
                                        ?>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="fa fa-user fa-5x"></em><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student; ?></div>
                                                                    <div>Docentes Registrados</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="teachers.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Agregar docente</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            $student = mysqli_query($con, "select * from student where status='Registered'") or die(mysql_error());
                                            $student = mysqli_num_rows($student);
                                            ?>
                                            <div class="span6">
                                                <div class="panel panel-green">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="fa fa-users  fa-5x" aria-hidden="true"></em><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student; ?></div>
                                                                    <div>Estudiantes Registrados</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="students.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Agregar estudiantes</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="page-wrapper">
                                        <?php
                                        $student = mysqli_query($con, "select * from class") or die(mysql_error());
                                        $student = mysqli_num_rows($student);
                                        ?>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="panel panel-brown">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="fa fa-sitemap  fa-5x" aria-hidden="true"></em>
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student; ?></div>
                                                                    <div>Cursos</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="class.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Agregar Curso</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            $student1 = mysqli_query($con, "select * from subject") or die(mysql_error());
                                            $student1 = mysqli_num_rows($student1);
                                            ?>
                                            <div class="span6">
                                                <div class="panel panel-red">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="fa fa-book  fa-5x"></em><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student1; ?></div>
                                                                    <div>Materias</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="subjects.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Agregar Materia</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="page-wrapper">
                                        <?php
                                        $student = mysqli_query($con, "select * from paralelo") or die(mysql_error());
                                        $student = mysqli_num_rows($student);
                                        ?>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="panel panel-yellow">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="fa fa-graduation-cap  fa-5x" aria-hidden="true"></em>
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student; ?></div>
                                                                    <div>Programas de estudio</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="paralelo.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Agregar programa de estudios</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            $student1 = mysqli_query($con, "select DISTINCT fdesc from files") or die(mysql_error());
                                            $student1 = mysqli_num_rows($student1);
                                            ?>
                                            <div class="span6">
                                                <div class="panel panel-purple">
                                                    <div class="panel-heading">
                                                        <div class="container-fluid">
                                                            <div class="row-fluid">
                                                                <div class="span3"><br />
                                                                    <em class="far fa-file-pdf fa-5x"></em><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge"><?php echo $student1; ?></div>
                                                                    <div>Pr??cticas</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="downloadable.php">
                                                        <div class="modal-footer">
                                                            <span class="pull-left">Pr??cticas</span>
                                                            <span class="pull-right"><em class="icon-chevron-right"></em></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /block -->



            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>