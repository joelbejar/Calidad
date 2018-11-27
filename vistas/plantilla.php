<?php

session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de reclamaciones</title>



  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="vistas/dist/css/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
    <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- jvectormap -->
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- DataTables https://datatables.net/-->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.js"></script>
  <!-- ChartJS -->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>
  <script src="vistas/dist/js/login.js"></script>
  <style>
        .login-page{
            background: url(vistas/img/login/fondo1.jpg);
            background-size: cover ;
            background-repeat: no-repeat ;
            background-position: center;
        }
  </style>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
      /* jQueryKnob */
      $('.knob').knob();
      /* SideBar Menu */
      $('.sidebar-menu').tree();
    });
    </script>

</head>

<body class="hold-transition skin-blue sidebar-mini login-page">

<?php



 if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok"){

    echo '<div class="wrapper">';

    /*=============================================
     CABEZOTE
     =============================================*/

     include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

     include "modulos/lateral.php";

     /*=============================================
     CONTENIDO
     =============================================*/

     if(isset($_GET["ruta"])){

        if($_GET["ruta"] == "inicio" ||
           $_GET["ruta"] == "salir" ||
           $_GET["ruta"] == "usuarios" ||
           $_GET["ruta"] == "empresas" ||
           $_GET["ruta"] == "sucursal" ||
           $_GET["ruta"] == "valoraciones" ||
           $_GET["ruta"] == "usuario-reportado" 

            ){


          include "modulos/".$_GET["ruta"].".php";

        }

     }

     /*=============================================
     FOOTER
     =============================================*/

     include "modulos/footer.php";


    echo '</div>';

 }else{

  include "modulos/login.php";

 }

 
?>



<script src="vistas/dist/js/gestorUsuarios.js"></script>
<script src="vistas/dist/js/gestorUsuarioReportado.js"></script>
<script src="vistas/dist/js/gestorValoraciones.js"></script>
<script src="vistas/dist/js/gestorSucursal.js"></script>
<script src="vistas/dist/js/gestorEmpresas.js"></script>
</body>
</html>