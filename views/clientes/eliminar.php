<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');

include ('../../app/controllers/clientes/mostrar_clientes.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ELIMINAR CLIENTE</h1>
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
        <div class="card card-danger" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
              <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar el siguiente cliente?</h3>
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
                      <form action="../../app/controllers/clientes/eliminar_clientes.php" method="post">
                        <input type="text" name="id_cliente" value="<?php echo $clientes_id_get; ?>" hidden>
                        <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Apellido del Cliente</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $apellido?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Marca del Vehiculo</label>
                        <input type="text" name="marca_vehiculo" class="form-control" value="<?php echo $marca_vehiculo?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Modelo del Vehiculo</label>
                        <input type="text" name="modelo_vehiculo" class="form-control" value="<?php echo $modelo_vehiculo?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Placa del Vehiculo</label>
                        <input type="text" name="placa_vehiculo" class="form-control" value="<?php echo $placa_vehiculo?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Fecha de registro: <?php echo $creacion?></label>
                      </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a href="clientes.php" class="btn btn-secondary">Regresar</a>
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