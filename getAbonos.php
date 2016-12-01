<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_venta = $_POST['id_venta'];

        $retorno = Ventas::getAbonos($id_venta);

        if ($retorno) {

        $datos["estado"] = 1;
        $datos["abonos"] = $retorno;

        print json_encode($datos);
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
} 