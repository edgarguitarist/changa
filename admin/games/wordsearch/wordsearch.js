// Variables
var trace = console.log.bind(console);
var alphabet = [
  "a",
  "b",
  "c",
  "d",
  "e",
  "f",
  "g",
  "h",
  "i",
  "j",
  "k",
  "l",
  "m",
  "n",
  "ñ",
  "o",
  "p",
  "q",
  "r",
  "s",
  "t",
  "u",
  "v",
  "w",
  "x",
  "y",
  "z",
];
var answeredList = [];
var rand1 = 0;
var rand2 = 0;
var wLength = 0;
var writable = false;
var totalWordLength = 0;
var maxWordLength = 0;
var timer = "00:00.00";
var tick = 0;
var timerStarted = true;
var allAnswered = false;

function sizeSort(a, b) {
  if (a.length > b.length) {
    return 1;
  } else if (a.length == b.length) {
    return 0;
  } else {
    return -1;
  }
}

wordList.sort(sizeSort);

// Pass width + height and it returns a 2D Array
function create2dArray(width, height) {
  var x = new Array(height);
  for (var i = 0; i < height; i++) {
    x[i] = new Array(width);
  }
  return x;
}

//Find the length of the longest word
for (var i = 0; i < wordList.length; i++) {
  if (wordList[i].length > maxWordLength) {
    maxWordLength = wordList[i].length;
  }
  totalWordLength += wordList[i].length;
}

var dimensions = Math.ceil(Math.sqrt(totalWordLength)) + 5;

if (dimensions < maxWordLength) {
  dimensions = maxWordLength + 5;
}

var wordSearch = create2dArray(dimensions, dimensions);

// Add a Horizontal Word to the array.
function addH(word, array) {
  wLength = word.length;
  rand1 = Math.floor(Math.random() * wordSearch.length);
  rand2 = Math.floor(Math.random() * (wordSearch.length - wLength));

  if (rand1 < 0) {
    rand1 = 0;
  }
  if (rand2 < 0) {
    rand2 = 0;
  }
  if (rand2 + wLength <= array[rand1].length) {
    for (var n = 0; n < wLength; n++) {
      if (
        typeof array[rand1][rand2 + n] == "undefined" ||
        array[rand1][rand2 + n] === null ||
        array[rand1][rand2 + n] == word.charAt(n)
      ) {
        writable = true;
      } else {
        writable = false;
        break;
      }
    }
  }

  if (writable && rand2 + wLength <= array[rand1].length) {
    for (var i = 0; i < wLength; i++) {
      array[rand1][rand2 + i] = word.charAt(i);
    }
    return true;
  } else {
    return false;
  }
}

function addV(word, array) {
  wLength = word.length;
  rand1 = Math.floor(Math.random() * (wordSearch.length - wLength));
  rand2 = Math.floor(Math.random() * wordSearch.length);

  if (rand1 < 0) {
    rand1 = 0;
  }
  if (rand2 < 0) {
    rand2 = 0;
  }
  if (rand1 + wLength <= array.length) {
    for (var n = 0; n < wLength; n++) {
      if (
        typeof array[rand1 + n][rand2] == "undefined" ||
        array[rand1 + n][rand2] === null ||
        array[rand1 + n][rand2] == word.charAt(n)
      ) {
        writable = true;
      } else {
        writable = false;
        break;
      }
    }
  }

  if (writable && rand1 + wLength <= array.length) {
    for (var i = 0; i < wLength; i++) {
      array[rand1 + i][rand2] = word.charAt(i);
    }
    return true;
  } else {
    return false;
  }
}

function addD(word, array) {
  wLength = word.length;
  rand1 = Math.floor(Math.random() * (wordSearch.length - wLength));
  rand2 = Math.floor(Math.random() * (wordSearch.length - wLength));

  if (rand1 < 0) {
    rand1 = 0;
  }
  if (rand2 < 0) {
    rand2 = 0;
  }
  if (
    rand1 + wLength <= array.length &&
    rand2 + wLength <= array[rand1].length
  ) {
    for (var n = 0; n < wLength; n++) {
      if (
        typeof array[rand1 + n][rand2 + n] == "undefined" ||
        array[rand1 + n][rand2 + n] === null ||
        array[rand1 + n][rand2 + n] == word.charAt(n)
      ) {
        writable = true;
      } else {
        writable = false;
        break;
      }
    }
  }

  if (
    writable &&
    rand1 + wLength <= array.length &&
    rand2 + wLength <= array.length
  ) {
    for (var i = 0; i < wLength; i++) {
      array[rand1 + i][rand2 + i] = word.charAt(i);
    }
    return true;
  } else {
    return false;
  }
}

