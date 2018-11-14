<?php

    class ControladorGeneral{
        
        static public function ctrMostrarGeneral($item1,$item2,$item3,$valor1,$valor2,$valor3){
            
            
            $resp = ModeloGeneral::mdlMostrarGeneral($item1,$item2,$item3,$valor1,$valor2,$valor3);
            
            return $resp;
            
        }
        
        
}