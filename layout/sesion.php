<?php

session_start();
if(isset($_SESSION['sesion username'])){
  $user_sesion = $_SESSION['sesion username'];
  $sql = "SELECT * FROM usuario WHERE username='$user_sesion'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll(fetch_style: PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $user_tb = $usuario['username'];
}
} else{
  header('Location: '.$URL.'/login/login.php');
}


?>