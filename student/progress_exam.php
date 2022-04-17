<div class="span6" id="">
    <div class="row-fluid">

        <!-- block -->
        <div id="block_bg" class="block mincon">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4> Progreso de Examenes</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                        <thead>
                            <tr>
                                <th>Titulo de Examen</th>
                                <th>Descripcion</th>
                                <th>TIEMPO DE EXAMEN (EN MINUTOS)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id' order by class_quiz_id DESC ") or die(mysqli_error($con));
                            $rows = mysqli_num_rows($query);
                            while ($row = mysqli_fetch_array($query)) {
                                $id  = $row['class_quiz_id'];
                                $quiz_id  = $row['quiz_id'];
                                $quiz_time  = $row['quiz_time'];

                                $query1 = mysqli_query($con, "SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'") or die(mysqli_error($con));
                                $row1 = mysqli_fetch_array($query1);
                                $grade = $row1['grade'];

                            ?>
                                <?php if ($grade == "") {
                                } else { ?>
                                    <tr>
                                        <td><?= $row['quiz_title']; ?></td>
                                        <td><?= $row['quiz_description']; ?></td>
                                        <td><?= $row['quiz_time'] / 60; ?></td>
                                        <td width="200">

                                            <b>Puntaje logrado <?= $grade; ?></b>

                                        </td>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?= $id; ?>Hacer esta tarea').tooltip('show');
                                                $('#<?= $id; ?>Hacer esta tarea').tooltip('hide');
                                            });
                                        </script>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($rows === 0) {
                        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha realizado ningún Examen.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>