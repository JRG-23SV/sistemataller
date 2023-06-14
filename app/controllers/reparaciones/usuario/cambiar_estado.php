<?php

include('../../../config.php');

$reparaciones_id = $_POST['id_repara'];
$estadoreparacion = $_POST['estado_reparacion'];

$sentence = $pdo->prepare("UPDATE reparaciones
    SET estado_rep=:estado_rep 
    WHERE id_rep = :id_rep ");

$sentence->bindParam('estado_rep',$estadoreparacion);
$sentence->bindParam('id_rep',$reparaciones_id);
if ($sentence->execute()){
session_start();
    $_SESSION['mensaje'] = "Estado actualizado exitosamente :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../../sistemataller/views/reparaciones/usuario/reparaciones.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar el estado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/reparaciones/usuario/reparaciones.php');
}


?>