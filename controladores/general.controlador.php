<?php

    class ControladorGeneral{
        
        static public function ctrMostrarGeneral($valor){
            
            
            $resp = ModeloGeneral::mdlMostrarGeneral($valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarGeneralUsuarioReportado($valor){
            
            $resp = ModeloGeneral::mdlMostrarGeneralUsuarioReportado($valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarGeneralValoracion($valor){
            
            $resp = ModeloGeneral::mdlMostrarGeneralValoracion($valor);
            
            return $resp;
            
        }
           
}