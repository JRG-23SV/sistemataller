<?php

include('../../../config.php');

$idrep = $_POST['id_reparaciones'];

$sentence = $pdo->prepare("SELECT imagen FROM reparaciones WHERE id_rep = :id_rep");
$sentence->bindParam('id_rep', $idrep);
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
$filename = $row['imagen'];

$location = "../../../../views/reparaciones/img_reparaciones/" . $filename;

if (unlink($location)) {
    $sentence = $pdo->prepare("DELETE FROM reparaciones WHERE id_rep = :id_rep");
    $sentence->bindParam('id_rep', $idrep);

    if ($sentence->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Reparación eliminada con éxito :D";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '../../../../sistemataller/views/reparaciones/usuario/reparaciones.php');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar la reparación";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '../../../../sistemataller/views/reparaciones/usuario/crear.php');
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el archivo";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '../../../../sistemataller/views/reparaciones/usuario/crear.php');
}
?>
