<?php

function validarFichero($nombre, $fichero)
{
    $resultado = true;
    $errores = [];
    $permitido = array('image/gif', 'image/png', 'image/jpg', "application/pdf");
    
    //Validar fichero
    if($fichero['size'] <= 0) {
        array_push($errores, "ERROR_CODE_NULL");
        $resultado = false;
    } else if (!isset($fichero) || $fichero['error'] !== UPLOAD_ERR_OK) {
        array_push($errores, "ERROR_CODE_FAIL");
        $resultado = false;
    } else if (!in_array(finfo_file(finfo_open(FILEINFO_MIME_TYPE), $fichero["tmp_name"]),$permitido)){
        array_push($errores, "ERROR_CODE_MIME");
        $resultado = false;
    } else {
        array_push($errores, "ERROR_CODE_OK");
    }

    return [$resultado, $errores];
}

function subirFichero($nombre, $fichero)
{
    $fichero["name"] = $nombre . "." . pathinfo($fichero["name"])["extension"];
    $rutaFicheroDestino = './files/' . basename($fichero["name"]);
    move_uploaded_file($fichero["tmp_name"], $rutaFicheroDestino);
}
