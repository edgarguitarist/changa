<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_class_id = $_GET['id'];
$get_id = $_GET['id'];
$get_game_id = $_GET['game']; ?>

<body>
    <?php include('navbar_teacher.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar_class.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_words.php'); ?>
                <?php include('add_words_class.php'); ?>
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
                                <div class="control-group">
                                    <form action="delete_game_words.php<?php echo '?id=' . $get_id . '&game=' . $get_game_id; ?>" method="post">
                                        <?php
                                        $user_query = mysqli_query($con, "SELECT * FROM games WHERE game_id= $get_game_id") or die(mysqli_error($con));
                                        $rows = mysqli_fetch_array($user_query)
                                        ?>
                                        <h2> Palabras para el <?php echo $rows['name']; ?> </h2>
                                        <table border="0" class="table" id="example" aria-describedby="tabla">
                                            <a data-toggle="modal" href="#word_delete" id="delete" class="btn btn-danger"><em class="icon-trash icon-large"></em></a>
                                            <?php include('modal_delete_game_word.php'); ?>
                                            <thead>
                                                <tr>
                                                    <th> </th>
                                                    <th id="words">Palabras</th>
                                                    <th id="status">Estado</th> <!-- DOIT: AGREGAR PISTA PARA PALABRAS DEL CRUCIGRAMA -->
                                                    <?php if ($get_game_id == 2) { ?>
                                                        <th id="clue">Pista</th>
                                                    <?php } ?>
                                                    <th id="actions"></th> <!-- Agregar/Quitar -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_query = mysqli_query($con, "SELECT
                                                *, (SELECT word FROM games_words  WHERE gwc.game_word_id = game_word_id) AS word, (SELECT clue FROM games_words_clue WHERE gwc.games_words_class_id = games_words_class_id) AS clue
                                            FROM
                                                games_words_class gwc
                                            WHERE gwc.games_class_id = $get_class_id AND gwc.game_id = $get_game_id ORDER BY word") or die(mysqli_error($con));

                                                while ($row = mysqli_fetch_array($user_query)) {
                                                    $game_id = $row['game_id'];
                                                    $status = $row['status'];
                                                    $gwi = $row['game_word_id'];
                                                    $clase = $row['games_class_id'];
                                                    $id = $row['games_words_class_id'];
                                                    $clue = $row['clue'];
                                                ?>

                                                    <tr id="del<?php echo $id; ?>">
                                                        <td width="30">
                                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                        </td>
                                                        <td><?php echo $row['word']; ?></td>
                                                        <?php if ($status == "Activated" && $clase == $get_class_id) { ?>
                                                            <td>En uso </td>
                                                            <?php if ($get_game_id == 2 && $clue != null) { ?>
                                                                <td id="clue"><?= $clue ?></td>
                                                            <?php }else if($get_game_id == 1){?>
                                                                <!-- <td id="clue">Sin Pista</td> -->
                                                            <?php } else {?>
                                                                <td id="clue">Sin Pista</td> <!-- DOIT: AGREGAR BOTON PARA PONER LAS PISTAS DE LAS PALABRAS DEL CRUCIGRAMA -->
                                                            <?php } ?>
                                                            <td width="120"><a href="games_word_changer.php<?php echo '?game=' . $game_id . '&class=' . $get_class_id . '&status=' . $status . '&word=' . $gwi; ?>" class="btn btn-danger"><em class="icon-remove"></em> Desactivar</a></td>
                                                        <?php } else { ?>
                                                            <td>No usada</td>
                                                            <?php if ($get_game_id == 2 && $clue != null) { ?>
                                                                <td id="clue"><?= $clue ?></td>
                                                            <?php }else if($get_game_id == 1){?>
                                                                <!-- <td id="clue">Sin Pista</td> -->
                                                            <?php } else {?>
                                                                <td id="clue">Sin Pista</td> <!-- DOIT: AGREGAR BOTON PARA PONER LAS PISTAS DE LAS PALABRAS DEL CRUCIGRAMA -->
                                                            <?php } ?>
                                                            <td width="120"><a href="games_word_changer.php<?php echo '?game=' . $game_id . '&class=' . $get_class_id . '&status=' . $status . '&word=' . $gwi; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
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