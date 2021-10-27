<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_class_id = $_GET['id'];
$get_game_id = $_GET['game']; ?>

<body>
    <?php include('navbar_teacher.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar_class.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_words.php');?>
                <?php include('add_words_class.php');?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">

                    <!-- block -->

                    <div id="block_bg" class="block mincon">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Juegos</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_words.php" method="post">
                                    <div class="control-group">
                                        <?php
                                        $user_query = mysqli_query($con, "SELECT * FROM games WHERE game_id= $get_game_id") or die(mysqli_error($con));
                                        $rows = mysqli_fetch_array($user_query)
                                        ?>
                                        <h2> Palabras para el <?php echo $rows['name']; ?> </h2>
                                        <table border="0" class="table" id="example" aria-describedby="tabla">
                                            <!-- <a data-toggle="modal" href="#anio_delete" id="delete" class="btn btn-danger"><i class="icon-trash icon-large"></i></a> -->
                                            <?php include('modal_delete.php'); ?>
                                            <thead>
                                                <tr>
                                                    <th>Palabras</th>
                                                    <th>Estado</th>
                                                    <th></th> <!-- Agregar/Quitar -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_query = mysqli_query($con, "SELECT *
                                                FROM
                                                    games_words gw
                                                LEFT JOIN games_words_class gwc ON
                                                    gw.game_word_id = gwc.game_word_id
                                                WHERE 
                                                    gwc.games_class_id = $get_class_id AND gw.game_id = $get_game_id
                                                ORDER BY gw.word") or die(mysqli_error($con));
                                                
                                                

                                                while ($row = mysqli_fetch_array($user_query)) {
                                                    $id = $row['game_id'];
                                                    $status = $row['status'];
                                                    $gwi = $row['game_word_id'];
                                                    $clase = $row['games_class_id'];                                                    
                                                ?>
                                                    
                                                    <tr>
                                                        <td><?php echo $row['word']; ?></td>
                                                        <?php if ($status == "Activated" && $clase == $get_class_id) { ?>
                                                            <td>En uso</td>
                                                            <td width="120"><a href="games_word_changer.php<?php echo '?id=' . $id . '&class=' . $get_class_id . '&status=' . $status. '&word=' . $gwi; ?>" class="btn btn-danger"><i class="icon-remove"></i> Desactivar</a></td>
                                                        <?php } else { ?>
                                                            <td>No usada</td>
                                                            <td width="120"><a href="games_word_changer.php<?php echo '?id=' . $id . '&class=' . $get_class_id . '&status=' . $status. '&word=' . $gwi; ?>" class="btn btn-success"><i class="icon-check"></i> Activar</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block  -->
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>