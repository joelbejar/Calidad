<?php


    require_once "../controladores/sucursal.controlador.php";
    require_once "../modelos/sucursal.modelo.php";


    class AjaxSucursal{

	/*=============================================
	GUARDAR SUCURSAL
	=============================================*/	
        
        public $idEmpresa;
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