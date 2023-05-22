<?php

include('../../config.php');

$nombreusuario = $_POST['username'];
$correousuario = $_POST['correo'];
$passwordusuario = $_POST['password'];
$passwordrepe = $_POST['password_repet'];
$id_usuario = $_POST['id_usuario'];
$rolusuario = $_POST['roles'];

if ($passwordusuario == $passwordrepe){
    $passwordusuario = password_hash($passwordusuario, PASSWORD_DEFAULT);
    $sentence = $pdo->prepare("UPDATE usuario 
    SET username=:username, 
        password=:password, 
        correo=:correo, 
        id_rol=:id_rol, 
        fecha_actualizacion=:fecha_actualizacion 
    WHERE id_usuario = :id_usuario ");

$sentence->bindParam('username',$nombreusuario);
$sentence->bindParam('password',$passwordusuario);
$sentence->bindParam('correo',$correousuario);
$sentence->bindParam('id_rol',$rolusuario);
$sentence->bindParam('fecha_actualizacion',$fecha_hora);
$sentence->bindParam('id_usuario',$id_usuario);
$sentence->execute();
session_start();
    $_SESSION['mensaje'] = "Listo, usuario actualizado exitosamente :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/usuarios/usuarios.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/usuarios/modificar.php?id='.$id_usuario);
}


?>