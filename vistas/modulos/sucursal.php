<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor Sucursal
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Sucursal</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSucursal">

            Registrar Sucursal

          </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaSucursal" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Empresa</th>
              <th>Sector Economico</th>
              <th>Dirección</th>
              <th>Distrito</th>
              <th>Servicio</th>
              <th>Latitud</th>
              <th>Longitud</th>
              <th>Fecha</th>
              
            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>




<!--=====================================
MODAL AGREGAR SUCURSAL
======================================-->

<div id="modalAgregarSucursal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

 

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Sucursal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

           <!--=====================================
            AGREGAR EMPRESA
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarEmpresa">
                  
                    <option value="">Selecionar empresa</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
                    foreach ($empresa as $key => $value) {
                      
                      echo '<option value="'.$value["idEmpresa"].'">'.$value["nombre"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>

 

            
            
            
            <!--=====================================
            AGREGAR SECTOR ECONOMICO
            ======================================-->

            <div class="form-group  entradaSectorEconomico" style="display:none">
              
               <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg validarEmpresa sectorEmpresa" name="sectorEmpresa"> 
            

                </div>

            </div>
            

            <!--=====================================
            ENTRADA DE LA DIRECCION DE LA SUCURSAL
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg direccionSucursal" placeholder="Ingresar dirección" name="direccionSucursal" > 

              </div> 

            </div>
            

           <!--=====================================
            AGREGAR DISTRITO
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarDistrito">
                  
                    <option value="">Selecionar Distrito</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);
                    foreach ($distrito as $key => $value) {
                      
                      echo '<option value="'.$value["idDistritos"].'">'.$value["nombre"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>


           <!--=====================================
            AGREGAR SERVICIO
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarServicio">
                  
                    <option value="">Selecionar Servicio</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $servicio = ControladorServicio::ctrMostrarServicio($item, $valor);
                    foreach ($servicio as $key => $value) {
                      
                      echo '<option value="'.$value["idServicios"].'">'.$value["nombre"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>
            
           <!--=====================================
            AGREGAR LATITUD Y LONGITUD
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">VER MAPA</button>


                </div>

            </div>

            <!--=====================================
            ENTRADA DE LA DIRECCION DE LA SUCURSAL
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg latitudSucursal" placeholder="Latitud" name="latitudSucursal" id="latitud" disabled > 

              </div> 

            </div>
            
            <!--=====================================
            ENTRADA DE LA DIRECCION DE LA SUCURSAL
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg longitudSucursal" placeholder="Longitud" name="longitudSucursal" id="longitud" disabled > 

              </div> 

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary guardarSucursal">Registrar Sucursal</button>

        </div>





    </div>

  </div>

</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div id="map" style="width: 100%; height: 600px;"></div>
            <br>
        <div class="modal-footer text-center formulario_modal_salir">
            <button type="button" class="btn btn-large text-center" data-dismiss="modal">Generar Coordenadas</button>
    
      </div>
    </div>
  </div>
</div>

<script>


var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function () 
{

    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            
           
          },function(error){console.log(error);});
    
}



function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 13,
        center:new google.maps.LatLng(coords.lat,coords.lng),

      });

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),

      });
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
      marker.addListener('click', toggleBounce);
      
      marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();         
      });
}

//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

// Carga de la libreria de google maps 

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
