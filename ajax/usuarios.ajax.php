<?php

    require_once "../controladores/usuarios.controlador.php";
    require_once "../modelos/usuarios.modelo.php";



    class AjaxUsuarios{
        
        
        /*==============================
        ACTIVAR USUARIO
        =================================
        */
        public $activarUsuario;
        public $activarId;
        public $eliminarId;
        public $eliminarUsuario;
        
        public function ajaxActivarUsuario(){
            $resp = ModeloUsuarios::mdlActualizarUsuario("Usuario", "es_identificado", $this->activarUsuario, "idUsuario", $this->activarId);

            echo $resp;
        }
        
        public function ajaxEliminarUsuario(){
            $resp = ModeloUsuarios::mdlEliminarUsuario("Usuario", "es_eliminado", $this->eliminarUsuario, "idUsuario", $this->eliminarId);

            echo $resp;
        }
        
    }



if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

if(isset($_POST["eliminarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> eliminarUsuario = $_POST["eliminarUsuario"];
	$activarUsuario -> eliminarId = $_POST["eliminarId"];
	$activarUsuario -> ajaxEliminarUsuario();

}