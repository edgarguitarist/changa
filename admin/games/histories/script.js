function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var htmlPreview =
        '<img width="200" src="' +
        e.target.result +
        '" />' +
        "<p>" +
        //input.files[0].name +
        "</p>";
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find(".preview-zone");
      var boxZone = $(input)
        .parent()
        .parent()
        .find(".preview-zone")
        .find(".box")
        .find(".box-body");

      wrapperZone.removeClass("dragover");
      previewZone.removeClass("hidden");
      boxZone.empty();
      boxZone.append(htmlPreview);
      //ocultar el elemento con id dropzonee
      $("#dropzonee").addClass("hidden");
    };
    changeMensaje("con");
    reader.readAsDataURL(input.files[0]);
  }
}

function changeMensaje(site) {
  var mensaje1 = "Elije una imagen para arrastrar aqui.";
  var mensaje2 = "Arrastra una imagen aqui para cambiar la actual.";

  salida = document.getElementById("mensaje");
  if (site == "con") {
    salida.innerHTML = mensaje2;
  } else {
    salida.innerHTML = salida.innerHTML != mensaje1 ? mensaje1 : mensaje2;
  }
}

function reset(e) {
  e.wrap("<form>").closest("form").get(0).reset();
  e.unwrap();
  changeMensaje("sin");
  $("#dropzonee").removeClass("hidden");
}

$(".dropzone").change(function () {
  readFile(this);
});

$(".dropzone-wrapper").on("dragover", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass("dragover");
});

$(".dropzone-wrapper").on("dragleave", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass("dragover");
});

$(".remove-preview").on("click", function () {
  var boxZone = $(this).parents(".preview-zone").find(".box-body");
  var previewZone = $(this).parents(".preview-zone");
  var dropzone = $(this).parents(".form-group").find(".dropzone");
  boxZone.empty();
  previewZone.addClass("hidden");
  reset(dropzone);
});


function setUpperCase(input) {
  input.value = input.value.toUpperCase();
}