<?php

    class ControladorGeneral{
        
        static public function ctrMostrarGeneral($item,$valor){
            
            
            $resp = ModeloGeneral::mdlMostrarGeneral($item,$valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarGeneralUsuarioReportado($item,$valor){
            
            
            $resp = ModeloGeneral::mdlMostrarGeneralUsuarioReportado($item,$valor);
            
            return $resp;
            
        }
           
}