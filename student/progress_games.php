<div class="span6" id="content">
    <div class="row-fluid">

        <!-- block -->
        <div id="block_bg" class="block mincon">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4> Progreso de los Juegos</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                        <thead>
                            <tr>
                                <th>Fecha Subida</th>
                                <th>Juego</th>
                                <th>Tiempo/Puntaje</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $query = mysqli_query($con, "SELECT * FROM games_class_student gcs INNER JOIN games g ON g.game_id = gcs.id_game
										WHERE id_student = '$session_id' AND id_class = '$get_id' 
										order by fecha DESC") or die(mysqli_error($con));
                            $rows = mysqli_num_rows($query);
                            while ($row = mysqli_fetch_array($query)) {
                                $student_id = $row['id_student'];
                            ?>
                                <tr>
                                    <td><?= $row['fecha']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['score']; ?></td>
                                </tr>

                            <?php } ?>


                        </tbody>
                    </table>
                    <?php
                    if ($rows === 0) {
                        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha jugado ningún juego.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>