<!DOCTYPE html>
<html lang="es">

<?php
require './src/languages/languages.php';
require './src/languages/languagesErros.php';
require './src/validar.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MiniMyCloud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/style/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MiniMyCloud</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?idioma=<?= $idioma ?>"><?= getCadena('home') ?></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./subir.php?idioma=<?= $idioma ?>"><?= getCadena('subir') ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ficheros.php?idioma=<?= $idioma ?>"><?= getCadena('ficheros') ?></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="get">
                <select name="idioma" class="form-select" aria-label="Default select example">
                    <option value="es" <?php if ($idioma == 'es') {
                                            echo 'selected';
                                        } ?>>Español</option>
                    <option value="en" <?php if ($idioma == 'en') {
                                            echo 'selected';
                                        } ?>>English</option>
                </select>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><?= getCadena('cambiar') ?></button>
            </form>
        </div>
    </nav>
    <div class="divCentral shadow p-3 mb-5 bg-body rounded w-75 p-3">
        <h1 class="display-4 mt-5"><b><?= getCadena('subirTitulo') ?></b></h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <p>
                <label for="nombre_fichero"><?= getCadena('nombreFichero') ?></label>
                <input type="text" name="nombre_fichero" id="nombre_fichero">
            </p>
            <p>
                <label for="fichero_a_subir"><?= getCadena('seleccionarFichero') ?></label>
                <input type="file" name="fichero_a_subir" id="fichero_a_subir">
            </p>
            <p>
                <input type="submit" value="<?= getCadena("enviarFichero")?>">
            </p>
            <p>
                <?php
                if ($_POST) {
                    $r = validarFichero($_POST['nombre_fichero'], $_FILES['fichero_a_subir']);
                    if ($r[0] && in_array("ERROR_CODE_OK", $r[1])) {
                        subirFichero($_POST['nombre_fichero'], $_FILES['fichero_a_subir']);
                        echo "<p class='uploaded'>". getCadenaError('ERROR_CODE_OK') . "<p>";
                    } else {
                        foreach($r[1] as $e) {
                            echo "<p class='error'>". getCadenaError($e) . "<p>";
                        }
                    }
                }
                ?>
            </p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>