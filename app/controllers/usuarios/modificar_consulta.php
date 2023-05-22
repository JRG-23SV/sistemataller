<?php

$usuarios_id_get = $_GET['id'];

$sql_usuarios = "SELECT usr.id_usuario as id_usuario, usr.username as username, usr.correo as correo, usr.fecha_actualizacion as fecha_actualizacion, rol.rol as rol 
                FROM usuario as usr INNER JOIN roles as rol ON usr.id_rol = rol.id_rol where id_usuario = '$usuarios_id_get'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(fetch_style: PDO::FETCH_ASSOC);

foreach ($datos_usuarios as $dato_usuarios){
    $username = $dato_usuarios['username'];
    $correo = $dato_usuarios['correo'];
    $rol = $dato_usuarios['rol'];
    $act = $dato_usuarios['fecha_actualizacion'];
}

?>