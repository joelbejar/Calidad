/*
======================================
CARGAR LA TABLA DINAMICA DE USUARIOS
==========================================
*/

/*
$.ajax({
    
    url:"ajax/tablaValoraciones.ajax.php",
    success:function(resp){
        console.log("r",resp);
    }
    
    
})*/


$(".tablaOpinion").DataTable({
	 "ajax": "ajax/tablaValoraciones.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }

});

/*=============================================
ELIMINAR VALORACION
=============================================*/

$(".tablaOpinion tbody").on("click", ".btnEliminarValoracion", function(){

	var idValoracion = $(this).attr("idValoracion");
	var eliminarValoracion = $(this).attr("eliminarValoracion");

    
	var datos = new FormData();
 	datos.append("eliminarId", idValoracion);
  	datos.append("eliminarValoracion", eliminarValoracion);

  	$.ajax({

  		 url:"ajax/valoraciones.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	     //console.log("respuesta", respuesta);

      	} 	 

  	});
 
  	if(eliminarValoracion == 0){

  		$(this).removeClass('btn-danger');
  		$(this).addClass('btn-success');
  		$(this).html('Eliminado');
  		$(this).attr('eliminarValoracion',1);
  	
  	}else{

  		$(this).addClass('btn-danger');
  		$(this).removeClass('btn-success');
  		$(this).html('Eliminado');
  		$(this).attr('eliminarValoracion',0);

  	}

})