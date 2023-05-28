<?php

$reparaciones_id_get = $_GET['id'];

$sql_reparaciones = "SELECT repa.id_rep as id_rep, client.id  as id, client.nombre as nombre, client.apellido as apellido, client.marca_vehiculo as marca_vehiculo, client.modelo_vehiculo as modelo_vehiculo, client.placa_vehiculo as placa_vehiculo, repa.fallas as fallas, repa.fecha_ingreso as fecha_ingreso, repa.imagen as imagen, est.estado as estado
FROM cliente as client INNER JOIN reparaciones as repa ON client.id = repa.id_clientes INNER JOIN estado_rep as est ON repa.estado_rep = est.id_est WHERE id_rep = '$reparaciones_id_get'";
$query_reparaciones = $pdo->prepare($sql_reparaciones);
$query_reparaciones->execute();
$datos_reparaciones = $query_reparaciones->fetchAll(fetch_style: PDO::FETCH_ASSOC);

foreach ($datos_reparaciones as $dato_reparaciones){
    $idrep = $dato_reparaciones['id_rep'];
    $nombre = $dato_reparaciones['nombre'];
    $apellido = $dato_reparaciones['apellido'];
    $marca = $dato_reparaciones['marca_vehiculo'];
    $modelo = $dato_reparaciones['modelo_vehiculo'];
    $placa = $dato_reparaciones['placa_vehiculo'];
    $fecharep = $dato_reparaciones['fecha_ingreso'];
    $fallarep = $dato_reparaciones['fallas'];
}

?>