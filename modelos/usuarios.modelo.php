<?php

    require_once "conexion.php";

    class ModeloUsuarios{
        
        static public function mdlMostrarTotalUsuarios($tabla,$orden){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
            
            $stmt -> execute();
            
            $response = $stmt -> fetchAll();
            
            $stmt -> close();
            
            $stmt = null;

            return $response;
            
        }


        static public function mdlMostrarUsuarios($tabla,$item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $stmt -> execute();

                $response = $stmt -> fetch(); 
                $stmt -> close();
                $stmt = null; 

                return $response;

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idUsuario DESC");
            
                $stmt -> execute();

                $response = $stmt -> fetchAll();

                $stmt -> close();
                $stmt = null; 
                return $response;
            }
 
        }
       

          static public function mdlMostrarUsuariosReportado($tabla,$item,$valor){

            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $response = $stmt -> execute();

                $stmt -> close();
                $stmt = null;  

                return $response;

            }else{
                $stmt = Conexion::conectar()->prepare("call sp_get_all_user_reported()");
            
                $stmt->execute();
                $response = $stmt -> fetchAll();

                // $stmt->close();
                // $stmt = null;  

                return $response;
            }

            $stmt -> close();
            $stmt = null;  
        }      
	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	static public function mdlEliminarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "Eliminado";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
    }


?>