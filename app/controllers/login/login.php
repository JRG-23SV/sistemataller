<?php

include('../../config.php');

$usuario = $_POST['user'];
$password = $_POST['pass'];

$cont = 0;
$sql = "SELECT * FROM usuario WHERE username = '$usuario' ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarioss = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarioss as $usuarios){
    $cont = $cont + 1;
    $usuariotabla = $usuarios['username'];
    $passwordtabla = $usuarios['password'];
}

if(($cont > 0) && (password_verify($password, $passwordtabla))){
    session_start();
    $_SESSION['sesion username'] = $usuario;
    $_SESSION['mensajebien'] = $usuario;
    header('Location: '.$URL.'/index.php');
} else {
    session_start();
    $_SESSION['mensajeerror'] = "Usuario y/o Contraseña Incorrectos";
    header('Location: '.$URL.'/login/login.php');
}