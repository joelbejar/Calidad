<?php

    require_once "../controladores/distrito.controlador.php";
    require_once "../modelos/distrito.modelo.php";


    require_once "../controladores/sucursal.controlador.php";
    require_once "../modelos/sucursal.modelo.php";


    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";


    require_once "../controladores/servicio.controlador.php";
    require_once "../modelos/servicio.modelo.php";


    require_once "../controladores/general.controlador.php";
    require_once "../modelos/general.modelo.php";

    class TablaSucursal{
        
        /*=============================
            MOSTRAR LA TABLA DE VALORACIONES
        ===================================
        */    
        public function mostrarTabla(){
            $item = null;
            $valor = null;
            
            $sucursal = ControladorSucursal::ctrMostrarSucursal($item,$valor);
            


            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($sucursal);$i++){
                
                $item = "idSucursal";
                
                $valor = $sucursal[$i]["idSucursal"];
                
                
                $resp = ControladorGeneral::ctrMostrarGeneral($item,$valor);
   
             
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$resp["nombre_empresa"].'",
                            "'.$resp["sector_economico"].'",
                            "'.$resp["direccion_empresa"].'",
                            "'.$resp["nombre_distrito"].'",
                            "'.$resp["nombre_servicio"].'",
                            "'.$resp["latitud"].'",
                            "'.$resp["longitud"].'",
                            "'.$resp["fecha_empresa"].'"
                        ],';
                }

                $datosJson = substr($datosJson, 0, -1);

                $datosJson.=  ']

                }'; 

                echo $datosJson;
            
        }
    }

/*===========================
    ACTIVAR TABLA DE SUCURSAL
=============================
*/

$activar = new TablaSucursal();
$activar -> mostrarTabla();
