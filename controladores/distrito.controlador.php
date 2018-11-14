<?php



    class ControladorDistrito{
        
        
        static public function ctrMostrarDistrito($item,$valor){
            $tabla="Distrito";
            
            $resp = ModeloDistrito::mdlMostrarDistrito($tabla,$item,$valor);
            
            return $resp;
            
        }
        
    }


?>