<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $retorno = Ventas::setVendedor($nombre,$direccion,$telefono,$email,$password);
    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Exito al agregar Vendedor')
        );
        } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Creación fallida')
        );
        }
}