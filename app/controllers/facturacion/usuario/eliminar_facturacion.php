<?php

include('../../../config.php');

$ticketid_get = $_POST['id_pago'];

$sentence = $pdo->prepare("DELETE FROM facturacion WHERE id_factura =:id_factura");

$sentence->bindParam(':id_factura',$ticketid_get);
$sentence->execute();
session_start();
    $_SESSION['mensaje'] = "Pago eliminado con exito :D ";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../../sistemataller/views/facturacion/facturacion2.php');


?> 