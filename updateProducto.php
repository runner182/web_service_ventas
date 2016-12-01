<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_producto = $_POST['id_producto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        $retorno = Ventas::updateProducto($id_producto,$nombre,$descripcion,$precio,$cantidad);

        if ($retorno) {
        print json_encode(array(
            "estado" => 1,
            "mensaje" => "Exito al modificar Producto"
        ));
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
} 