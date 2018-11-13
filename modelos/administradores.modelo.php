<?php

require_once "conexion.php";

class ModeloAdministradores{

	/*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/
        
        public static function mdlMostrarAdministrador($tabla,$item_usu,$usuario,$item_pas,$password){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item_usu=:$item_usu AND $item_pas=:$item_pas");
            
            $stmt ->bindParam(":".$item_usu,$usuario, PDO::PARAM_STR);
            $stmt ->bindParam(":".$item_pas,$password, PDO::PARAM_STR);
            
            $stmt -> execute();
            
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
            
        }

}