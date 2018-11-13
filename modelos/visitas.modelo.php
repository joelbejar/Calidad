<?php

    require_once "conexion.php";
    
    class ModeloVisitas{
        
        
        public static function mdlMostrarTotalVisitas($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT count(idVisita_Empresa) as total FROM $tabla");
            
            $stmt -> execute();
            
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
            
        }
    }



?>