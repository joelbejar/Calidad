<?php

    require_once "conexion.php";

    class ModeloEmpresas{
        
        
        public static function mdlMostrarTotalEmpresas($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT count(idEmpresa) as total FROM $tabla");
            
            $stmt -> execute();
            
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        
        }
        
        

        public static function mdlMostrarEmpresas($tabla,$item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $stmt -> execute();

                return $stmt -> fetch();

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idEmpresa DESC");
            
                $stmt -> execute();

                return $stmt -> fetchAll();
            }

            $stmt -> close();
            $stmt = null;  
        }
        
        public static function mdlRegistrarEmpresa($tabla,$datos){
            
            $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,sector_economico) VALUES (:nombre,:sectoreconomico)");
            
            
            $stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":sectoreconomico",$datos["sector_economico"], PDO::PARAM_STR);
            
            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }
            
            $Stmt->close();
            
            $stmt = null;
        }
        
        
        public static function mdlEliminarEmpresa($tabla,$datos){
            $stmt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEmpresa = :idEmpresa");
            
            
            $stmt->bindParam(":idEmpresa",$datos, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }
            
            $Stmt->close();
            
            $stmt = null;    
        }
        
    }

?>