<div class="span6" id="content">
    <div class="row-fluid">

        <!-- block -->
        <div id="block_bg" class="block mincon">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4> Progreso de las Prácticas</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                        <thead>
                            <tr>
                                <th>Fecha Subida</th>
                                <th>Tarea</th>

                                <th>Nota</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $query = mysqli_query($con, "SELECT * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id  AND assignment.class_id = '$class_id'
										WHERE student_assignment.student_id = '$session_id'
										order by fdatein DESC") or die(mysqli_error($con));
                            $rows = mysqli_num_rows($query);
                            while ($row = mysqli_fetch_array($query)) {
                                $id  = $row['student_assignment_id'];
                                $student_id = $row['student_id'];
                            ?>
                                <tr>
                                    <td><?= $row['fdatein']; ?></td>
                                    <td><?= $row['fname']; ?></td>

                                    <?php if ($session_id == $student_id) { ?>
                                        <td>
                                            <span class="badge badge-success"><?= $row['grade']; ?></span>
                                        </td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
                                </tr>

                            <?php } ?>


                        </tbody>
                    </table>
                    <?php
                    if ($rows === 0) {
                        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se han enviado tareas.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>