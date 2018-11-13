<?php

    class ControladorUsuarios{
        
        public static function ctrMostrarTotalUsuarios($orden){
            $tabla="Usuario";
            
            $resp=ModeloUsuarios::mdlMostrarTotalUsuarios($tabla,$orden);
            
            return $resp;
            
        }
        
        
        public static function ctrMostrarUsuarios($item,$valor){
            $tabla="Usuario";
            
            $resp=ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
            
            return $resp;
            
        }
        
    }


?>