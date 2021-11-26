<div class="row-fluid">
    <!-- block -->
    <div class="block mincon">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Otras Palabras Existentes no Usadas</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <select id="word" name="word" class="" required>
                                <?php
                                $user_query = mysqli_query($con, "SELECT *, IF( gw.game_word_id IN (SELECT gwc.game_word_id FROM games_words_class gwc WHERE gwc.games_class_id = $get_class_id AND gwc.game_id = $get_game_id), 'existe', 'no_existe') AS estado
                            FROM
                                games_words gw	
                            ORDER BY gw.word") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($user_query)) {
                                    $word_id = $row['game_word_id'];
                                    $word = $row['word'];
                                    if ($row['estado'] == 'no_existe') {
                                ?>
                                        <option value="<?php echo $word_id; ?>"><?php echo $word; ?></option>
                                <?php
                                    }
                                } ?>
                            </select>

                            <input type="hidden" id="game" name="game" value="<?php echo $get_game_id ?>">
                            <input type="hidden" id="class" name="class" value="<?php echo $get_class_id ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls tcenter">
                            <button name="saves" class="btn btn-info"><em class="icon-plus-sign icon-large"></em></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="center">
        <?php
        $other = mysqli_query($con, "SELECT
        *, (SELECT word FROM games_words  WHERE gwc.game_word_id = game_word_id) AS word, (SELECT clue FROM games_words_clue WHERE gwc.games_words_class_id = games_words_class_id) AS clue
    FROM
        games_words_class gwc
    WHERE gwc.games_class_id = $get_class_id AND gwc.game_id = $get_game_id AND status='Activated' ORDER BY word") or die(mysqli_error($con));

        $words = array();
        $clues = array();

        while ($rows = mysqli_fetch_assoc($other)) {
            $words[] = $rows['word'];
            if($rows['clue'] != null){
                $clues[] = $rows['clue'];
            }
        }

        $pistas = json_encode($clues);
        $num_pistas = count($clues);
        $pistas = base64_encode($pistas);
        $palabras = json_encode($words);
        $num_palabras = count($words);
        $palabras = base64_encode($palabras);

        $num_rows = mysqli_num_rows($other);
        if ($num_rows < 5) { ?>
            <span class="error_critic f-20"> El juego necesita al menos 5 palabras agregadas y activadas. </span>
        <?php
        } else if ($num_pistas != $num_palabras && $get_game_id == 2) { ?>

            <span class="error_critic f-20"> Edite el juego y agregue las pistas a las palabras en uso.</span>

        <?php } else {
        ?>
            <a href="games_check.php?id=<?php echo $get_class_id ?>&game=<?php echo $get_game_id ?>&words=<?php echo $palabras ?>&clues=<?php echo $pistas ?>" class="btn btn-success f-20 p-10"><em class="icon-check"></em> Revisar Juego</a>
        <?php
        }

        ?>
    </div>

    <!-- /block -->
</div><?php
        if (isset($_POST['saves'])) {
            $class = $_POST['class'];
            $game = $_POST['game'];
            $game_word = $_POST['word'];

            //hacer una consulta para preguntar si ya existe la palabra en la clase
            $check_word = mysqli_query($con, "SELECT * FROM games_words_class WHERE games_class_id = $class AND game_word_id = $game_word AND game_id = $game") or die(mysqli_error($con));
            $num_rows = mysqli_num_rows($check_word);
            if ($num_rows > 0) {
                echo "<script>window.location = 'games_edit.php?id=" . $class . "&game=" . $game . "</script>";
            } else {

                mysqli_query($con, "insert into games_words_class (games_class_id, game_id, game_word_id) values('$class', '$game', '$game_word')") or die(mysqli_error($con));
            }
        ?>
    <script>
        var selectobject = document.getElementById("word");
        for (var i = 0; i < selectobject.length; i++) {
            if (selectobject.options[i].value == <?php echo $game_word ?>) {
                selectobject.remove(i);
            }
        }
        window.location = "games_edit.php?id=" + $class + "&game=" + $game;
    </script>
<?php
        }
?>