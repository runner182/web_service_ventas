<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_usuario= $_POST['id_usuario'];
        $id_vendedor= $_POST['id_vendedor'];
        $id_producto= $_POST['id_producto'];
        $fecha= $_POST['fecha'];
        $num_productos= $_POST['num_productos'];
        $precio_producto= $_POST['precio_producto'];
        $tipo_pago= $_POST['tipo_pago'];
        $tipo_cobro= $_POST['tipo_cobro'];
        $horario_cobro= $_POST['horario_cobro'];
        $cantidad_abono= $_POST['cantidad_abono'];

        $retorno = Ventas::setVenta($id_usuario,$id_vendedor,$id_producto,$fecha,$num_productos,$precio_producto,$tipo_pago,$tipo_cobro,$horario_cobro,$cantidad_abono);

        if ($retorno) {
        print json_encode(array(
            "estado" => 1,
            "mensaje" => "Exito al agregar venta"
        ));
    	} else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    	}
} 