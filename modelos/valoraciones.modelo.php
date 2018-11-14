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
        
        
        public static function mdlMostrarValoraciones($tabla,$item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $stmt -> execute();

                return $stmt -> fetch();

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY puntaje DESC");
            
                $stmt -> execute();

                return $stmt -> fetchAll();
            }

            $stmt -> close();
            $stmt = null;  
        }
        
        
    }



?>