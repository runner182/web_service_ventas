<?php
require "DB/database.php";

class Ventas{
	function __construct()
    {
    }

    public static function getLogin($email,$password){
    	$consulta="SELECT u.id_usuario,u.nombre FROM usuarios u INNER JOIN vendedor v on(u.id_usuario=v.id_usuario) where u.email= ? AND v.password= ?";
			try {
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				$comando->execute(array($email,$password));
				$rows=$comando->fetch(PDO::FETCH_ASSOC);
				return $rows;
			} catch (PDOExeption $e) {
				return false;
			}
    }

    public static function setVendedor($nombre,$direccion,$telefono,$email,$password){
        $query="INSERT INTO usuarios(nombre,direccion,telefono,email) VALUES (?,?,?,?)";
        $sentencia = Database::getInstance()->getDb()->prepare($query);
        $sentencia->execute(array($nombre,$direccion,$telefono,$email));

        $query="SELECT id_usuario from usuarios where email=?";
        $sentencia = Database::getInstance()->getDb()->prepare($query);
        $get=$sentencia->execute(array($email));
        while ($rows=$get->fetchAll(PDO::FETCH_ASSOC)) {
            $id_usuario=$rows->id_usuario;
            $query="INSERT INTO vendedor(id_usuario,password) values (?,?)";
            $sentencia=Database::getInstance()->getDb()->prepare($query);
            return $sentencia->execute(array($id_usuario,$password));
        }
    }

    public static function setCliente($nombre,$direccion,$telefono,$email){

        $query="INSERT INTO usuarios(nombre,direccion,telefono,email) VALUES (?,?,?,?)";
        $sentencia = Database::getInstance()->getDb()->prepare($query);

        return $sentencia->execute(array($nombre,$direccion,$telefono,$email));
    }

    public static function getAllClientes(){
    	$query="SELECT * from usuarios ORDER BY nombre desc";
    	try {
    		$comando=Database::getInstance()->getDb()->prepare($query);
    		$comando->execute();

    		return $comando->fetchAll(PDO::FETCH_ASSOC);

    	} catch (PDOException $e) {
    		return false;
    	}
    }

    public static function getAllProductos(){
        $query="SELECT * from productos order by nombre desc";
        try {
            $sentencia=Database::getInstance()->getDb()->prepare($query);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }

    }

    public static function getClienteById($id_usuario){
        $query="SELECT * FROM  usuarios WHERE id_usuario=?";
        try {
            $sentencia=Database::getInstance()->getDb()->prepare($query);
            $sentencia->execute(array($id_usuario));
            $rows=$sentencia->fetch(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getClienteByName($nombre){
    	$query="SELECT * FROM  usuarios WHERE nombre=?";
    	try {
    		$sentencia=Database::getInstance()->getDb()->prepare($query);
    		$sentencia->execute(array($nombre));
    		$rows=$sentencia->fetch(PDO::FETCH_ASSOC);
    		return $rows;
    	} catch (PDOException $e) {
    		return false;
    	}
    }

    public static function getVentasCliente($id_cliente,$id_vendedor){
    	$query="SELECT p.nombre,p.descripcion, v.id_venta, v.cantidad from productos p inner join  ventas v on(p.id_producto=v.id_producto) where v.id_usuario=? and v.id_vendedor=?";
    	try {
    			$consulta=Database::getInstance()->getDb()->prepare($query);
    			$consulta->execute(array($id_cliente,$id_vendedor));
    			return $consulta->fetch(PDO::FETCH_ASSOC);
    		} catch (PDOException $e) {
    			return false;
    		}	
    }

    public static function getAbonos($id_venta){
    	$query="SELECT * from pagos where id_venta=?";
    	try {
    		$consulta=Database::getInstance()->getDb()->prepare($query);
    		$consulta->execute(array($id_venta));
    		return $consulta->fetch(PDO::FETCH_ASSOC);
    	} catch (PDOException $e) {
    		return false;
    	}
    }

    public static function updateCliente($id_usuario,$nombre,$direccion,$telefono,$email){
        $query="UPDATE usuarios set nombre=?, direccion=?, telefono=?,email=? where id_usuario= ?";

        $sentencia=Database::getInstance()->getDb()->prepare($query);
        return $sentencia->execute(array($nombre,$direccion,$telefono,$email,$id_usuario));
    }

    public static function updateProducto($id_producto,$nombre,$descripcion,$precio,$cantidad){
        $query="UPDATE productos set nombre=?,descripcion=?,precio=?,cantidad=? where id_producto=?";
        $sentencia= Database::getInstance()->getDb()->prepare($query);
        return $sentencia->execute(array($nombre,$descripcion,$precio,$cantidad,$id_producto));
    }

    public static function setProducto($nombre,$descripcion,$precio,$cantidad){
        $query="INSERT into productos(nombre,descripcion,precio,cantidad) values(?,?,?,?)";
        $sentencia=Database::getInstance()->getDb()->prepare($query);
        return $sentencia->execute(array($nombre,$descripcion,$precio,$cantidad));
    }

    public static function getVentas($id_vendedor){
    }

    public static function getVenta($id_venta){

    }
    public static function setVenta($id_usuario,$id_vendedor,$id_producto,$fecha,$num_productos,$precio_producto,$tipo_pago,$tipo_cobro,$horario_cobro,$cantidad_abono){
        $query="INSERT into ventas(id_usuario,id_vendedor,id_producto,fecha,num_productos,precio_producto,tipo_pago,tipo_cobro,horario_cobro,cantidad_abono) values(?,?,?,?,?,?,?,?,?,?)";
        $sentencia=Database::getInstance()->getDb()->prepare($query);
        return $sentencia->execute(array($id_usuario,$id_vendedor,$id_producto,$fecha,$num_productos,$precio_producto,$tipo_pago,$tipo_cobro,$horario_cobro,$cantidad_abono));
    }
}
?>