<?php

include('../../config.php');

$idrepara = $_POST['id_repara'];
$clientefactura = $_POST['clientefact'];
$descripcionrepa = $_POST['repdescrip'];
$fecharepa = $_POST['fechafact'];
$gastoreparacion = $_POST['gastorep'];
$montoreparacion = $_POST['montorep'];
$montototal = $gastoreparacion + $montoreparacion;

# Incluyendo librerias necesarias #
require "../../../views/facturacion/ticket/code128.php";

  # Codigo de barras #
  $codigogenerado = strtoupper(uniqid('COD'));

  $codebarra = $codigogenerado;

  echo ($codigogenerado);

$sentence = $pdo->prepare("INSERT INTO facturacion
        (id_reparacion, cliente, descripcionrepa, fecha_reparacion, gastorep, montorep, pagototal, codebarra)
VALUES (:id_reparacion, :cliente, :descripcionrepa, :fecha_reparacion, :gastorep, :montorep, :pagototal, :codebarra)");

$sentence->bindParam(':id_reparacion', $idrepara);
$sentence->bindParam(':cliente', $clientefactura);
$sentence->bindParam(':descripcionrepa', $descripcionrepa);
$sentence->bindParam(':fecha_reparacion', $fecharepa);
$sentence->bindParam(':gastorep', $gastoreparacion);
$sentence->bindParam(':montorep', $montoreparacion);
$sentence->bindParam(':pagototal', $montototal);
$sentence->bindParam(':codebarra', $codebarra);

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
