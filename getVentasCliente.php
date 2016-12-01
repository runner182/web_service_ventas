<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_cliente = $_POST['id_cliente'];
        $id_vendedor = $_POST['id_vendedor'];

        $retorno = Ventas::getVentasCliente($id_cliente,$id_vendedor);

        if ($retorno) {

        $datos["estado"] = 1;
        $datos["ventas"] = $retorno;

        print json_encode($datos);
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
} 