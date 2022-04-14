<?php $words = base64_decode($_GET['words']); ?>
<?php $clues = base64_decode($_GET['clues']); ?>
<?php
$teacher = $_GET['teacher'];
echo '<script> var teacher = ' . $teacher . '</script>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - crossword</title>
  <link rel="stylesheet" href="./style.css">
  <script>
    let words = <?php echo $words; ?>;
    let clues = <?php echo $clues; ?>;
    var game = <?= $_GET['game']; ?>;
    var user = <?= $_GET['user']; ?>;
    var class_id = <?= $_GET['class']; ?>;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</head>

<body>
  <!-- partial:index.partial.html -->
  <br><br>
  <!-- <div id="debugger"></div> -->
  <div class="center-h">
    <h2>Crucigrama</h2>
  </div>
  <br><br>
  <div id="container">
    <table id="table1" cellspacing="0">
      <tr>
        <td rowspan="2" style="text-align: center; width: 50%; height: 100%" valign="top">
          <div id="crossword"></div>
          <p id="dir">Estas yendo <span id="direction"> Horizontalmente</span><br />(haga doble clic en las intersecciones para alternar)</p>
        </td>
        <td style="width: 50%; height: 100%" valign="top">
          <table id="clues" cellspacing="0" style="width: 200px; height: 170px">
            <tr>
              <td><strong>Horizontales</strong></td>
            </tr>
            <tr>
              <td>
                <ul id="across">
                </ul>
              </td>
            </tr>
            <tr>
              <td><strong>Verticales</strong></td>
            </tr>
            <tr>
              <td>
                <ul id="down">
                </ul>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="width: 50%; text-align: center" valign="top">
          <div style="font-weight:bold;" id="tries">Te quedan 3 Intentos</div>
          <button id="checkBtn" class="btn" onclick="countTries()">Revisar Respuestas</button>
          <button id="showBtn" class="btn" disabled onclick="showAnswers()">Mostrar Respuestas</button>
          <button id="resetBtn" class="btn" onclick="reset()">Reiniciar</button>
        </td>
      </tr>
    </table>
  </div>
  <!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="./script.js"></script>

</body>

</html>