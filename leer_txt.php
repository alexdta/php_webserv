<?php

$curl = curl_init("http://localhost/webserv_php/compu_componentes.txt");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($curl);

$info = curl_getinfo($curl);

if ($info['http_code'] == 200) //200 => funciona
{
    $datos = explode(",", $respuesta);

    echo "<h1>Componentes Disponibles</h1>";

    foreach($datos as $componente)
    {
        echo "=> ".$componente."<br>";
    }
} else {
    echo "Error => " . curl_error($curl);
}

?>