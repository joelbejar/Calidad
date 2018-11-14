<?php


 require_once "conexion.php";

    class ModeloGeneral{
        

        static public function mdlMostrarGeneral($item1,$item2,$item3,$valor1,$valor2,$valor3){
            

                $stmt = Conexion::conectar()->prepare("SELECT E.nombre AS nombre_empresa, E.sector_economico AS sector_economico, E.fecha as fecha_empresa, ESE.idServicio AS id_servicio, D.nombre AS distrito, ESU.direccion AS direccion FROM Empresa_sucursal ESU INNER JOIN Empresa_servicios ESE ON(ESU.idSucursal=ESE.idSucursal) INNER JOIN Empresa E ON(ESU.idEmpresa=E.idEmpresa) INNER JOIN Distrito D ON(ESU.idDistrito=D.idDistritos) INNER JOIN Servicio S ON(ESE.idServicio=S.idServicios) WHERE $item1 =:$item1 AND $item2=:$item2 AND $item3=:$item3 ");
         
                $stmt ->bindParam(":".$item1,$valor1, PDO::PARAM_INT); 
                $stmt ->bindParam(":".$item2,$valor2, PDO::PARAM_INT);
                $stmt ->bindParam(":".$item3,$valor2, PDO::PARAM_INT);
            
            
                $stmt -> execute();

                return $stmt -> fetchAll();

                $stmt -> close();
                $stmt = null;  
        }
       
        
    }