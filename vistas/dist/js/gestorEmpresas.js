/*
======================================
CARGAR LA TABLA DINAMICA DE EMPRESAS
==========================================
*/

/*
$.ajax({
    
    url:"ajax/tablaEmpresas.ajax.php",
    success:function(resp){
        console.log("respuesta",resp);
    }
    
    
})*/

$(".tablaEmpresa").DataTable({
	 "ajax": "ajax/tablaEmpresas.ajax.php",
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



/*=====================================
MODAL AGREGAR EMPRESA
======================================*/

$(".validarEmpresa").change(function(){
    
    $(".alert").remove();    
    var empresa=$(this).val();
    var datos = new FormData();
    datos.append("validarEmpresa",empresa);
    
  	$.ajax({

  		 url:"ajax/empresas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
        dataType: "json",
      	success: function(respuesta){ 
      	    
      	     //console.log("respuesta", respuesta);
            
            
            if(respuesta){
                
                $(".validarEmpresa").parent().after('<div class="alert alert-warning" role="alert">El nombre de la empresa Ya existe..!</div>');
                $(".validarEmpresa").val('');
            }

      	} 	 

  	});
    
})


$(".tablaEmpresa tbody").on("click", ".btnEditarEmpresa", function(){
    
    var idempresa=$(this).attr("idempresa");
    console.log(idempresa);
    
    
    var datos = new FormData();
    datos.append("idEmpresa",idempresa);
    
  	$.ajax({

  		url:"ajax/empresas.ajax.php",
  		method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
        dataType: "json",
      	success: function(respuesta){ 
      	     $("#modalEditarEmpresa .editarIdEmpresa").val(respuesta["idEmpresa"]);
      	     $("#modalEditarEmpresa .nombreEmpresa").val(respuesta["nombre"]);
      	     $("#modalEditarEmpresa .sectorEconomico").val(respuesta["sector_economico"]);       
            

      	} 	 

  	});
    
})


$(".tablaEmpresa tbody").on("click", ".btnEliminarEmpresa", function(){
    
    var idempresa=$(this).attr("idempresa");
    console.log(idempresa);
    
    
    swal({
    	title: '¿Está seguro de borrar la Empresa?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar Empresa!'
	 }).then(function(result){

    	if(result.value){

      	  window.location = "index.php?ruta=empresas&idempresa="+idempresa;

    	}

  	})
    
})



