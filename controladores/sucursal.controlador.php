<?php

    class ControladorSucursal{
        
        static public function ctrMostrarSucursal($item,$valor){
            
            $tabla = "Empresa_sucursal";
            
            $resp = ModeloSucursal::mdlMostrarSucursal($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarRelacionServicio($item,$valor){
            
            $tabla = "Empresa_servicios";
            
            $resp = ModeloSucursal::mdlMostrarRelacionServicio($tabla,$item,$valor);
            
            return $resp;
            
        }
        
    }