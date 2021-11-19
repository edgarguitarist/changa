<?php $words = base64_decode($_GET['words']);?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sopa de letras</title>
    <link
      rel="stylesheet"
      href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"
    />
    <link rel="stylesheet" href="./style.css" />
    <script src="../../js/icons.js"></script>
    <meta charset="UTF-8" />
    <script>
      var wordList = <?php echo $words; ?>;
      console.log(wordList);
    </script>
  </head>

  <body onload="main()">
  <div style="margin-top:25%;" id="capa" class="center-h">
      <h1>Juego de Sopa de Letras</h1>
      <br>
      <button class="btn-start" id="start"><em class="fas fa-play"></em> Comenzar</button>
  </div>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/2.2.0/knockout-min.js"></script>
  <script src="./wordsearch.js"></script>
  
</html>