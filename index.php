<?php

include ('app/config.php');
include ('layout/sesion.php');
include ('layout/part1.php');
include ('app/controllers/usuarios/listado_users.php');
include ('app/controllers/clientes/listado_clientes.php');
include ('app/controllers/reparaciones/listado_reparaciones.php');

if(isset($_SESSION['mensajebien'])){
  $uuuuser = $_SESSION['mensajebien'];?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Bienvenido <br> <?php echo $uuuuser?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php
  unset($_SESSION['mensajebien']);
}
?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MENU DE INICIO</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
            <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                foreach($datos_usuarios as $usuario_dato){
                  $contador_usuarios = $contador_usuarios + 1;
                }
                ?>
                <h3><?php echo $contador_usuarios;?></h3>
                <p><h4>Usuarios Registrados</h4></p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-address-book"></i>
              </div>
              <a href="<?php echo $URL?>/views/usuarios/usuarios.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <?php
                $contador_reparaciones = 0;
                foreach($datos_clientes as $cliente_dato){
                  $contador_reparaciones = $contador_reparaciones + 1;
                }
                ?>
                <h3><?php echo $contador_reparaciones;?></h3>
                <p><h4>Clientes Registrados</h4></p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-users"></i>
              </div>
              <a href="<?php echo $URL?>/views/clientes/clientes.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_reparaciones = 0;
                foreach($datos_reparaciones as $reparacion_dato){
                  $contador_reparaciones = $contador_reparaciones + 1;
                }
                ?>
                <h3><?php echo $contador_reparaciones;?></h3>
                <p><h4>Reparaciones</h4></p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-screwdriver-wrench"></i>
              </div>
              <a href="<?php echo $URL?>/views/reparaciones/reparaciones.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <?php
                $contador_reparaciones = 0;
                foreach($datos_reparaciones as $reparacion_dato){
                  $contador_reparaciones = $contador_reparaciones + 1;
                }
                ?>
                <h3><?php echo $contador_reparaciones;?></h3>
                <p><h4>Facturación</h4></p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-hand-holding-dollar"></i>
              </div>
              <a href="<?php echo $URL?>/views/reparaciones/reparaciones.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  
          <!-- ./col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include ('layout/part2.php');

?>
