<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEMA TALLER</title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $URL;?>/img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $URL;?>/img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $URL;?>/img/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="<?php echo $URL;?>/img/favicon_io/site.webmanifest">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL;?>/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!--sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  
  <!--DataTables-->
  <link rel="stylesheet" href="<?php echo $URL;?>/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="<?php echo $URL;?>/">INICIO</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item d-none d-sm-inline-block">
      <div class="user-panel mt-3 pb-1 mb-1 d-flex">
        <div class="image">
          <img src="<?php echo $URL?>/templates/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h5>Usuario: <?php echo $user_tb;?></h5>
        </div>
      </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <div class="user-panel mt-3 pb-1 mb-1 d-flex">
            <a href="<?php echo $URL?>/app/controllers/login/logout.php" class="nav-link">
              <h5><i class="fa-solid fa-power-off"></i></h5>
            </a>
      </li>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="<?php echo $URL;?>/" class="brand-link">
      <img src="<?php echo $URL;?>/img/logo.jpg" alt="Logo Taller Herrera" class="" style="width: 75px; height: 65px; opacity: .8">
      <br>
      <span class="brand-text font-weight-light">TALLER HERRERA</span>
    </a>
    </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
              <a href="#" class="nav-link bg-light">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL?>/views/usuarios/usuarios.php" class="nav-link">
                <i class="fa-solid fa-address-book nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL?>/views/usuarios/crear.php" class="nav-link">
                  <i class="fa-solid fa-user-plus nav-icon"></i>
                  <p>Creacion de Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link bg-light">
              <i class="nav-icon fas fa-user-alt"></i>
              <p> 
                Clientes
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL?>/views/clientes/clientes.php" class="nav-link ">
                  <i class="fa-solid fa-sheet-plastic nav-icon"></i>
                  <p>Listado de Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo $URL?>/views/clientes/crear.php" class="nav-link">
                  <i class="fa-solid fa-person-circle-plus nav-icon"></i>
                  <p>Creacion de Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link bg-light">
              <i class="nav-icon fa-solid fa-screwdriver-wrench"></i>
              <p> 
                Reparaciones
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL?>/views/reparaciones/reparaciones.php" class="nav-link ">
                <i class="fa-solid fa-toolbox nav-icon"></i>
                  <p>Listado de Reparaciones</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo $URL?>/views/reparaciones/crear.php" class="nav-link">
                  <i class="nav-icon fa-solid fa-circle-plus"></i>
                  <p>Nueva Reparacion</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link bg-light">
              <i class="fa-solid fa-money-bills"></i>
              <p> 
                Facturación
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL?>/views/reparaciones/reparaciones.php" class="nav-link ">
                <i class="fa-solid fa-money-bill-transfer nav-icon"></i>
                  <p>Listado de pagos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <h1>  </h1>
          </li>
          <li class="nav-item">
            <h1>  </h1>
          </li>
          <li class="nav-item">
            <a href="<?php echo $URL?>/app/controllers/login/logout.php" class="nav-link bg-danger">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar Sesion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>