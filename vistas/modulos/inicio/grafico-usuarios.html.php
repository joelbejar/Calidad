<?php
    error_reporting(0);
    $item =null;
    $valor= null;
    $usuario=ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

    $arrayFechas= array();
    $arrayUsuario= array();
    $valor = 1;
    foreach($usuario as $key => $value){
        $fecha = substr($value["fecha"],0,7);
        
        
        array_push($arrayFechas,$fecha);
        
        
        $arrayUsuario=array($fecha=>$valor);
        foreach($arrayUsuario as $key => $value){
            $contarUsuario[$key]+=$value;
        }
    }


$noRepetirIndice=array_unique($arrayFechas);

?>



<!-- solid sales graph -->
<div class="box box-solid bg-teal-gradient">

	<!-- box-header -->
	<div class="box-header">

		<i class="fa fa-th"></i>

	    <h3 class="box-title">Gráfico usuarios</h3>

	    <div class="box-tools pull-right">
	      
	      <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>

	    </div>

	</div>
	<!-- box-header -->

	<!-- box-body -->
	<div class="box-body border-radius-none">

		<div class="chart" id="line-chart" style="height: 250px;"></div>

	</div>
	<!-- box-body -->

</div>
<!-- solid sales graph -->

<script>
	
var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [
        
        
    <?php
        foreach($noRepetirIndice as $value){
            echo "{ y: '".$value."', Usuarios: '".$contarUsuario[$value]."' },";
        }
        echo "{ y: '".$value."', Usuarios: '".$contarUsuario[$value]."' }";
    ?>
    ],
    xkey             : 'y',
    ykeys            : ['Usuarios'],
    labels           : ['Usuarios'],
    lineColors       : ['#efefef'],
    lineWidth        : 3,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 17
  });
	
</script>