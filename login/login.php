<?php

include ('../app/config.php');

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>Login</title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $URL; ?>/img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $URL; ?>/img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $URL; ?>/img/favicon_io/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $URL; ?>/img/favicon_io/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="512x512" href="<?php echo $URL; ?>/img/favicon_io/android-chrome-512x512.png">
  <link rel="manifest" href="<?php echo $URL; ?>/img/favicon_io/site.webmanifest">
  <!--sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['mensajeerror'])) {

    $resp = $_SESSION['mensajeerror']; ?>

    <script>
      Swal.fire({
        icon: 'error',
        title: '<?php echo $resp ?>',
        text: 'Por favor, vuelva a escribir sus datos',
        showConfirmButton: false,
        timer: 2000
      })
    </script>
  <?php
  }
  ?>

  <div class="login">
    <center>
      <img src="../img/logo.jpg" alt="Logo Taller Herrera" class="img-responsive img-thumbnail" style="width:250px;height:auto;">
    </center>
    <h1>SOFTWARE TALLER HERRERA</h1>
    <form action="../app/controllers/login/login.php" method="POST">
      <input type="text" name="user" placeholder="USUARIO" required="required" />
      <input type="password" name="pass" placeholder="CONTRASEÑA" required="required" />
      <p></p>
      <button type="submit" class="btn1 btn-primary btn-block btn-large">INGRESAR</button>
    </form>
    <div>
      <p></p>
      <p></p>
    </div>
  </div>



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  <!-- jQuery -->
  <!-- Bootstrap 4 -->
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo $URL; ?>/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</body>

</html>