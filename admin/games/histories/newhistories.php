<!DOCTYPE html>
<?php
include '../../dbcon.php';
$id_student = $_GET['id_student'];
$id_class = $_GET['id_class'];
$success = $_GET['success'] ?? '';
?>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>s</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <?php

  if ($success == 'true') { ?>
    <section id="success">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>¡Bien hecho!</strong> Tu historia ha sido subida con éxito.
          </div>
        </div>
      </div>
    </section>
  <?php } else if ($success == 'false') { ?>
    <section id="error">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>¡Error!</strong> Tu historia no ha podido ser subida.
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>
  <section id="history">
    <form action="histories.php" method="POST" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <div class="form-group">
            <label for="">Título</label>
            <input style="text-align:center;" type="text" name="title" id="title" onkeyup="setUpperCase(this)" class="form-control" required placeholder="Ingrese un Titulo">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">

              <div class="preview-zone hidden">
                <div class="box box-solid">
                  <div class="box-body"></div>
                  <div class="box-header with-border">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-danger btn-xs remove-preview">
                        <em class="fa fa-times"></em> Cambiar Imagen
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div id="dropzonee" class="dropzone-wrapper">
                <div class="dropzone-desc">
                  <em class="glyphicon glyphicon-download-alt"></em>
                  <p id="mensaje">Elije una imagen para arrastrar aquí.</p>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <!-- 3MB -->
                <input title="Imagen del Cuento" type="file" name="img_cuento" class="dropzone" required />
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_class" value="<?= $id_class ?>">
        <input type="hidden" name="id_student" value="<?= $id_student ?>">

        <div class="row">

          <div class="control-group">
            <div class="controls">
              <textarea name="content" id="ckeditor_standard" placeholder="Escribe tu historia" required></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div style="display: flex; justify-content: center; margin-top: 20px" class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right">
              Subir
            </button>
          </div>
        </div>
      </div>
    </form>
  </section>


  <!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="./script.js"></script>
</body>
<script src="../../vendors/ckeditor/ckeditor.js"></script>
<script src="../../vendors/ckeditor/adapters/jquery.js"></script>
<script>
  $(function() {
    // Ckeditor standard
    $("textarea#ckeditor_standard").ckeditor({
      width: "100%",
      height: "150px",
      toolbar: [{
          name: "document",
          items: ["Source", "-", "NewPage", "Preview"],
        }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        {
          name: "links",
          items: ["Link", "Unlink", "Anchor"],
        },
        [
          "Cut",
          "Copy",
          "Paste",
          "PasteText",
          "PasteFromWord",
          "-",
          "Undo",
          "Redo",
        ], // Defines toolbar group without name.
        {
          name: "basicstyles",
          items: ["Bold", "Italic", "Strike"],
        },
        {
          name: "paragraph",
          items: [
            "NumberedList",
            "BulletedList",
            "-",
            "Outdent",
            "Indent",
            "-",
            "Blockquote",
          ],
        },

        {
          name: "styles",
          items: ["Format", "Font", "FontSize"],
        },
        {
          name: "colors",
          items: ["TextColor", "BGColor"]
        },
      ],
    })
    $("textarea#ckeditor_full").ckeditor({
      width: "100%",
      height: "150px",
    })
  })
</script>

</html>