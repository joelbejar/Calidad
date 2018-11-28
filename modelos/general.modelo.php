<?php


 require_once "conexion.php";

    class ModeloGeneral{
        

        static public function mdlMostrarGeneral($valor){
            
            
            if($valor!=null){
                
            
                $stmt = Conexion::conectar()->prepare("call get_sucursal(:idSucursal)");
         
                $stmt ->bindParam(":idSucursal",$valor, PDO::PARAM_INT); 
            
            
                $stmt -> execute();

                return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("call get_empresa_puntaje()");
            
            
                $stmt -> execute();

                return $stmt -> fetchAll();   
            }

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

            
            if($valor!=null){
                

		          $stmt = Conexion::conectar()->prepare("call get_valoraciones(:idUsuario)");

                    $stmt ->bindParam(":idUsuario",$valor, PDO::PARAM_INT); 


                    $stmt -> execute();

                    return $stmt -> fetch();
            }else{
                
		          $stmt = Conexion::conectar()->prepare("call get_all_valoracion()");


                    $stmt -> execute();

                    return $stmt -> fetchAll();
            }
                    $stmt -> close();
                    $stmt = null;  
            }
    }