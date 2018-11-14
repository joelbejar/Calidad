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
                             /*   
                $item = "idSucursal";
                $valor = $sucursal[$i]["idSucursal"];
                
                $relacion = ControladorSucursal::ctrMostrarRelacionServicio($item,$valor);        
                
                
                $item = "idServicios";
                $valor = $relacion["idServicio"];
                
                $servicio = ControladorServicio::ctrMostrarServicio($item,$valor);*/
                        /*===============================
                RECUPERAR LOS NOMBRES DE LA EMPRESAS
                =================================
                */
                $item = "idEmpresa";
                $valor = $sucursal[$i]["idEmpresa"];
                
                
                $empresa = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
                
                /*===============================
                RECUPERAR LOS NOMBRES DE LOS DISTRITOS
                =================================*/
                
                $item = "idDistritos";
                $valor = $sucursal[$i]["idDistrito"];
                
                $distrito = ControladorDistrito::ctrMostrarDistrito($item,$valor);
                

                /*===================================
                RECUPERAR LOS NOMBRES DE LOS SERVICIOS
                ======================================
                */
                

                /*
                $item2 = "idEmpresa";
                $item3= "idDistritos";
                $item1 = "idSucursal";
                $item4= "idServicios";

                
                $valor1 = $sucursal[$i]["idSucursal"];
                $valor2= $sucursal[$i]["idEmpresa"];
                $valor3 = $sucursal[$i]["idDistrito"];
                
                
                $resp = ControladorGeneral::ctrMostrarGeneral($item1,$item2,$item4,$valor1,$valor2,$valor3);
   
 */
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$empresa["nombre"].'",
                            "'.$empresa["sector_economico"].'",
                            "'.$sucursal[$i]["direccion"].'",
                            "'.$distrito["nombre"].'",
                            "'.$empresa["fecha"].'"
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
