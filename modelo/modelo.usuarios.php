<?php
require_once "conexion.php";

class ModeloUsuarios{

	static public function ConsultaUsuarios()
		{
			$consulta = Conexion::conectar()->prepare("SELECT * FROM socio");

			$consulta -> execute();

			return $consulta -> fetchAll();

			
		}
		
	// registro
	static public function InsertarUsuarios($datos)
		{
			//Se debe omitir el id porque la version de mysql 5.7.31 no recomose el null y se nombran todos los campos tal cual esta en la base de datos a excepción de id....

			$Vcorreo = Conexion::conectar()->prepare("SELECT correo FROM socio WHERE correo = $datos[3] ");
			// $row = Conexion::conectar()->conectar_num_rows($Vcorreo);

			if($row == 1){
				return "error correo";
			}else{
				$consulta = Conexion::conectar()->prepare("INSERT INTO socio (nombre, edad, ocupacion, correo, contraseña, foto) VALUES (
						'$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]'
				)");
				if($consulta -> execute()){
					return "ok";
				}
				else{
					return "error";
				}
			}	
		}


	//Login Usuario
	static public function loginUsuarios($datos)
	{
		$consulta = Conexion::conectar()->prepare("SELECT * FROM socio WHERE correo = '$datos[0]' AND contraseña ='$datos[1]' ");

		$consulta -> execute();

		return $consulta -> fetch();

	}

	//Método para eliminar
	static public function EliminarUsuarios($datos)
	{
		$consulta = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id_tusuario = :id");
		$consulta->bindParam(":id", $datos, PDO::PARAM_INT);
		if($consulta -> execute())
			return "ok";
		else
			return "error";

		
	}
    
}


?>