



<!--=====================================
USUARIOS
======================================-->	

<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
		
		<span class="hidden-xs"><?=$_SESSION["usuario"];?></span>
	
	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="user-header">
		
			<img src="vistas/dist/img/avatar.png" class="img-circle" alt="User Image">

		
		</li>

		<li class="user-footer">
		
			
			<div class="col-xs-12">
			
				<a href="salir" style="width:100%;" class="btn btn-default btn-flat ">Salir</a>
			
			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->