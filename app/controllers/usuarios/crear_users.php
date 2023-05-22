<?php

include('../../config.php');

$nombreusuario = $_POST['username'];
$correousuario = $_POST['correo'];
$rolusuario = $_POST['roles'];
$passwordusuario = $_POST['password'];
$passwordrepe = $_POST['password_repet'];

if ($passwordusuario == $passwordrepe){
    $passwordusuario = password_hash($passwordusuario, PASSWORD_DEFAULT);
    $sentence = $pdo->prepare("INSERT INTO usuario 
        (username, password, correo, id_rol, fecha_creacion) 
VALUES (:username, :password, :correo, :id_rol, :fecha_creacion)");

$sentence->bindParam('username',$nombreusuario);
$sentence->bindParam('password',$passwordusuario);
$sentence->bindParam('correo',$correousuario);
$sentence->bindParam('id_rol',$rolusuario);
$sentence->bindParam('fecha_creacion',$fecha_hora);
$sentence->execute();
session_start();
    $_SESSION['mensaje'] = "Listo, usuario agregado existosamente :D";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'../../../sistemataller/views/usuarios/usuarios.php');
} else {
    //echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'../../../sistemataller/views/usuarios/crear.php');
}


?>