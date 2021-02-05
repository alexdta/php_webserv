<h1>Cliente SOAP</h1>

<?php

require_once "./lib/nusoap.php";

$cliente = new nusoap_client("http://localhost/webserv_php/soap_ws/servicio_soap.php?wsdl&debug=0");

$mito = $cliente->call("mostrarMito", array("mito" => "fenix"));
// $mito = $cliente->call("mostrarMito", array("mito" => "medusa"));

?>

<h2>Mitología</h2>
<p><?php echo $mito ?></p>