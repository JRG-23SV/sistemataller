<?php


if((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono']))){
    $resp = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];?>
  
    <script>
      Swal.fire({
    icon: '<?php echo $icono; ?>',
    title: '<?php echo $resp; ?>',
    showConfirmButton: false,
    timer: 2500
  })
    </script>
  <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
  }



?>