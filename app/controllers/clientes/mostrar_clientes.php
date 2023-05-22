<?php

$clientes_id_get = $_GET['id'];

$sql_clientes = "SELECT * FROM cliente WHERE id = '$clientes_id_get'";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(fetch_style: PDO::FETCH_ASSOC);

foreach ($datos_clientes as $dato_cliente){
    $nombre = $dato_cliente['nombre'];
    $apellido = $dato_cliente['apellido'];
    $marca_vehiculo = $dato_cliente['marca_vehiculo'];
    $modelo_vehiculo = $dato_cliente['modelo_vehiculo'];
    $placa_vehiculo = $dato_cliente['placa_vehiculo'];
    $telefono = $dato_cliente['telefono'];
    $creacion = $dato_cliente['fecha_registro'];
}

?>