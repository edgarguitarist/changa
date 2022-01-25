<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/form_signup.css">
</head>
<body>
<div>
    <h1 class="center">Historias</h1>
    <form action="" method="post" enctype="">
        <div class="control">
            <div class="file-upload">
                <div class="image-upload-wrap">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL2(this);" accept="image/*" required />
                    <div class="drag-text center-total">
                        <em class="far fa-image is-size-2"></em>
                        <h3>Selecciona tu foto</h3>
                    </div>
                </div>
                <br>


                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove
                            <!-- <span class="image-title">Uploaded Image</span> -->
                        </button>
                    </div>
                </div>
            </div>
            <p id="error_photo2" class="has-text-danger is-size-6 has-text-centered b-600 hidden">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
        </div>
    </form>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="../admin/js/draganddrop.js"></script>
<script src="../admin/js/form_checks.js"></script>
</html>