<?php

    require_once "../controladores/valoraciones.controlador.php";
    require_once "../modelos/valoraciones.modelo.php";


    require_once "../controladores/general.controlador.php";
    require_once "../modelos/general.modelo.php";
    class TablaValoraciones{
        
        /*=============================
            MOSTRAR LA TABLA DE VALORACIONES
        ===================================
        */    
        public function mostrarTabla(){
            $item = null;
            $valor = null;
            
            //$valoracion  = ControladorValoraciones::ctrMostrarValoraciones($item,$valor);
            
            $valoracion=ControladorGeneral::ctrMostrarGeneralValoracion($valor);
            
            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($valoracion);$i++){
                
                
                /*===============================
                RECUPERAR LOS NOMBRES DE USUARIOS
                =================================
                */
                //$valor = $valoracion[$i]["idUsuario"];
                
                
                //$usuario = ControladorGeneral::ctrMostrarGeneralValoracion($valor);
                
                
	  			if( $valoracion[$i]["eliminado"] == 0){

	  				$colorEliminar = "btn-success";
	  				$textoEliminar = "Eliminar";
	  				$eliminarUsuario = 0;


	  			}else{

	  				$colorEliminar = "btn-danger";
	  				$textoEliminar = "Eliminado";
	  				$eliminarUsuario = 1;

	  			}

	  			$eliminado = "<button class='btn btn-xs btnEliminarValoracion ".$colorEliminar."' idValoracion='". $valoracion[$i]["idValoracion"]."' eliminarValoracion='".$eliminarUsuario."'>".$textoEliminar."</button>";
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$valoracion[$i]["nombreUsuario"].'",
                            "'.$valoracion[$i]["nombreEmpresa"].'",
                            "'.$valoracion[$i]["direccion"].'",
                            "'.$valoracion[$i]["comentario"].'",
                            "'.$valoracion[$i]["puntaje"].'",
                            "'.$eliminado.'",
                            "'.$valoracion[$i]["fecha"].'"
                        ],';
                }

                $datosJson = substr($datosJson, 0, -1);

                $datosJson.=  ']

                }'; 

                echo $datosJson;
        }
    }

/*===========================
    ACTIVAR TABLA DE USUARIOS
=============================
*/

$activar = new TablaValoraciones();
$activar -> mostrarTabla();
