<?php

    class ControladorValoraciones{
        
        
        public function ctrMostrarTotalValoraciones(){
            $tabla="Valoracion";
            
            $resp=ModeloValoraciones::mdlMostrarTotalValoraciones($tabla);
            
            return $resp;
            
        }
        
        static public function ctrMostrarValoraciones($item,$valor){
             $tabla="Valoracion";
            
            $resp=ModeloValoraciones::mdlMostrarValoraciones($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        
        
    }



?>