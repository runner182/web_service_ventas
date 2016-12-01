<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $retorno = Ventas::getAllProductos();

    if ($retorno) {

        $datos["estado"] = 1;
        $datos["productos"] = $retorno;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}