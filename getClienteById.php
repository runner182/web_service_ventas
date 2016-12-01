<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_usuario = $_POST['id_usuario'];

        $retorno = Ventas::getClienteById($id_usuario);

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