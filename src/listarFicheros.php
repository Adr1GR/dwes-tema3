<?php

function listarFicherosPDF()
{
    $todosFicheros = scandir('./files');
    $ficherosPdf = [];
    $ficherosImg = [];
    $extensionesImg = ["jpeg", "png", "gif"];
    if ($todosFicheros !== false) {
        foreach ($todosFicheros as $fic) {
            if (pathinfo($fic, PATHINFO_EXTENSION) == 'pdf') {
                $ficherosPdf[] = "./files/$fic";
            } else if (in_array(pathinfo($fic, PATHINFO_EXTENSION),$extensionesImg)){
                $ficherosImg[] = "./files/$fic";
            }
        }
    }
    return [
        "pdf" => $ficherosPdf,
        "img" => $ficherosImg
    ];
}


