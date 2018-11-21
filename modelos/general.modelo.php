<?php


 require_once "conexion.php";

    class ModeloGeneral{
        

        static public function mdlMostrarGeneral($item,$valor){
            
            if($item!=null){
                $stmt = Conexion::conectar()->prepare("SELECT e.nombre as nombre_empresa, e.sector_economico as sector_economico, s.direccion as direccion_empresa, d.nombre as nombre_distrito, serv.nombre as nombre_servicio,s.latitud as latitud,s.longitud as longitud,e.fecha as fecha_empresa FROM Empresa_sucursal s INNER JOIN Empresa e ON s.idEmpresa = e.idEmpresa INNER JOIN Distrito d ON d.idDistritos = s.idDistrito inner join Empresa_servicios ese on(s.idSucursal=ese.idSucursal) inner join Servicio serv ON(ese.idServicio=serv.idServicios) WHERE s.$item =$valor");
         
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_INT); 
            
            
                $stmt -> execute();

                return $stmt -> fetch();
            }else{
               $stmt = Conexion::conectar()->prepare("SELECT e.nombre as nombre_empresa, e.sector_economico as sector_economico, s.direccion as direccion_empresa, d.nombre as nombre_distrito, serv.nombre as nombre_servicio,s.latitud as latitud,s.longitud as longitud,e.fecha as fecha_empresa, v.puntaje as puntaje FROM Empresa_sucursal s INNER JOIN Empresa e ON s.idEmpresa = e.idEmpresa INNER JOIN Distrito d ON d.idDistritos = s.idDistrito inner join Empresa_servicios ese on(s.idSucursal=ese.idSucursal) inner join Servicio serv ON(ese.idServicio=serv.idServicios) INNER JOIN Valoracion v ON(v.idSucursal=s.idSucursal)");
         

            
            
                $stmt -> execute();

                return $stmt -> fetchAll();  
            }

                $stmt -> close();
                $stmt = null;  
        }

    
        static public function mdlMostrarGeneralUsuarioReportado($item,$valor){
            

                $stmt = Conexion::conectar()->prepare("SELECT u.nombre as nombre_usuario, u.apellido as apellido_usuario, u.correo as email_usuario, u.nombre_usuario as usuario FROM Usuario_reportado us INNER JOIN Usuario u ON(us.idUsuario_que_reporta = u.idUsuario) WHERE us.$item =$valor");
         
                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_INT); 
            
            
                $stmt -> execute();

                return $stmt -> fetch();

                $stmt -> close();
                $stmt = null;  
        }
      
        
    }