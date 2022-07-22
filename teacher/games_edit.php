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
                                    <!-- <form action="delete_game_words.php<?= '?id=' . $get_id . '&game=' . $get_game_id; ?>" method="post"> -->
                                    <?php
                                    $user_query = mysqli_query($con, "SELECT * FROM games WHERE game_id= $get_game_id") or die(mysqli_error($con));
                                    $rows = mysqli_fetch_array($user_query)
                                    ?>
                                    <h2> Palabras para el <?= $rows['name']; ?> </h2>
                                    <table border="0" class="table" id="example" aria-describedby="tabla">
                                        <!-- <a data-toggle="modal" href="#word_delete" id="delete" class="btn btn-danger"><em class="icon-trash icon-large"></em></a>
                                            <?php #include('modal_delete_game_word.php'); 
                                            ?> -->
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
                                            $user_query = mysqli_query($con, "SELECT gwc.*, 
                                                g.teacher_class_id as teacher_class_id, 
                                                gwcl.clue as clue,
                                                gw.word as word
                                            from games_words_class gwc
                                                    inner join games_class g on gwc.games_class_id = g.games_class_id and teacher_class_id = $get_class_id AND g.game_id = $get_game_id
                                                     inner join games_words gw on gwc.game_word_id = gw.game_word_id
                                                    left join games_words_clue gwcl on gwc.games_words_class_id = gwcl.games_words_class_id
                                            where gwc.game_id = $get_game_id ORDER BY word") or die(mysqli_error($con));

                                            while ($row = mysqli_fetch_array($user_query)) {
                                                $game_id = $row['game_id'];
                                                $status = $row['status'];
                                                $gwi = $row['game_word_id'];
                                                $clase = $row['teacher_class_id'];
                                                $id = $row['games_words_class_id'];
                                                $clue = $row['clue'];
                                                $form_clue = '                                                    
                                                    <form style="display:flex;" action="games_add_clue.php" method="post">
                                                        <input type="hidden" name="games_words_class_id" value="' . $id . '"></input>
                                                        <input type="hidden" name="id" value="' . $get_id . '"></input>
                                                        <input type="hidden" name="game" value="' . $get_game_id . '"></input>
                                                        <input style="width:25%; height:35px; margin-right:5%;" type="text" name="clue" max="40" min="1" placeholder="Su Pista" required></input>
                                                        <button type="submit" class="btn btn-primary">Agregar</button> 
                                                    </form>';
                                                $delete_clue = '<a class"btn btn-danger" style="margin-left:10px;" href="games_delete_clue.php?games_words_class_id=' . $id . '&id=' . $get_id . '&game=' . $get_game_id . '">Borrar Pista</a>';
                                            ?>

                                                <tr id="del<?= $id; ?>">
                                                    <!-- <td width="30">
                                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?= $id; ?>">
                                                        </td> -->
                                                    <td><?= $row['word']; ?></td>
                                                    <?php if ($status == "Activated" && $clase == $get_class_id) { ?>
                                                        <td>En uso </td>
                                                        <?php if ($get_game_id == 2 && $clue != null) { ?>
                                                            <td style="display: flex; justify-content: space-between;" id="clue"><?= $clue . $delete_clue; ?></td>
                                                        <?php } else if ($get_game_id == 1) { ?>
                                                            <!-- <td id="clue">Sin Pista</td> -->
                                                        <?php } else { ?>
                                                            <td id="clue">
                                                                <?= $form_clue ?></td> <!-- TODO: Revisar que funcione el formulario correctamente -->
                                                        <?php } ?>
                                                        <td width="120"><a href="games_word_changer.php<?= '?game=' . $get_game_id . '&class=' . $get_class_id . '&status=' . $status . '&word=' . $gwi; ?>" class="btn btn-danger"><em class="icon-remove"></em> Desactivar</a></td>
                                                    <?php } else { ?>
                                                        <td>No usada</td>
                                                        <?php if ($get_game_id == 2 && $clue != null) { ?>
                                                            <td style="display: flex; justify-content: space-between;" id="clue2"><?= $clue . $delete_clue; ?></td>
                                                        <?php } else if ($get_game_id == 1) { ?>
                                                            <!-- <td id="clue">Sin Pista</td> -->
                                                        <?php } else { ?>
                                                            <td id="clue"><?= $form_clue ?></td>
                                                        <?php } ?>
                                                        <td width="120"><a href="games_word_changer.php<?= '?game=' . $get_game_id . '&class=' . $get_class_id . '&status=' . $status . '&word=' . $gwi; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- </form> -->
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