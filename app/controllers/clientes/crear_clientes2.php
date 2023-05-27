<?php

include('../../config.php');

$nombrecliente = $_POST['nombre'];
$apellidocliente = $_POST['apellido'];
$marcavehiculo = $_POST['marca_vehiculo'];
$modelovehiculo = $_POST['modelo_vehiculo'];
$placavehiculo = $_POST['placa_vehiculo'];
$telefonocliente = $_POST['telefono'];

$sentence =$pdo->prepare("INSERT INTO cliente 
        (nombre, apellido, marca_vehiculo, modelo_vehiculo, placa_vehiculo, telefono) 
VALUES (:nombre, :apellido, :marca_vehiculo, :modelo_vehiculo, :placa_vehiculo, :telefono)");

$sentence->bindParam('nombre',$nombrecliente);
$sentence->bindParam('apellido',$apellidocliente);
$sentence->bindParam('marca_vehiculo',$marcavehiculo);
$sentence->bindParam('modelo_vehiculo',$modelovehiculo);
$sentence->bindParam('placa_vehiculo',$placavehiculo);
$sentence->bindParam('telefono',$telefonocliente);

if ($sentence->execute()){
session_start();
    $_SESSION['mensaje'] = "Listo, cliente agregado con exito  :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/clientes/clientes2.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, el cliente no ha sido ingresado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/clientes/crear2.php');
}
?>