<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $retorno = Ventas::updateCliente($id_usuario,$nombre,$direccion,$telefono,$email);

        if ($retorno) {
        print json_encode(array(
            "estado" => 1,
            "mensaje" => "Exito al modificar Cliente"
        ));
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
} 