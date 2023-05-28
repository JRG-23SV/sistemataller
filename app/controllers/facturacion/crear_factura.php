<?php

include('../../config.php');

$idrepara = $_POST['id_repara'];
$clientefactura = $_POST['clientefact'];
$descripcionrepa = $_POST['repdescrip'];
$fecharepa = $_POST['fechafact'];
$montofactura = $_POST['montofact'];

$sentence = $pdo->prepare("INSERT INTO facturacion
        (id_reparacion, cliente, descripcionrepa, fecha_reparacion, pagototal)
        VALUES (:id_reparacion, :cliente, :descripcionrepa, :fecha_reparacion, :pagototal)");

$sentence->bindParam(':id_reparacion', $idrepara);
$sentence->bindParam(':cliente', $clientefactura);
$sentence->bindParam(':descripcionrepa', $descripcionrepa);
$sentence->bindParam(':fecha_reparacion', $fecharepa);
$sentence->bindParam(':pagototal', $montofactura);

if ($sentence->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Factura creada con éxito :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/facturacion/facturacion.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al crear la factura";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/reparaciones/reparaciones.php');
}

?>
