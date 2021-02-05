<?php

$url = "http://localhost/webserv_php/rest_ws/api/alumnos/";

$urlAlumnos = $url . "lista";
$urlCursos = $url . "cursos";

$jsonAlumnos = file_get_contents($urlAlumnos);
$jsonCursos = file_get_contents($urlCursos);

$datosAlumnos = json_decode($jsonAlumnos);
$datosCursos = json_decode($jsonCursos);

?>

<h1>Alumnos</h1>

<ul>
    <?php
    foreach ($datosAlumnos as $alumno) {
        echo "<li>" . $alumno . "</li>";
    }
    ?>
</ul>
<hr>
<h2>Cursos</h2>
<ul>
    <?php
    foreach ($datosCursos as $curso) {
        echo "<li>" . $curso . "</li>";
    }
    ?>
</ul>