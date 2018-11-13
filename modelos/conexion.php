<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=104.248.63.229;dbname=procalidad",
						"admin",
						"0ef2cdec193436181d99624661f2c7b294dc276de9fc89b3",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}

}