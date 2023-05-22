<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');

include ('../../app/controllers/usuarios/mostrar_users.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">VISUALIZACION DE USUARIO</h1>
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
                <h3 class="card-title">Visualizando los datos...</h3>

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
                      <div class="form-group">
                        <label for="">Nombre de Usuario</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Correo Electronico</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $correo?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Cargo</label>
                        <input type="text" name="rol" class="form-control" value="<?php echo $rol?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Fecha de creacion: <?php echo $creacion?></label>
                      </div>
                      <hr>
                      <div class="form-group">
                        <a href="usuarios.php" class="btn btn-secondary">Regresar</a>
                      </div>
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