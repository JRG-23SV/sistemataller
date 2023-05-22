<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">FORMULARIO PARA AGREGAR CLIENTES</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-md-6">
        <div class="card card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
              <div class="card-header">
                <h3 class="card-title">Rellene los datos correctamente...</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../../app/controllers/clientes/crear_clientes.php" method="post">
                      <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del cliente..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Apellido del Cliente</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Escriba el apellido del cliente..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Marca del Vehiculo</label>
                        <input type="text" name="marca_vehiculo" class="form-control" placeholder="Escriba la marca del vehiculo..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Modelo del Vehiculo</label>
                        <input type="text" name="modelo_vehiculo" class="form-control" placeholder="Escriba el modelo del vehiculo..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Placa del Vehiculo</label>
                        <input type="text" name="placa_vehiculo" class="form-control" placeholder="Ejemplo P458E98" required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="inputTelefono" placeholder="0000-0000">
                      </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      </div><!-- /.container-fluid -->
    <!-- /.content -->  
  <!-- /.content-wrapper -->
<?php

include ('../../layout/mensaje.php');
include ('../../layout/part2.php');

?>
<script>
$("#inputTelefono").mask("9999-9999");

</script>