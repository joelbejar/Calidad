<?php


 require_once "conexion.php";

    class ModeloSucursal{
        

        static public function mdlMostrarSucursal($tabla,$item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT idSucursal FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $stmt -> execute();

                return $stmt -> fetch();
                        $stmt -> close();
            $stmt = null; 

            }else{
                $stmt = Conexion::conectar()->prepare("call get_sucursal()");
            
                $stmt -> execute();

                return $stmt -> fetchAll();
                        $stmt -> close();
            $stmt = null; 
            }

     
        }
        
        static public function mdlMostrarRelacionServicio($tabla,$item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);            
            
                $stmt -> execute();

                return $stmt -> fetch();

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idEmpresa_servicio DESC");
            
                $stmt -> execute();

                return $stmt -> fetchAll();
            }

            $stmt -> close();
            $stmt = null;  
        }
        
        /*=============================================
        CREAR SUCURSAL
        =============================================*/

	static public function mdlIngresarSucursal($tabla1,$tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("call nueva_sucursal(:idEmpresa,:idDistrito,:direccion,:latitud,:longitud,:idServicio)");

		$stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_INT);
		$stmt->bindParam(":idDistrito", $datos["idDistrito"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":latitud", $datos["latitud"], PDO::PARAM_STR);
		$stmt->bindParam(":longitud", $datos["longitud"], PDO::PARAM_STR);
		$stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
            
		$stmt->close();
		$stmt = null;

	}

        
        
    }