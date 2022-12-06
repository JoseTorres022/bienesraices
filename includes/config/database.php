<?php

function conectarDB(): mysqli{
    $db = mysqli_connect('localhost', 'josetorresxampp', '123456789', 'bienesraices',3306);

    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}