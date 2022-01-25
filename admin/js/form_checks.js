function checkCedula() {
  const submit = document.getElementById("submit"),
    cad = document.getElementById("cedula").value.trim(),
    box = document.getElementById("cedula"),
    salida = document.getElementById("dni_error");
  let total = 0;
  let existe = "";
  let longitud = cad.length;
  let longcheck = longitud - 1;

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
        total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
      }
    }
    total = total % 10 ? 10 - (total % 10) : 0;
    if (cad.charAt(longitud - 1) == total) {
      $.ajax({
        type: "POST",
        url: "sistema/api/cedula.php",
        data: { dni: cad },
        success: function (resultado) {
          existe = resultado;
          if (existe === "existe") {
            salida.innerHTML = "Cedula ya Existe";
            salida.className = "help is-danger";
            box.className = "input is-danger solo-numeros";
            submit.disabled = true;
          } else {
            salida.innerHTML = "Cedula Valida";
            salida.className = "help is-success";
            box.className = "input is-success solo-numeros";
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
      box.className = "input is-danger solo-numeros";
      submit.disabled = false;
    }
  } else {
    salida.innerHTML = "La cedula debe contener 10 digitos";
    salida.className = "help is-danger";
    box.className = "input is-danger solo-numeros";
    submit.disabled = false;
  }
}

function checkPhone() {
  phone = document.getElementById("phone");
  if (phone.value.charAt(0) == 0 && phone.value.length > 0) {
    phone.className = "input is-danger solo-numeros";
    document.getElementById("phone_error").innerHTML =
      "No es necesario el primer 0";
    
  } else {
    phone.className = "input is-success solo-numeros";
    document.getElementById("phone_error").innerHTML = "&nbsp;";
    
  }
}

function checkLength(elemento) {
  let campo = document.getElementById(elemento.id);
  if (campo.value.length < 3) {
    campo.className = "input is-danger solo-letras";
    
  } else {
    campo.className = "input is-success solo-letras";
    
  }
}

function checkSelect(elemento) {
  let campo = document.getElementById(elemento.id);
  const error_m = elemento.id + "_error";
  if (campo.value == "0" || campo.value == "") {
    campo.className = "input is-danger";
    
    document.getElementById(error_m).innerHTML = "Seleccione una opción";
  } else {
    campo.className = "input is-success";
    
    document.getElementById(error_m).innerHTML = "&nbsp;";
  }
}

function checkEmail(elemento) {
  let correo = document.getElementById(elemento.id);
  //verificar si el correo es valido
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo.value)) {
    $.ajax({
      type: "POST",
      url: "sistema/api/email.php",
      data: { email: correo.value },
      success: function (resultado) {
        if (resultado === "existe") {
          correo.className = "input is-danger";
          document.getElementById("email_error").innerHTML =
            "El correo ya existe";
          
        } else {
          correo.className = "input is-success";
          document.getElementById("email_error").innerHTML = "&nbsp;";
          
        }
      },
      error: function (resultado) {
        console.log("Error al Buscar los Datos: " + resultado);
        document.getElementById("email_error").innerHTML = "&nbsp;";
      },
    });
  } else {
    correo.className = "input is-danger";
    document.getElementById("email_error").innerHTML = "El correo no es valido";
    
  }
}

//////SOLO NUMERO/////// add like a class
$(document).ready(function () {
  $(".solo-numeros").keyup(function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9]/g, "")
    );
  });
});

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

//revisar si no hay ningun mensaje de error en el formulario
function checkForm() {
  let inputs = document.getElementsByClassName("input");
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].className == "input is-danger") {
      document.getElementById("submit").disabled = true;
    }else{
      document.getElementById("submit").disabled = false;
    }
  }
  
}