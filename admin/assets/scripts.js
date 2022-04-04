$(function () {
  // Side Bar Toggle
  $(".hide-sidebar").click(function () {
    $("#sidebar").hide("fast", function () {
      $("#content").removeClass("span9");
      $("#content").addClass("span12");
      $(".hide-sidebar").hide();
      $(".show-sidebar").show();
    });
  });

  $(".show-sidebar").click(function () {
    $("#content").removeClass("span12");
    $("#content").addClass("span9");
    $(".show-sidebar").hide();
    $(".hide-sidebar").show();
    $("#sidebar").show("fast");
  });
});

//const element = externalRef ? externalRef.current : fromRef.current;

function mostrar_select() {
  $("#sel-all").show();
  //$("#checkAll").css("display", "none");
}

function ocultar_select() {
  $("#sel-all").hide();
  //$("#checkAll").css("display", "block");
}

$(document).ready(function () {
  $(".solo-numeros").keyup(function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9]/g, "")
    );
  });
});

//preguntar cuantos puntos hay en un string

////////////SOLO LETRA////////
$(document).ready(function () {
  $(".solo-letras").keypress(function (e) {
    $(this).val($(this).val().replace(/ /g, ""));
    //preguntar si el length es mayor que 3
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  });
});

function checkCedula(elemento, idSubmit) {
  const submit = document.getElementById( idSubmit );
  const cad = document.getElementById(elemento.id).value.trim(),
    box = document.getElementById(elemento.id),
    salida = document.getElementById(elemento.id + "_error");
  let total = 0;
  let existe = "";
  let longitud = cad.length;
  let longcheck = longitud - 1;
  let ruta = "admin/api/cedula.php";
  let inputClass = "input-block-level solo-numeros"
  if (
    cad !== "" &&
    longitud === 10 &&
    cad !== "0000000000" &&
    cad !== "1111111111" &&
    cad !== "2222222222" &&
    cad !== "3333333333" &&
    cad !== "4444444444" &&
    cad !== "5555555555" &&
    cad !== "6666666666" &&
    cad !== "7777777777" &&
    cad !== "8888888888" &&
    cad !== "9999999999"
  ) {
    for (i = 0; i < longcheck; i++) {
      if (i % 2 === 0) {
        var aux = cad.charAt(i) * 2;
        if (aux > 9) aux -= 9;
        total += aux;
      } else {
        total += parseInt(cad.charAt(i));
      }
    }
    total = total % 10 ? 10 - (total % 10) : 0;
    if (cad.charAt(longitud - 1) == total) {
      $.ajax({
        type: "POST",
        url: ruta,
        data: { dni: cad },
        success: function (resultado) {
          existe = resultado;
          if (existe === "existe") {
            salida.innerHTML = "Cedula ya Existe";
            salida.className = "help is-danger";
            box.className = inputClass + " is-danger";
            submit.disabled = true;
          } else {
            salida.innerHTML = "";
            salida.className = "help is-success";
            box.className = inputClass + " is-success";
            submit.disabled = false;
          }
        },
        error: function (resultado) {
          console.log("Error al Buscar los Datos: " + resultado);
          salida.innerHTML = "";
        },
      });
    } else {
      salida.innerHTML = "Cedula Inválida";
      salida.className = "help is-danger";
      box.className = inputClass + " is-danger";
      submit.disabled = true;
    }
  } else {
    salida.innerHTML = "La cedula debe contener 10 dígitos";
    salida.className = "help is-danger";
    box.className = inputClass + " is-danger";
    submit.disabled = true;
  }
}
