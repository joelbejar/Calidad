<?php

    class ControladorVisitas{
        
        public function ctrMostrarTotalVisitas(){
            $tabla="Visita_perfil_empresa";
            
            $resp=ModeloVisitas::mdlMostrarTotalVisitas($tabla);
            
            return $resp;
            
        }
        
    }


?>