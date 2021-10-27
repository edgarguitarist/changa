<div class="row-fluid">
    <!-- block -->
    <div class="block mincon">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Añadir Palabra Nueva</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input name="palabra" class="input focused" id="focusedInput" type="text" placeholder="Palabra" minlength="4" maxlength="30" required>
                            <input type="hidden" id="game" name="game" value="<?php echo $get_game_id ?>">
                            <input type="hidden" id="class" name="class" value="<?php echo $get_class_id ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls tcenter">
                            <button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div><?php
        if (isset($_POST['save'])) {
            $class = $_POST['class'];
            $game = $_POST['game'];
            $palabra = $_POST['palabra'];

            $query = mysqli_query($con, "SELECT * FROM games_words WHERE word  =  '$palabra' ") or die(mysqli_error($con));
            $count = mysqli_num_rows($query);

            if ($count > 0) { ?>
                <script>
                    alert('La Palabra ya Existe');
                </script>
            <?php
            } else {
                //                
                mysqli_query($con, "insert into games_words (word, game_id) values('$palabra', '$game')") or die(mysqli_error($con));
                $query = mysqli_query($con, "SELECT * FROM games_words WHERE word  =  '$palabra' ") or die(mysqli_error($con));
                $rows = mysqli_fetch_array($query);
                $game_word = $rows['game_word_id'];
                mysqli_query($con, "insert into games_words_class (games_class_id, game_id, game_word_id) values('$class', '$game', '$game_word')") or die(mysqli_error($con));

            ?>
                <script>
                    window.location = "games_edit.php?id=" + $class + "&game=" + $game;
                </script>
            <?php
            }
        }
?>