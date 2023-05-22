<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');
include ('../../app/controllers/usuarios/modificar_consulta.php');
include ('../../app/controllers/usuarios/consulta_roles.php');

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MODIFICAR USUARIO</h1>
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
        <div class="card card-success" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
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
                  <form action="../../app/controllers/usuarios/modificar_users.php" method="post">
                        <input type="text" name="id_usuario" value="<?php echo $usuarios_id_get; ?>" hidden>
                        <div class="form-group">
                        <label for="">Nombre de Usuario</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username?>">
                      </div>
                      <div class="form-group">
                        <label for="">Correo Electronico</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $correo?>">
                      </div>
                      <div class="form-group">
                        <label for="">Cargo</label>
                        <select name="roles" id="" class="form-control">
                            <?php
                            foreach ($datos_roles as $dato_roles) {
                              $tabla_rol = $dato_roles['rol'];
                              $id_rol = $dato_roles['id_rol'];?>
                            <option value="<?php echo $id_rol;?>"<?php if($tabla_rol == $rol) {?> selected="selected" <?php } ?>>
                              <?php echo $tabla_rol;?>
                            </option>
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
                      <div class="form-group">
                        <label for="">Ultima actualizacion: <?php echo $act?></label>
                        </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar</button>
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