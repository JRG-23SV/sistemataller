<?php

include('../../../config.php');

$idclientes = $_POST['id_clientes'];
$fallarep = $_POST['falla'];
$fecharep = $_POST['fecha'];
$id_reparaciones = $_POST['id_reparaciones'];

$sentence = $pdo->prepare("UPDATE reparaciones 
    SET id_clientes=:id_clientes, 
        fallas=:fallas, 
        fecha_ingreso=:fecha_ingreso
    WHERE id_rep = :id_rep ");

$sentence->bindParam('id_clientes',$idclientes);
$sentence->bindParam('fallas',$fallarep);
$sentence->bindParam('fecha_ingreso',$fecharep);
$sentence->bindParam('id_rep',$id_reparaciones);

if ($sentence->execute()){
session_start();
    $_SESSION['mensaje'] = "Listo, reparacion actualizada con exito  :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../../sistemataller/views/reparaciones/usuario/reparaciones.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, no ha sido actualizado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../../sistemataller/views/reparaciones/usuario/crear.php');
}


?>