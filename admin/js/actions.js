// Deshabilitar el copiar y pegar

$(document).bind("cut copy paste", function (e) {
  e.preventDefault()
  ;(function ($) {
    $(document).ready(function () {
      $.jGrowl(
        "Lo sentimos, no esta permitido copiar y pegar en este sitio! :C",
        {
          header: "Acción no permitida",
          life : 6000,
        }
      )
    })
  })(jQuery)
})
