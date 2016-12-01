<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre = $_POST['nombre'];

        $retorno = Ventas::getClienteByName($nombre);

        if ($retorno) {

        $datos["estado"] = 1;
        $datos["cliente"] = $retorno;

        print json_encode($datos);
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
}    	