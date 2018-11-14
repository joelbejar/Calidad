/*
======================================
CARGAR LA TABLA DINAMICA DE SUCURSAL
==========================================
*/

/*
$.ajax({
    
    url:"ajax/tablaSucursal.ajax.php",
    success:function(resp){
        console.log("respuesta",resp);
    }
    
    
})*/


$(".tablaSucursal").DataTable({
	 "ajax": "ajax/tablaSucursal.ajax.php",
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




/*
==========================

===========================

*/

$(".seleccionarEmpresa").change(function(){
    
    var empresa = $(this).val();
    
    
	var datos = new FormData();
    datos.append("idEmpresa",empresa);
    
  	$.ajax({

  		 url:"ajax/empresas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
        dataType: "json",
      	success: function(respuesta){ 
      	    
      	     console.log("respuesta", respuesta);
             $(".entradaSectorEconomico").show();
            $(".entradaSectorEconomico .sectorEmpresa").val(respuesta["sector_economico"]);

      	} 	 

  	}); 
})
