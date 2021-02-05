<?php

header('Content-Type: application/json');

function mostrar_cursos()
{
    $cursos = array("Angular", "React", "PHP", "JavaScript", "C#");

    return json_encode($cursos, JSON_UNESCAPED_UNICODE);
}


function mostrar_alumnos()
{
    $alumnos = array("Edgar Chávez", "Juan Castro", "Maria Pepina", "Pedro Perez");

    return json_encode($alumnos, JSON_UNESCAPED_UNICODE);
    //JSON_UNESCAPED_UNICODE => ayuda con caracteres especiales (vocales tildadas, ñ)
}

if (isset($_GET["solicitud"])) {
    switch ($_GET["solicitud"]) {
        case "lista":
            echo mostrar_alumnos();
            break;
        case "cursos":
            echo mostrar_cursos();
            break;
        default:
            echo "solicitud erronea";
            // header('HTTP/1.1 405 Method Not Alloed');
            // exit;
            break;
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}
