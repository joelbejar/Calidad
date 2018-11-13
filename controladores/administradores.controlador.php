<?php

class ControladorAdministradores{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

            if(isset($_POST["usuario"]) && isset($_POST["password"])){
                $usuario = htmlspecialchars($_POST["usuario"]);
                $password= htmlspecialchars($_POST["password"]);
                /*if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {$websiteErr = "Invalid URL"; }*/
                if($usuario!='' && $password!=''){
                    if(preg_match('/^[a-zA-Z0-9]*$/',$usuario) && preg_match('/^[a-zA-Z0-9]*$/',$password) ){
                        $tabla="admin";
                        $item_usu="usuario_admin";
                        $item_pas="password_admin";
                        $resp = ModeloAdministradores::mdlMostrarAdministrador($tabla,$item_usu,$usuario,$item_pas,$password);
                        if($resp["usuario_admin"]==$usuario && $resp["password_admin"]==$password){
                            $_SESSION["validarSesion"]= "ok";
                            $_SESSION["id"]=$resp["id"];
                            $_SESSION["usuario"]=$resp["usuario_admin"];
                            $_SESSION["password"]=$resp["password_admin"];
                      
                            if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"]==="ok"){
                            
                      
                       
                                    echo '<script>

						                  window.location = "inicio";

					                      </script>';
                                

                            }
                        }else{
                            echo '<div class="alert alert-danger" style="margin-top:20px !important; width:226px; margin:auto; text-align:center;" role="alert">Los datos son incorrectos !</div>';
                        }
                     }
                    
                    }else{
                        echo '<div class="alert alert-warning" style="margin-top:20px !important; width:226px; margin:auto; text-align:center;" role="alert">Debe rellenar todo los campos</div>';
                    }
                }

	}

}

