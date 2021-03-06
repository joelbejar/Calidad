<?php


    require_once "../controladores/empresas.controlador.php";
    require_once "../modelos/empresas.modelo.php";

    require_once "../controladores/sucursal.controlador.php";
    require_once "../modelos/sucursal.modelo.php";


    class AjaxSucursal{
        
        public $idEmpresa;
        public function AjaxTraerSectorEconomico(){
           $item = "idEmpresa";
           $valor = $this -> idEmpresa;
           $resp = ControladorEmpresas::ctrMostrarEmpresas($item,$valor);
            
            
            echo json_encode($resp);
            
            
        }
	/*=============================================
	GUARDAR SUCURSAL
	=============================================*/	

        public $direccion;
        public $idDistrito;
        public $idServicio;
        public $latitud;
        public $longitud;
	public function  ajaxCrearSucursal(){

		$datos = array(
			"idEmpresa"=>$this->idEmpresa,
			"direccion"=>$this->direccion,
			"idDistrito"=>$this->idDistrito,
			"idServicio"=>$this->idServicio,
			"latitud"=>$this->latitud,
			"longitud"=>$this->longitud
			);

		$respuesta = ControladorSucursal::ctrCrearSucursal($datos);
   
		echo $respuesta;

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

  /*=============================================
CREAR SUCURSAL
=============================================*/
if(isset($_POST["direccion"])){

	$sucursal = new AjaxSucursal();
	$sucursal -> idEmpresa = $_POST["idEmpresa"];
	$sucursal -> direccion = $_POST["direccion"];
	$sucursal -> idDistrito = $_POST["idDistrito"];
	$sucursal -> idServicio = $_POST["idServicio"];
	$sucursal -> latitud = $_POST["latitud"];
	$sucursal -> longitud = $_POST["longitud"];
	$sucursal -> ajaxCrearSucursal();

}
  