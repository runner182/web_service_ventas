<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];

    $retorno = Ventas::setCliente($nombre,$direccion,$telefono,$email);

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Exito al agregar Cliente')
        );o
        } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Creación fallida')
        );
        }
}