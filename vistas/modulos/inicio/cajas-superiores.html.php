<?php
    $totalVisitas=ControladorVisitas::ctrMostrarTotalVisitas();
    $totalValoraciones=ControladorValoraciones::ctrMostrarTotalValoraciones();

    $totalEmpresas=ControladorEmpresas::ctrMostrarTotalEmpresas();
    $usuarios=ControladorUsuarios::ctrMostrarTotalUsuarios("idUsuario");
    $totalUsuarios=count($usuarios);
    //var_dump($totalEmpresas);

?>



<!--=====================================
CAJAS SUPERIORES
======================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">

  <!-- small box -->
  <div class="small-box bg-aqua">
    
    <!-- inner -->
    <div class="inner">
      
      <h3><?=number_format($totalValoraciones["total"]);?></h3>

      <p>Valoraciones</p>
    
    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">
    
      <i class="ion ion-list-box"></i>
    </div>
    <!-- icon -->
    
    <a href="valoraciones" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small-box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-green">

    <!-- inner -->
    <div class="inner">
      
      <h3><?=number_format($totalVisitas["total"]);?></h3>

      <p>Visitas</p>
    
    </div>
    <!-- inner -->
    
    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-stats-bars"></i>
    
    </div>
    <!-- icon -->

    <a href="visitas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-yellow">
    
    <!-- inner -->
    <div class="inner">
    
      <h3><?=number_format($totalUsuarios);?></h3>

      <p>Usuarios Registrados</p>
    
    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-person-add"></i>
    
    </div>
    <!-- icon -->

    <a href="usuarios" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-red">
  
    <!-- inner -->
    <div class="inner">
    
      <h3><?=number_format($totalEmpresas["total"]);?></h3>

      <p>Empresas Registradas</p>

    </div>
    <!-- inner -->
    
    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-pie-graph"></i>
    
    </div>
    <!-- icon -->
    
    <a href="empresas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->
