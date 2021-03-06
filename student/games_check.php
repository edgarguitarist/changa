<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php 
$get_clues = isset($_GET['clues']) ? $_GET['clues'] : '';
$get_class_id = $_GET['id'];
$get_id= $_GET['id'];
$get_game_id = $_GET['game'];
?>

<script>
    var lista = <?= base64_decode($get_clues); ?>;
    console.log(lista);
</script>

<body>
    <?php include('navbar_student.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('student_class_sidebar.php'); ?>
            <div class="span9" id="content">                
                <div class="row-fluid">
                    <div id="block_bg" class="block maxcon">
                        <?php
                        if ($get_game_id == '1') { //wordsearch
                        ?>
                            <iframe title="wordsearch" width="100%" class="maxcon view110" src="../admin/games/wordsearch/wordsearch.php?words=<?= $_GET['words'];?>&clues=<?= $get_clues;?>&class=<?= $get_class_id ?> &user=<?= $_SESSION['id'] ?>&game=<?= $get_game_id?>&teacher=false" frameborder="0">
                            </iframe>
                        <?php
                        } else if ($get_game_id == '2') { //crossword
                        ?>
                            <iframe title="crossword" width="100%" class="maxcon view110" src="../admin/games/crossword/crossword.php?words=<?= $_GET['words']; ?>&clues=<?= $get_clues;?>&class=<?= $get_class_id ?> &user=<?= $_SESSION['id'] ?>&game=<?= $get_game_id?>&teacher=false" frameborder="0">
                            </iframe>
                        <?php
                        } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php //include('script.php'); 
    ?>
</body>

</html>