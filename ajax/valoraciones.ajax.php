<?php

    require_once "../controladores/valoraciones.controlador.php";
    require_once "../modelos/valoraciones.modelo.php";



    class AjaxValoracion{

        public $eliminarId;
        public $eliminarValoracion;
        
        
        public function ajaxEliminarValoracion(){
            $resp = ModeloValoraciones::mdlEliminarValoracion("Valoracion", "eliminado", $this->eliminarValoracion, "idValoracion", $this->eliminarId);

            echo $resp;
        }
        
    }



if(isset($_POST["eliminarValoracion"])){

	$activarUsuario = new AjaxValoracion();
	$activarUsuario -> eliminarValoracion = $_POST["eliminarValoracion"];
	$activarUsuario -> eliminarId = $_POST["eliminarId"];
	$activarUsuario -> ajaxEliminarValoracion();

}