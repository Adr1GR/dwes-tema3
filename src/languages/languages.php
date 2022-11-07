<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenas = [
    'home' => [
        'es' => 'Home',
        'en' => 'Home'
    ],
    'subir' => [
        'es' => 'Subir',
        'en' => 'Upload'
    ],
    'ficheros' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],
    'cambiar' => [
        'es' => 'Cambiar',
        'en' => 'Change'
    ],
    'bienvenidaTitulo' => [
        'es' => 'Bienvenid@ a MiniMyCloud',
        'en' => 'Welcome to MiniMyCloud'
    ],
    'bienvenidaDescripcion' => [
        'es' => 'Desde aquí puedes administrar tus ficheros',
        'en' => 'From here you can manage your files'
    ],
    'bienvenidaBoton' => [
        'es' => 'Empieza a subir ficheros',
        'en' => 'Start uploading files'
    ],
    'subirTitulo' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],
    'nombreFichero' => [
        'es' => '<b>Nombre del fichero:</b>',
        'en' => '<b>File name:</b>'
    ],
    'seleccionarFichero' => [
        'es' => '<b>Selecciona un fichero</b>',
        'en' => '<b>Select a file</b>'
    ]
];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}
