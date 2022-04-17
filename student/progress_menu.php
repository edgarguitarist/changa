<style>
    #p_container {
        margin: 40% 0% 20%;
        padding: 0;
        width: 100%;
    }

    .recuadro {
        border: 1px solid black;
        width: 49.1%;
        display: inline-block;
        height: 29.5vh;
        overflow: hidden;
        justify-content: center;
    }

    .centrador {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

   
</style>
<div id="p_container">
    <div class='recuadro'>
        <div class="centrador">
            <a class="is-size-4 button is-link is-outlined" href="progress_apk.php?id=<?= $get_id ?>&user_id=<?= $session_id ?>&view=practica"><em class="fas fa-book-reader"></em>Deberes</a>
        </div>
    </div>
    <div class='recuadro'>
        <div class="centrador">
            <a class="is-size-4 button is-link is-outlined" href="progress_apk.php?id=<?= $get_id ?>&user_id=<?= $session_id ?>&view=exam"><em class="fas fa-book-open"></em> Examenes</a>
        </div>
    </div>
    <br>
    <div class='recuadro'>
        <div class="centrador">
            <a class="is-size-4 button is-link is-outlined" href="progress_apk.php?id=<?= $get_id ?>&user_id=<?= $session_id ?>&view=games"><em class="fas fa-puzzle-piece"></em> Juegos</a>
        </div>
    </div>
    <div class='recuadro'>
        <div class="centrador">
            <a class="is-size-4 button is-link is-outlined" href="progress_apk.php?id=<?= $get_id ?>&user_id=<?= $session_id ?>&view=histories"><em class="fas fa-theater-masks"></em> Historias</a>
        </div>
    </div>
</div>