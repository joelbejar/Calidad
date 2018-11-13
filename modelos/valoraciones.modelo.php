<?php

    require_once "conexion.php";

    class ModeloValoraciones{
        
        public static function mdlMostrarTotalValoraciones($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT count(idValoracion) as total FROM $tabla");
            
            $stmt -> execute();
            
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
            
        }
        
        
    }



?>