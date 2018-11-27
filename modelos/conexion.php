<?php

class Conexion{
	
	public static function conectar(){
		$server = "mysql:host=104.248.63.229;dbname=procalidad";

		$user = "admin";

		$pass = "0ef2cdec193436181d99624661f2c7b294dc276de9fc89b3";

		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		
		try {
			$con = new PDO(
				$server ,
				$user ,
				$pass ,
				$options
			);

			return $con;
		} catch (PDOException $e) {
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}

}
?>