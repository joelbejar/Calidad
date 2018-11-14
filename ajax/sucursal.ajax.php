<?php


    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";



    class AjaxSucursal{
        
        public $idEmpresa;
        public function AjaxTraerSectorEconomico(){
           $item = "idEmpresa";
           $valor = $this -> idEmpresa;
           $resp = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
            
            
            echo json_encode($resp);
            
            
        }
        
        
    }


/*=============================================
TRAER SECTOR ECONOMICO
=============================================*/
if(isset($_POST["idEmpresa"])){

	$traerSubCategoria = new AjaxSucursal();
	$traerSubCategoria -> idEmpresa = $_POST["idEmpresa"];
	$traerSubCategoria -> AjaxTraerSectorEconomico();

}

    