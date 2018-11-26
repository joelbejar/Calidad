<?php

    require_once "../controladores/usuarios.controlador.php";
    require_once "../modelos/usuarios.modelo.php";


    require_once "../controladores/general.controlador.php";
    require_once "../modelos/general.modelo.php";
    class TablaUsuariosReportado{
        
        /*=============================
            MOSTRAR LA TABLA DE USUARIOS
        ===================================
        */    
        public function mostrarTabla(){
            $item = null;
            $valor = null;
            
            $usuariosreportado = ControladorUsuarios::ctrMostrarUsuariosReportados($item,$valor);
            
      

            $datosJson='{
            "data": [ ';
            for ($i=0;$i<count($usuariosreportado);$i++){
                        $valor = $usuariosreportado[$i]["idUsuario_reportado"];
                        $usuario= ModeloGeneral::mdlMostrarGeneralUsuarioReportado($valor);
                
                   

                       $limpio=preg_replace("[\n|\r|\n\r]", "", $usuariosreportado[$i]["link_dni_que_reporta"]);
                         $imagen= "<img class='img-responsive center-block' style='width:150px;height:150px;' src='data:image/jpeg;base64,".$limpio."' title='Título de la imágen' >";
                  
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$usuario["nombre_reportado"].'",
                            "'.$usuario["email_usuario_reportado"].'",
                            "'.$usuario["nombre_que_reporta"].'",
                            "'.$usuariosreportado[$i]["motivo"].'",
                            "'.$usuariosreportado[$i]["telefono_que_reporta"].'",
                            "'.$imagen.'",
                            "'.$usuariosreportado[$i]["fecha"].'"
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

$activar = new TablaUsuariosReportado();
$activar -> mostrarTabla();