function msToTime(s) {
  function addZ(n) {
    return (n < 10 ? "0" : "") + n;
  }

  var ms = s % 1000;
  s = (s - ms) / 1000;
  var secs = s % 60;
  s = (s - secs) / 60;
  var mins = s % 60;
  var hrs = (s - mins) / 60;

  return addZ(mins) + ":" + addZ(secs) + "." + ms;
}

function selectDirection(word, array) {
  var status = false;
  for (var i = 0; i < 1000; i++) {
    status = false;
    if (Math.floor(Math.random() * 3) + 1 == 1) {
      status = addH(word, array);
    } else if (Math.floor(Math.random() * 3) + 1 == 2) {
      status = addD(word, array);
    } else {
      status = addV(word, array);
    }
    if (status) {
      break;
    }
  }
  if (!status) {
    selectDirection(word, array);
    //wordList.splice(wordList.indexOf(word), 1);
  }
}

for (var l = wordList.length - 1; l >= 0; l--) {
  wordList[l] = wordList[l].toUpperCase();
  selectDirection(wordList[l], wordSearch);
}

// OUTPUT
function output() {
  document.writeln(
    "<div id='juego' style='text-align: -webkit-center;'><div style='text-align:center'><h2>Sopa de Letras</h2><div style='text-align: left; margin-left: 20px;'><h4>Tiempo Transcurrido:</h4><h4 id='timer' class='danger'>00:00.000</h4></div></div>"
  );
  document.getElementById("juego").style.display = "none";
  document.writeln("<table><tr><td>");
  document.writeln("<table id='wsearch' cellspacing='0px' class='wsearchcss'>");
  document.writeln("<tr>");
  for (var j = 0; j < wordSearch.length; j++) {
    for (var k = 0; k < wordSearch[j].length; k++) {
      if (typeof wordSearch[j][k] != "undefined") {
        if (k != wordSearch[j].length - 1) {
          document.writeln(
            "<td id='" + j + "-" + k + "'>" + wordSearch[j][k] + "</td>"
          );
        } else {
          document.writeln(
            "<td id='" + j + "-" + k + "'>" + wordSearch[j][k] + "</td>"
          );
          document.writeln("</tr>");
          document.writeln("<tr>");
        }
      } else {
        if (k != wordSearch[j].length - 1) {
          wordSearch[j][k] =
            alphabet[Math.floor(Math.random() * alphabet.length)].toUpperCase();
          document.writeln(
            "<td id='" + j + "-" + k + "'>" + wordSearch[j][k] + "</td>"
          );
        } else {
          wordSearch[j][k] =
            alphabet[Math.floor(Math.random() * alphabet.length)].toUpperCase();
          document.writeln(
            "<td id='" + j + "-" + k + "'>" + wordSearch[j][k] + "</td>"
          );
          document.writeln("</tr>");
          document.writeln("<tr>");
        }
      }
    }
  }
  document.writeln("</tr>");
  document.writeln("</table>");
  document.writeln("</td><td>");
  document.writeln("<table id='ans' class='anscss'>");
  for (var i = 0; i < wordList.length; i++) {
    if (i % 2 === 0) {
      document.write("<tr><td class='answers'>");
      document.write(wordList[i]);
      document.writeln("</td>");
    } else {
      document.write("<td class='answers'>");
      document.write(wordList[i]);
      document.writeln("</td></tr>");
    }
  }
  document.writeln("</td></tr></table>");
  document.writeln("</table>");
  document.writeln("<div>");
  document.writeln("<button style='display:none;' class='btn-warning' id='reiniciar'><em class='fas fa-sync'></em> Reiniciar</button>");
  document.writeln("<button style='display:none;' onclick='saveScore()' class='btn-start' id='guardar'><em class='fas fa-save'></em> Guardar</button>");
  document.writeln("</div>");
  document.writeln("</div>");
}

output();



