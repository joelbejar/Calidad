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
                        $item = "idUsuario_reportado";
                        $valor = $usuariosreportado[$i]["idUsuario_reportado"];
                        $usuario= ControladorGeneral::ctrMostrarGeneralUsuarioReportado($item,$valor);

                
                
                        $limpio=preg_replace("[\n|\r|\n\r]", "", $usuariosreportado[$i]["link_dni_que_reporta"]);
                $imagen= "<img class='img-responsive center-block' style='width:150px;height:150px;' src='data:image/jpeg;base64,".$limpio."' title='Título de la imágen' >";
               
                '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Modal title</h4></div><div class="modal-body"><img class="img-responsive center-block" style="width:100px;height:100px;" src="data:image/jpeg;base64,"'.$limpio.'" title="Título de la imágen" ></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div>';
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson	 .= '[
                            "'.($i+1).'",
                            "'.$usuario["nombre_usuario"].'",
                            "'.$usuario["apellido_usuario"].'",
                            "'.$usuario["email_usuario"].'",
                            "'.$usuario["usuario"].'",
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
