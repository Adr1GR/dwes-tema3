<?php

    function listarFicheros() {
        $resultado = [
            "nombres" => [],
            "enlaces" => []
        ];

        $ficheros = scandir('./files');
        for ($i = 0; $i < count($ficheros); $i++) {
            $resultado("nombres")[$i] = $ficheros[$i];
            $resultado("enlaces")[$i] = "enlacePrueba";
        }

        return $resultado;
    }

?>