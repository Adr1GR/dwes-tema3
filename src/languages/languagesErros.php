<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenasError = [
    'ERROR_CODE_NULL' => [
        'es' => 'Seleccione un fichero',
        'en' => 'Select a file'
    ],
    'ERROR_CODE_OK' => [
        'es' => 'Fichero subido correctamente',
        'en' => 'File uploaded successfully'
    ],
    'ERROR_CODE_MIME' => [
        'es' => 'Extensión de fichero no válida',
        'en' => 'Invalid file extension'
    ],
    'ERROR_CODE_FAIL' => [
        'es' => 'Fallo al subir el archivo',
        'en' => 'Failed to upload file'
    ]
];

function getCadenaError(string $id): string
{
    global $idioma, $cadenasError;

    if (isset($cadenasError[$id])) {
        return $cadenasError[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}