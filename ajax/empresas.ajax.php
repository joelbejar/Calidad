<?php

    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";



    class AjaxEmpresas{
 
        /*==============================
        VALIDAR NO REPETIR EMPRESA
        =================================
        */
        public $validarEmpresa;
        
        public function ajaxValidarEmpresa(){
            
            $item="nombre";
            $valor=$this->validarEmpresa;
            
            $resp = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
            
            echo json_encode($resp);
        }
        

        
        /*==============================
        MODIFICAR EMPRESAS
        =================================
        */
        
        public $idEmpresa;
        
        public function ajaxEditarEmpresa(){

            $item = "idEmpresa";
            $valor = $this->idEmpresa;
            
            $resp = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
            
            echo json_encode($resp);
        }

    }

/*============================
ACTIVAR VALIDAR EMPRESA
==============================
*/

if(isset($_POST["validarEmpresa"])){

	$activarUsuario = new AjaxEmpresas();
	$activarUsuario -> validarEmpresa = $_POST["validarEmpresa"];
	$activarUsuario -> ajaxValidarEmpresa();

}

/*============================
ACTIVAR EDITAR EMPRESA
==============================
*/

if(isset($_POST["idEmpresa"])){

	$activarUsuario = new AjaxEmpresas();
	$activarUsuario -> idEmpresa = $_POST["idEmpresa"];
	$activarUsuario -> ajaxEditarEmpresa();

}

