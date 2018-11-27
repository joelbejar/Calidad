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
                $stmt -> close();
            $stmt = null;  

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT idValoracion,idUsuario,eliminado FROM $tabla ORDER BY fecha DESC");
            
                $stmt -> execute();

                return $stmt -> fetchAll();
                $stmt -> close();
            $stmt = null;  
            }

            
        }
        	/*=============================================
	ELIMINAR VALORACION
	=============================================*/

	static public function mdlEliminarValoracion($tabla, $item1, $valor1, $item2, $valor2){

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