function main() {
  var selectedArray = [];
  var compareString = "";
  var reversedString = "";
  var comparison = false;
  var isMouseDown = false;
  var x = 0;
  var y = 0;
  var r = 0;
  var g = 0;
  var b = 0;
  var prevID = 0;
  var touch = 0;

  //funcion onclick para comenzar el juego

  const inicio = document.getElementById("start");
  const juego = document.getElementById("juego");
  const capa = document.getElementById("capa");
  const reiniciar = document.getElementById("reiniciar");
  const guardar = document.getElementById("guardar");
  inicio.onclick = start;
  reiniciar.onclick = restart;

  function restart() {
    location.reload();
  }

  function start() {
    juego.style.display = "block";
    inicio.style.display = "none";
    capa.style.display = "none";
    reiniciar.style.display = "inline";

    setInterval(function () {
      if (timerStarted) {
        tick++;
        timer = msToTime(tick * 100);
        $("#timer").text(timer);
        $("#ans td").each(function (i) {
          if (!$(this).hasClass("correct")) {
            allAnswered = false;
            return false;
          } else {
            allAnswered = true;
          }
        });
        if (allAnswered) {
          timerStarted = false;
          //cambiar color del timer
          document.getElementById("timer").style.color = "green";
          guardar.style.display = "inline";
        }
      }
    }, 100);
  }

  $(document).mousedown(function () {
    return false;
  });
  $(document).mouseover(function () {
    return false;
  });
  $("#wsearch td").bind("mousedown touchstart", function () {
    if (!allAnswered) {
      timerStarted = true;
    }
    isMouseDown = true;
    prevID = $(this).attr("id");
    if (!$(this).hasClass("highlighted")) {
      selectedArray.push($(this).text());
      $(this).addClass("highlighted");
    }
    return false; // prevent text selection
  });
  $("#wsearch")
    .bind("mousemove touchmove", function (e) {
      e.preventDefault();
      if ($(this).attr("id") != prevID) {
        addedToArray = false;
      }
      if (isMouseDown) {
        if (e.originalEvent.touches || e.originalEvent.changedTouches) {
          touch =
            e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
        } else {
          touch = e;
        }
        for (var q = 0; q < dimensions; q++) {
          for (var a = 0; a < dimensions; a++) {
            var offset = $("#" + q + "-" + a).offset();
            var x = touch.pageX - offset.left;
            var y = touch.pageY - offset.top;

            if (
              x < $("#" + q + "-" + a).outerWidth() - 4 &&
              x > 4 &&
              y < $("#" + q + "-" + a).outerHeight() - 4 &&
              y > 2 &&
              !addedToArray &&
              !$("#" + q + "-" + a).hasClass("highlighted")
            ) {
              //trace('x: ' + x + ' y: ' + y);
              addedToArray = true;
              selectedArray.push($("#" + q + "-" + a).text());
              prevID = $("#" + q + "-" + a).attr("id");
              $("#" + q + "-" + a).addClass("highlighted");
              break;
            }
          }
        }
      }
    })
    .bind("selectstart", function (e) {
      return false; // prevent text selection in IE
    });

  $(document).bind("mouseup touchend", function () {
    prevID = 0;
    isMouseDown = false;
    comparison = false;
    compareString = "";
    reversedString = "";

    for (var i = 0; i < selectedArray.length; i++) {
      compareString = compareString.concat(selectedArray[i]);
    }
    for (var j = 0; j < wordList.length; j++) {
      r = Math.floor(Math.random() * 200); //random red to 200 first color scale
      g = Math.floor(Math.random() * 200); //random green *****
      b = Math.floor(Math.random() * 200); //random blue *****
      if (compareString == wordList[j]) {
        answeredList.push(wordList[j]);
        comparison = true;
        $("table td.highlighted").each(function (i) {
          if (!$(this).hasClass("correct")) {
            $(this).removeClass("highlighted");
            $(this).addClass("correct");
            $(this).css(
              "background-color",
              "rgb(" + r + "," + g + "," + b + ")"
            );
          }
        });
        $("#ans .answers").each(function (i) {
          if ($(this).text() == compareString && !$(this).hasClass("correct")) {
            $(this).removeClass("answers");
            $(this).addClass("correct");
            $(this).css(
              "background-color",
              "rgb(" + r + "," + g + "," + b + ")"
            );
            return false;
          }
        });
        break;
      }
      reversedString = compareString.split("").reverse().join("");
      if (reversedString == wordList[j]) {
        answeredList.push(wordList[j]);
        comparison = true;
        $("table td.highlighted").each(function (i) {
          if (!$(this).hasClass("correct")) {
            $(this).removeClass("highlighted");
            $(this).addClass("correct");
            $(this).css(
              "background-color",
              "rgb(" + r + "," + g + "," + b + ")"
            );
          }
        });
        $("#ans .answers").each(function (i) {
          if (
            $(this).text() == reversedString &&
            !$(this).hasClass("correct")
          ) {
            $(this).removeClass("answers");
            $(this).addClass("correct");
            $(this).css(
              "background-color",
              "rgb(" + r + "," + g + "," + b + ")"
            );
            return false;
          }
        });
        break;
      }
    }
    $("table td.highlighted").each(function (i) {
      $(this).removeClass("highlighted");
    });
    for (var k = selectedArray.length - 1; k >= 0; k--) {
      selectedArray.splice(k, 1);
    }
  });
}

function saveScore () {
  console.log("Guardando...");
  console.log(timer);
  console.log(user);
  console.log(class_id);
  console.log(game)
  //enviar a la base por ajax
  $.ajax({
    url: "scores.php",
    type: "POST",
    data: {
      user_id: user,
      class_id: class_id,
      game_id: game,
      score: timer,
    },
    success: function (data) {
      console.log(data);
    }
  });
}