<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');
include ('../../app/controllers/usuarios/consulta_roles.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CREACION DE USUARIOS</h1>
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
                    <form action="../../app/controllers/usuarios/crear_users.php" method="post">
                      <div class="form-group">
                        <label for="">Nombre de Usuario</label>
                        <input type="text" name="username" class="form-control" placeholder="Escriba su nombre de usuario..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Correo Electronico</label>
                        <input type="email" name="correo" class="form-control" placeholder="Escriba su correo electronico..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Cargo</label>
                          <select name="roles" id="" class="form-control">
                            <?php
                            foreach ($datos_roles as $dato_roles) {?>
                            <option value="<?php echo $dato_roles['id_rol'];?>"><?php echo $dato_roles['rol'];?></option>
                            <?php 
                            }
                            ?>
                          </select>
                        </div>
                      <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Repita la Contraseña</label>
                        <input type="password" name="password_repet" class="form-control" placeholder="Contraseña..." required="required">
                      </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
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