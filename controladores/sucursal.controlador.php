<?php

    class ControladorSucursal{
        
        static public function ctrMostrarSucursal($item,$valor){
            
            $tabla = "Empresa_sucursal";
            
            $resp = ModeloSucursal::mdlMostrarSucursal($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        static public function ctrMostrarRelacionServicio($item,$valor){
            
            $tabla = "Empresa_servicios";
            
            $resp = ModeloSucursal::mdlMostrarRelacionServicio($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        static public function ctrCrearSucursal($datos){
            if(isset($datos["direccion"])){

            
                        $respuesta = ModeloSucursal::mdlIngresarSucursal("Empresa_sucursal","Empresa_servicios",$datos);
                       
                        echo $respuesta;
          
                
                
            }else{

					echo'<script>

					swal({
						  type: "error",
						  title: "!La direccion de la surcursal no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sucursal";

							}
						})

			  	</script>';



			}
            
        }
        
    }