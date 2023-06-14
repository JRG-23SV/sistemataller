<?php

include('../../../config.php');

$idclientes = $_POST['id_clientes'];
$fallarep = $_POST['falla'];
$fecharep = $_POST['fecha'];
$image = $_POST['image'];
$estadorep = $_POST['estado'];

$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo."__".$_FILES['image']['name'];
$location = "../../../../views/reparaciones/img_reparaciones/".$filename;

move_uploaded_file($_FILES['image']['tmp_name'],$location);

$sentence =$pdo->prepare("INSERT INTO reparaciones 
        (id_clientes, fallas, fecha_ingreso, imagen, estado_rep) 
VALUES (:id_clientes, :fallas, :fecha_ingreso, :imagen, :estado_rep)");

$sentence->bindParam('id_clientes',$idclientes);
$sentence->bindParam('fallas',$fallarep);
$sentence->bindParam('fecha_ingreso',$fecharep);
$sentence->bindParam('imagen',$filename);
$sentence->bindParam('estado_rep',$estadorep);

if ($sentence->execute()){
session_start();
    $_SESSION['mensaje'] = "Reparacion agregada con exito  :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../../sistemataller/views/reparaciones/usuario/reparaciones.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, no ha sido ingresado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../../sistemataller/views/reparaciones/usuario/crear.php');
}
?>