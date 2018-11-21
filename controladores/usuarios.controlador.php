<?php

    class ControladorUsuarios{
        
        static public function ctrMostrarTotalUsuarios($orden){
            $tabla="Usuario";
            
            $resp=ModeloUsuarios::mdlMostrarTotalUsuarios($tabla,$orden);
            
            return $resp;
            
        }
        
        
        static public function ctrMostrarUsuarios($item,$valor){
            $tabla="Usuario";
            
            $resp=ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarUsuariosReportados($item,$valor){
            $tabla="Usuario_reportado";
            
            $resp=ModeloUsuarios::mdlMostrarUsuariosReportado($tabla,$item,$valor);
            
            return $resp;
            
        }
        

        
    }


?>