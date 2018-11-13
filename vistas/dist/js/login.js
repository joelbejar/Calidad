$(document).ready(function() {

	var cont=0;

	$('#view-pass').click(function(){
		

		cont = cont+1;
 
		

		if(cont==1){
			//console.log('muestra pass');
			$('#password').attr('type','text');
			$('.btn-view-pass').html('<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span><i></i>');
		}else if(cont>1){
			//console.log('oculta pass');
			$('#password').attr('type','password');
			$('.btn-view-pass').html('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><i></i>');
			cont=0;
		}
		//ocultamos el primer boton
		//

	});	

});