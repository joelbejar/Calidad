<?php

    require_once "../controladores/valoraciones.controlador.php";
    require_once "../modelos/valoraciones.modelo.php";
    require_once "../controladores/usuarios.controlador.php";
    require_once "../modelos/usuarios.modelo.php";
    require_once "../controladores/sucursal.controlador.php";
    require_once "../modelos/sucursal.modelo.php";
    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";
    class TablaValoraciones{
        
        /*=============================
            MOSTRAR LA TABLA DE VALORACIONES
        ===================================
        */    
        public function mostrarTabla(){
            $item = null;
            $valor = null;
            
            $valoracion  = ControladorValoraciones::ctrMostrarValoraciones($item,$valor);
            


            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($valoracion);$i++){
                
                
                /*===============================
                RECUPERAR LOS NOMBRES DE USUARIOS
                =================================
                */
                $item = "idUsuario";
                $valor = $valoracion[$i]["idUsuario"];
                
                
                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
                
                /*===============================
                RECUPERAR LOS NOMBRES DE LAS EMPRESAS
                =================================
                */
                
                $item = "idSucursal";
                $valor = $valoracion[$i]["idSucursal"];
                
                $sucursal = ControladorSucursal::ctrMostrarSucursal($item,$valor);
                
                $item = "idEmpresa";
                $valor = $sucursal["idEmpresa"];

                $empresa = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
                
                /*=============================================
                REVISAR ESTADO  PARA ELIMINAR
                =============================================*/

                
	  			if( $valoracion[$i]["eliminado"] == 0){

	  				$colorEliminar = "btn-success";
	  				$textoEliminar = "Eliminado";
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
                            "'.$usuario["nombre"].'",
                            "'.$empresa["nombre"].'",
                            "'.$sucursal["direccion"].'",
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
