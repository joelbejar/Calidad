<?php




    require_once "../controladores/sucursal.controlador.php";
    require_once "../modelos/sucursal.modelo.php";


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
            
           // $sucursal = ControladorSucursal::ctrMostrarSucursal($item,$valor);
            $sucursal=ControladorSucursal::ctrMostrarSucursal($item,$valor);

   
            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($sucursal);$i++){
                
           
                //$valor = $sucursal[$i]["idSucursal"];
                
                
                //$resp = ModeloSucursal::mdlMostrarSucursal($valor);
   
             
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$sucursal[$i]["nombre_empresa"].'",
                            "'.$sucursal[$i]["sector_economico"].'",
                            "'.$sucursal[$i]["direccion_empresa"].'",
                            "'.$sucursal[$i]["nombre_distrito"].'",
                            "'.$sucursal[$i]["nombre_servicio"].'",
                            "'.$sucursal[$i]["latitud"].'",
                            "'.$sucursal[$i]["longitud"].'",
                            "'.$sucursal[$i]["fecha_empresa"].'"
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
