<?php

//Devuelve los datos del usuario loggeado//
//Se tienen que enviar password y contraseña//
require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email'])) {
        if(isset($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];

            $retorno=Ventas::login($email,$password);

            if($retorno){
                $usuario['estado']="1";
                $usuario['vendedor']=$retorno;
                // Enviar objeto json de la meta
                print json_encode($usuario);
            }
            else{
                // Enviar respuesta de error general
                print json_encode(
                    array(
                        'estado' => '2',
                        'mensaje' => 'Usuario o password Incorrectos'
                    )
                );
            }
        }    
    }
}