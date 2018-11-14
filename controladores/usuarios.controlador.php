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
        
    }


?>