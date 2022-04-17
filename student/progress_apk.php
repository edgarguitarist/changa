<?php

$get_id = $_GET['id'];
$session_id = $_GET['user_id'];
$view = $_GET['view'] ?? '';

include('header_dashboard.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<style>
    .body_apk {
        margin: 10% 4% 0%;
        max-width: 92% !important;
        width: 93% !important;
    }

    .bottom-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        margin-bottom: 100px;
        background-color: #fff;
        border-top: 1px solid #e5e5e5;
        text-align: center;
        z-index: 1;
    }
    em,
    svg {
        margin-right: 10px;
    }
    a, a:link, a:visited, a:hover, a:active {
        text-decoration: none;
    }
</style>

<body class="body_apk">

    <?php
    include('progress_class.php');
    if($view != ''){
        ?>
        
        <a class="is-size-4 button is-link is-outlined" href="progress_apk.php?id=<?= $get_id ?>&user_id=<?= $session_id ?>"><em class="fas fa-undo-alt"></em> Regresar</a>

        
        <?php
    }
    if ($view == 'practica') {
        include('progress_practica.php');
    } else if ($view == 'exam') {
        include('progress_exam.php');
    } else if ($view == 'games') {
        include('progress_games.php');
    } else if ($view == 'histories') {
        include('progress_histories.php');
    } else {
        include('progress_menu.php');
    }

    ?>
</body>
<?php
include('footer-apk.php');
?>

</html>