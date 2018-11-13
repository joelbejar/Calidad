<?php

    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";

    class TablaEmpresas{
        
        /*=============================
            MOSTRAR LA TABLA DE EMPRESAS
        ===================================
        */    
        public function mostrarTablaEmpresa(){
            $item = null;
            $valor = null;
            
            $empresas = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
            
        

            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($empresas);$i++){

                /*=============================================
                CREAR LAS ACCIONES
                =============================================*/

                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarEmpresa' idempresa='".$empresas[$i]["idEmpresa"]."' data-toggle='modal' data-target='#modalEditarEmpresa'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarEmpresa' idempresa='".$empresas[$i]["idEmpresa"]."'><i class='fa fa-times'></i></button></div>";
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$empresas[$i]["nombre"].'",
                            "'.$empresas[$i]["sector_economico"].'",
                            "'.$empresas[$i]["fecha"].'",
                            "'.$acciones.'"
                        ],';
                }

                $datosJson = substr($datosJson, 0, -1);

                $datosJson.=  ']

                }'; 

                echo $datosJson;
            
        }
    }

/*===========================
    ACTIVAR TABLA DE EMPRESAS
=============================
*/

$activar = new TablaEmpresas();
$activar -> mostrarTablaEmpresa();