<?php

include('../../config.php');

$id_cliente = $_POST['id_cliente'];

$sentence = $pdo->prepare("DELETE FROM cliente WHERE id=:id");

$sentence->bindParam('id',$id_cliente);
$sentence->execute();
session_start();
    $_SESSION['mensaje'] = "Cliente eliminado con exito :D ";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/clientes/clientes.php');


?> 