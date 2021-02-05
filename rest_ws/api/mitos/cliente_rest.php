<?php

$url = "http://localhost/webserv_php/rest_ws/api/mitos/";

$urlLista = $url . "lista";

$mito = 'fenix';
$urlMito = $url . "detalle/" . $mito;

$json_lista = file_get_contents($urlLista);

$json_mito = file_get_contents($urlMito);

$datosLista = json_decode($json_lista);
$datosMito = json_decode($json_mito);

?>

<h1>Mitos Griegos</h1>

<dl>
    <?php
    foreach ($datosLista as $mito) {
        echo "<dt>" . $mito->mito . "</dt>";
        echo "<dd>" . $mito->descripcion . "</dd>";
    }
    ?>
</dl>

<hr>

<h1>Mito Específico</h1>
<h2><?php echo $datosMito[0]->mito; ?></h2>
<p><?php echo $datosMito[0]->descripcion; ?></p>

<hr>

<form method="post" action="http://localhost/webserv_php/rest_ws/api/mitos/agregar">
    <div>
        <label for="mito">Mito:</label>
        <input type="text" id="mito" name="mito" />
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" />
    </div>
    <input type="submit" value="Guardar" />
</form>