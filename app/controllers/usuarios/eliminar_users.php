<?php

include('../../config.php');

$id_usuario = $_POST['id_usuario'];

$sentence = $pdo->prepare("DELETE FROM usuario WHERE id_usuario=:id_usuario");

$sentence->bindParam('id_usuario',$id_usuario);
$sentence->execute();
session_start();
    $_SESSION['mensaje'] = "Usuario eliminado con exito :D ";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/usuarios/usuarios.php');


?> 