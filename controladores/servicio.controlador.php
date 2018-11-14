<?php

    class ControladorServicio{
        
        static public function ctrMostrarServicio($item,$valor){
            
            $tabla = "Servicio";
            
            $resp = ModeloServicio::mdlMostrarServicio($tabla,$item,$valor);
            
            return $resp;
            
        }
        

        
    }



?>