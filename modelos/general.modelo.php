<?php


 require_once "conexion.php";

    class ModeloGeneral{
        

        static public function mdlMostrarGeneral($valor){
            
                $stmt = Conexion::conectar()->prepare("call get_sucursal(:idSucursal)");
         
                $stmt ->bindParam(":idSucursal",$valor, PDO::PARAM_INT); 
            
            
                $stmt -> execute();

                return $stmt -> fetch();

                $stmt -> close();
                $stmt = null;  
        }

    
        static public function mdlMostrarGeneralUsuarioReportado($valor){
            

                $stmt = Conexion::conectar()->prepare("call get_usuarioReportado(:idUsuario)");
         
                $stmt ->bindParam(":idUsuario",$valor, PDO::PARAM_INT); 
            
            
                $stmt -> execute();

                return $stmt -> fetch();

                $stmt -> close();
                $stmt = null;  
        }
      
        static public function mdlMostrarGeneralValoracion($valor){

		          $stmt = Conexion::conectar()->prepare("call get_valoraciones(:idUsuario)");

                    $stmt ->bindParam(":idUsuario",$valor, PDO::PARAM_INT); 


                    $stmt -> execute();

                    return $stmt -> fetch();

                    $stmt -> close();
                    $stmt = null;  
            }
    }