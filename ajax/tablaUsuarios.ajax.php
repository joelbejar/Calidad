<?php

    require_once "../controladores/usuarios.controlador.php";
    require_once "../modelos/usuarios.modelo.php";

    class TablaUsuarios{
        
        /*=============================
            MOSTRAR LA TABLA DE USUARIOS
        ===================================
        */    
        public function mostrarTabla(){
            $item = null;
            $valor = null;
            
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
            


            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($usuarios);$i++){
                /*=============================================
                REVISAR ESTADO PARA VERIFICAR
                =============================================*/

                
	  			if( $usuarios[$i]["es_identificado"] == 0){

	  				$colorEstado = "btn-danger";
	  				$textoEstado = "Desactivado";
	  				$estadoUsuario = 0;

	  			}else{

	  				$colorEstado = "btn-success";
	  				$textoEstado = "Activado";
	  				$estadoUsuario = 1;

	  			}

	  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idUsuario='". $usuarios[$i]["idUsuario"]."' estadoUsuario='".$estadoUsuario."'>".$textoEstado."</button>";


                /*=============================================
                REVISAR ESTADO  PARA ELIMINAR
                =============================================*/

                
	  			if( $usuarios[$i]["es_eliminado"] == 0){

	  				$colorEliminar = "btn-success";
	  				$textoEliminar = "Eliminar";
	  				$eliminarUsuario = 0;


	  			}else{

	  				$colorEliminar = "btn-danger";
	  				$textoEliminar = "Eliminado";
	  				$eliminarUsuario = 1;

	  			}

	  			$eliminado = "<button class='btn btn-xs btnEliminar ".$colorEliminar."' idUsuario='". $usuarios[$i]["idUsuario"]."' eliminarUsuario='".$estadoUsuario."'>".$textoEliminar."</button>";
                
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$usuarios[$i]["nombre"].'",
                            "'.$usuarios[$i]["apellido"].'",
                            "'.$usuarios[$i]["correo"].'",
                            "'.$usuarios[$i]["nombre_usuario"].'",
                            "'.$usuarios[$i]["dni"].'",
                            "'.$usuarios[$i]["sexo"].'",                        
                            "'.$estado.'",
                            "'.$eliminado.'",
                            "'.$usuarios[$i]["fecha"].'"  
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

$activar = new TablaUsuarios();
$activar -> mostrarTabla();
