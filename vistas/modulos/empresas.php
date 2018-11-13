<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor Empresas
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Empresas</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">

            Registrar Empresa

          </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaEmpresa" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Empresa</th>
              <th>Sector Economico</th>
              <th>Fecha</th>
              <th>Acciones</th>
              
            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR EMPRESA
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL NOMBRE DE LA EMPRESA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarEmpresa nombreEmpresa" placeholder="Ingresar empresa" name="nombreEmpresa" required> 

              </div> 

            </div>
            
            <!--=====================================
            ENTRADA DEL SECTOR ECONOMICO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg sectorEconomico" placeholder="Ingresar el sector economico" name="sectorEconomico" required> 

              </div> 

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Registrar Empresa</button>

        </div>

      </form>
      <?php
        
            $registrarEmpresa= new ControladorEmpresas();
            $registrarEmpresa->ctrRegistrarEmpresa();
        
        
      ?>


    </div>

  </div>

</div>









<!--=====================================
MODAL EDITAR EMPRESA
======================================-->

<div id="modalEditarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="editarIdEmpresa" name="editarIdEmpresa">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar Empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL NOMBRE DE LA EMPRESA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarEmpresa nombreEmpresa" placeholder="Ingresar empresa" name="editarEmpresa" required> 
                
                

              </div> 

            </div>
            
            <!--=====================================
            ENTRADA DEL SECTOR ECONOMICO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg sectorEconomico" placeholder="Ingresar el sector economico" name="editarsectorEconomico" required> 

              </div> 

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios Empresa</button>

        </div>

      </form>

        <?php
        
            $editarEmpresa= new ControladorEmpresas();
        
            $editarEmpresa->ctrEditarEmpresa();
        
        
        ?>

    </div>

  </div>

</div>


        <?php
        
            $eliminarEmpresa= new ControladorEmpresas();
        
            $eliminarEmpresa->ctrEliminarEmpresa();
        
        
        ?>



<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
$(document).keydown(function(e){

  if(e.keyCode == 13){

    e.preventDefault();

  }

})


</script>