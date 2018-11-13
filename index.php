<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/empresas.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/visitas.controlador.php";
require_once "controladores/valoraciones.controlador.php";



require_once "modelos/administradores.modelo.php";
require_once "modelos/empresas.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/visitas.modelo.php";
require_once "modelos/valoraciones.modelo.php";




require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();