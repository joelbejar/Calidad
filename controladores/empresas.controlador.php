<?php

    class ControladorEmpresas{
        
        public function ctrMostrarTotalEmpresas(){
            $tabla="Empresa";
            
            $resp=ModeloEmpresas::mdlMostrarTotalEmpresas($tabla);
            
            return $resp;
        }
        
        
        public static function ctrMostrarEmpresas($item,$valor){
            $tabla="Empresa";
            
            $resp=ModeloEmpresas::mdlMostrarEmpresas($tabla,$item,$valor);
            
            return $resp;
            
        }
        
        
        
        /*========================
        REGISTRAR EMPRESA
        ==========================
        */
        
        public function ctrRegistrarEmpresa(){
            if(isset($_POST["nombreEmpresa"])){
                
                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreEmpresa"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["sectorEconomico"])){
                    
                    $datos = array("nombre" => $_POST["nombreEmpresa"],"sector_economico"=>$_POST["sectorEconomico"]);
                    
                    $respuesta=ModeloEmpresas::mdlRegistrarEmpresa("Empresa",$datos);
                    
                    if($respuesta == "ok"){

                        echo'<script>

                            swal({
                                  type: "success",
                                  title: "La Empresa ha sido guardada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                    if (result.value) {

                                    window.location = "empresas";

                                    }
                                })

                            </script>';

				    }
                    
                }else{
                    echo'<script>

                            swal({
                                  type: "error",
                                  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  })

			  	         </script>';

			  	return;
                }
            }
        }
        
        /*========================
        EDITAR EMPRESA
        ==========================
        */
        public function ctrEditarEmpresa(){
            if(isset($_POST["editarEmpresa"])){
                
                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmpresa"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarsectorEconomico"])){
                    
                    $datos = array("nombre" => $_POST["editarEmpresa"],"sector_economico"=>$_POST["editarsectorEconomico"]);
                    
                    $respuesta=ModeloEmpresas::mdlRegistrarEmpresa("Empresa",$datos);
                    
                    if($respuesta == "ok"){

                        echo'<script>

                            swal({
                                  type: "success",
                                  title: "La Empresa ha sido modificada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                    if (result.value) {

                                    window.location = "empresas";

                                    }
                                })

                            </script>';

				    }
                    
                }else{
                    echo'<script>

                            swal({
                                  type: "error",
                                  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  })

			  	         </script>';

			  	return;
                }
            }   
            
            
            
        }
        
        /*========================
        EDITAR EMPRESA
        ==========================
        */
        
        public function ctrEliminarEmpresa(){
            if(isset($_GET["idempresa"])){
                
                
                $resp = ModeloEmpresas::mdlEliminarEmpresa("Empresa",$_GET["idempresa"]);
                
                    if($resp == "ok"){

                        echo'<script>

                            swal({
                                  type: "success",
                                  title: "La Empresa ha sido eliminada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                    if (result.value) {

                                    window.location = "empresas";

                                    }
                                })

                            </script>';

				    }
                
            }
        }
        
    }


?>