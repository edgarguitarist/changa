<div class="span6" id="">
    <div class="row-fluid">

        <!-- block -->
        <div id="block_bg" class="block mincon">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4> Progreso de las Historias</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Fecha</th>
                                <th>Calificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM histories WHERE id_student = $session_id and id_class = $get_id") or die(mysqli_error($con));
                            $rows = mysqli_num_rows($query);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= $row['fecha_subida']; ?></td>
                                    <td><?= $row['calificacion']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($rows === 0) {
                        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Aun no se ha enviado ninguna historia.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>