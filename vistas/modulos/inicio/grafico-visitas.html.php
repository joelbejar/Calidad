<?php

    $valor=null;
    $empresa=ModeloGeneral::mdlMostrarGeneral($valor); 
    for($i=0;$i<count($empresa);$i++){
            $totalPuntaje+=$empresa[$i]["puntaje"];   
    }
    $color= array("aqua","green","blue","red","purple","yellow","brown","black");


?>

<!-- box -->
<div class="box box-default">

	<!-- box-header -->
  	<div class="box-header with-border">
  
    	<h3 class="box-title">Empresas con alto puntajes</h3>

    	<div class="box-tools pull-right">
      
      		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      		</button>

    	</div>

  	</div>
 	<!-- box-header -->

 	<!-- box-body -->
  	<div class="box-body">
    
	    <!-- row -->
	    <div class="row">
	      
	      <!-- col -->
	      <div class="col-md-8">
	        
	        <div class="chart-responsive">
	          
	          <canvas id="pieChart" height="150"></canvas>
	        
	        </div>

	      </div>
	      <!-- col -->

	      <!-- col -->
	      <div class="col-md-4">

	        <ul class="chart-legend clearfix">

          <?php

             for($i=0;$i<count($empresa);$i++){
                 echo '<li><i class="fa fa-circle-o text-'.$color[$i].'"></i> '.$empresa[$i]["nombre"].'</li>';
                
            }

          ?>
	        
	        </ul>
	      
	      </div>
	      <!-- col -->

	    </div>
	    <!-- row -->

  	</div>
  	<!-- /.box-body -->

  	<!-- box-footer -->
  	<div class="box-footer no-padding">
    
	    <!-- nav-pills -->
	    <ul class="nav nav-pills nav-stacked">
        <?php
            
            for($i=0;$i<count($empresa);$i++){
                  echo '	<li>        
                          <a href="#">'.$empresa[$i]["nombre"].'
                          <span class="pull-right text-red">'.ceil($empresa[$i]["puntaje"]*100/$totalPuntaje).'%</span></a>
                      </li>';
                
            }
            ?>
	    </ul>
	    <!-- nav-pills -->

  	</div>
  	<!-- /.footer -->

</div>
<!-- box -->

<script>
	
// -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
      
      
      <?php
     for($i=0;$i<count($empresa);$i++){
                        echo "{
              value    : ".$empresa[$i]["puntaje"].",
              color    : '".$color[$i]."',
              highlight: '".$color[$i]."',
              label    : '".$empresa[$i]["nombre"]."'
            },";
                
            }
      
      ?>
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------

	
</script>
