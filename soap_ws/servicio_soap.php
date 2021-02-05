<?php

require_once "./lib/nusoap.php";

function mostrarMito($mito)
{
    switch ($mito) {
        case "fenix":
            return "En la mitología griega, el fénix es un ave de larga vida que se regenera de las cenizas de su predecesor. 
            Según algunas fuentes, el fénix muere en un espectáculo de llamas y combustión, aunque hay otras fuentes que afirman que el ave legendaria muere y simplemente se descompone antes de nacer de nuevo";
            break;
        case "medusa":
            return "En la mitología griega, Medusa era un monstruo ctónico femenino, que convertía en piedra a aquellos que la miraban fijamente a los ojos. 
            Fue decapitada por Perseo, quien después usó su cabeza como arma​ hasta que se la dio a la diosa Atenea para que la pusiera en su escudo, la égida.";
            break;
    }
    return "404";
}

if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

$servidor = new soap_server();

$servidor->configureWSDL("Mitos Griegos", "urn:mitos");

// $servidor->register("mostrarMito");
$servidor->register(
    "mostrarMito",
    array('mito' => 'xsd:string'), //parametros
    array('return' => 'xsd:string'), // respuesta
    'urn:mitos', //namespace
    'urn:mitos#mostrarMito', //acción
    'rpc', //estilo
    'encoded', //uso
    'Muestra un mito griego solicitado' //descripción
);


$servidor->service($HTTP_RAW_POST_DATA);
