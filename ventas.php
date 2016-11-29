<?php
require "/DB/database.php"

class Ventas{
	function __construct()
    {
    }

    public static function login($email,$pass){
    	$consulta="SELECT * FROM usuarios u INNER JOIN vendedor v on(u.id_usuario=v.id_usuario) where u.email= ? AND v.password= ?");
			try {
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				$comando->execute(array($email,$password));
				$rows=$comando->fetch(PDO::FETCH_ASSOC);
				return $rows;
			} catch (PDOExeption $e) {
				return false;
			}
    }

    public static function getAllClientes(){
    	
    }

    public static function inserta_cliente($nombre,$direccion,$telefono,$email){

    	$query="INSERT INTO usuarios(nombre,direccion,telefono,email) VALUES (?,?,?,?)";
    	$sentencia = Database::getInstance()->getDb()->prepare($query);

    	return $sentencia->execute(array($nombre,$direccion,$telefono,$email));
    }

    public static function regresa_cliente($nombre){
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

    public static function productos_cliente($id_cliente){


    }

    public static function pagos cliente($id_cliente){

    }
}
?>