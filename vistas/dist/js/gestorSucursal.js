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
    
    
});*/


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
      	    
             $(".entradaSectorEconomico").show();
            $(".entradaSectorEconomico .sectorEmpresa").val(respuesta["sector_economico"]);

      	} 	 

  	}); 
})



$(".guardarSucursal").click(function(){
                
	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/
    /*console.log($(".seleccionarEmpresa").val());
    console.log($(".sectorEmpresa").val());
    console.log($(".direccionSucursal").val());
    console.log($(".seleccionarDistrito").val());
    console.log($(".seleccionarServicio").val());*/
    if($(".seleccionarEmpresa").val() != "" && $(".sectorEmpresa").val() != "" && $(".direccionSucursal").val() != "" && $(".seleccionarDistrito").val() != "" && $(".seleccionarServicio").val() != "" && $(".latitudSucursal").val() != "" && $(".longitudSucursal").val() != ""){
        agregarSucursal();
    }else{
		 swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		
    }


});

function agregarSucursal(){
    
    var id_empresa=parseInt($(".seleccionarEmpresa").val());
    var direccion_sucursal=$(".direccionSucursal").val();
    var id_distrito=parseInt($(".seleccionarDistrito").val());
    var id_servicio=parseInt($(".seleccionarServicio").val());
    var latitud=$(".latitudSucursal").val();
    var longitud=$(".longitudSucursal").val();
   
    console.log(id_empresa);
    console.log(direccion_sucursal);
    console.log(id_distrito);
    console.log(id_servicio);

        console.log(latitud);
    console.log(longitud);
    var datosSucursal = new FormData();
    datosSucursal.append("idEmpresa",id_empresa);
    datosSucursal.append("direccion",direccion_sucursal);
    datosSucursal.append("idDistrito",id_distrito);
    datosSucursal.append("idServicio",id_servicio);
    datosSucursal.append("latitud",latitud);
    datosSucursal.append("longitud",longitud);
    
    $.ajax({
        url:"ajax/nuevosucursal.ajax.php",
        method: "POST",
        data: datosSucursal,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res){
					
                
                if(res == "ok"){

						swal({
						  type: "success",
						  title: "La sucursal ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sucursal";

							}
						})
					}

        }
    });
    
    
    
}