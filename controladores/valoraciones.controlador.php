<?php

    class ControladorValoraciones{
        
        
        public function ctrMostrarTotalValoraciones(){
            $tabla="Valoracion";
            
            $resp=ModeloValoraciones::mdlMostrarTotalValoraciones($tabla);
            
            return $resp;
            
        }
        
        
    }



?>