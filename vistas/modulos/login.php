 <div class="login-box">
  <div class="login-logo">
    <h1>Administrador</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus datos de acceso</p>

    <form  method="post">
      <div class="form-group ">
        <label for="usuario">Usuario</label>
        <input type="usuario" id="usuario" name="usuario" class="form-control"  >
      </div>
      <div class="form-group ">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control"  >
        <div class="d-xs cont_ojo" id="icon-view-pass">
            <button class="btn btn-view-pass" type="button" id="view-pass">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                <i></i>
            </button>                                    
        </div>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" id="enviar_login" name="enviar_login"  class="btn button_login btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>


    </form>

      <?php

        $login = new ControladorAdministradores();
        $login -> ctrIngresoAdministrador();

      ?>
  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->








