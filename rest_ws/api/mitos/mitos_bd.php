<?php

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST, GET, OPTION');

// MySQL
$usuario = 'root';
$contrasenha = '';
$servidor_bd = 'localhost';
$base_datos = 'ejemplo_ws';

$mi_mysql = new mysqli($servidor_bd, $usuario, $contrasenha, $base_datos);
// MySQL

function mostrarMitos()
{
    global $mi_mysql;

    $consulta = $mi_mysql->query("select * from mitos;");

    if ($consulta->num_rows > 0) {
        while ($fila = $consulta->fetch_assoc()) {
            $arr[] = $fila;
        }
    }

    return json_encode($arr, JSON_UNESCAPED_UNICODE);
}

function mostrarMito($mito)
{
    global $mi_mysql;

    $consulta = $mi_mysql->query("select * from mitos where mito = '$mito';");

    if ($consulta->num_rows > 0) {
        while ($fila = $consulta->fetch_assoc()) {
            $arr[] = $fila;
        }
    }

    return json_encode($arr, JSON_UNESCAPED_UNICODE);
}

function nuevoMito()
{
    if(isset($_POST['mito']) && isset($_POST['descripcion']))
    {
        global $mi_mysql;

        $mito = $_POST['mito'];
        $descripcion = $_POST['descripcion'];

        $mi_mysql->query("INSERT INTO mitos(mito, descripcion) VALUES ('$mito', '$descripcion');");
    }

    header('Location: ./cliente_rest.php');
    exit;
}


if (isset($_GET['peticion'])) {
    $peticion = $_GET['peticion'];

    switch ($peticion) {
        case 'lista':
            echo mostrarMitos();
            break;
        case 'detalle':
            echo mostrarMito($_GET['mito']);
            break;
        case 'agregar':
            nuevoMito();
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
