<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password=$_POST['password'];

        $retorno = Ventas::getLogin($email,$password);
        if ($retorno) {
            $meta["estado"] = "1";
            $meta["vendedor"] = $retorno;

            print json_encode($meta);
        } else {

            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
}