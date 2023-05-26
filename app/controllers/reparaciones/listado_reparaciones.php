<?php

  $sql_reparaciones = "SELECT repa.id_rep as id_rep, client.id  as id, client.nombre as nombre, client.apellido as apellido, client.marca_vehiculo as marca_vehiculo, client.modelo_vehiculo as modelo_vehiculo, client.placa_vehiculo as placa_vehiculo, repa.fallas as fallas, repa.fecha_ingreso as fecha_ingreso, repa.imagen as imagen, repa.estado_rep as estado_rep, est.estado as estado 
  FROM cliente as client INNER JOIN reparaciones as repa ON client.id = repa.id_clientes INNER JOIN estado_rep as est ON repa.estado_rep = est.id_est";
  $query_reparaciones = $pdo->prepare($sql_reparaciones);
  $query_reparaciones->execute();
  $datos_reparaciones = $query_reparaciones->fetchAll(fetch_style: PDO::FETCH_ASSOC);
