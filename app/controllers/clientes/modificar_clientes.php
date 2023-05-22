<?php

include('../../config.php');

$nombrecliente = $_POST['nombre'];
$apellidocliente = $_POST['apellido'];
$marcavehiculo = $_POST['marca_vehiculo'];
$modelovehiculo = $_POST['modelo_vehiculo'];
$placavehiculo = $_POST['placa_vehiculo'];
$telefonocliente = $_POST['telefono'];
$id_cliente = $_POST['id_cliente'];

$sentence = $pdo->prepare("UPDATE cliente 
    SET nombre=:nombre, 
        apellido=:apellido, 
        marca_vehiculo=:marca_vehiculo, 
        modelo_vehiculo=:modelo_vehiculo, 
        placa_vehiculo=:placa_vehiculo,
        telefono=:telefono
    WHERE id = :id ");

$sentence->bindParam('nombre',$nombrecliente);
$sentence->bindParam('apellido',$apellidocliente);
$sentence->bindParam('marca_vehiculo',$marcavehiculo);
$sentence->bindParam('modelo_vehiculo',$modelovehiculo);
$sentence->bindParam('placa_vehiculo',$placavehiculo);
$sentence->bindParam('telefono',$telefonocliente);
$sentence->bindParam('id',$id_cliente);

if ($sentence->execute()){
session_start();
    $_SESSION['mensaje'] = "Listo, cliente actualizado con exito  :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/clientes/clientes.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, el cliente no ha sido actualizado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/clientes/crear.php');
}


?>