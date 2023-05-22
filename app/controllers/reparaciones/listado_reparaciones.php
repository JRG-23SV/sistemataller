<?php

  $sql_reparaciones = "SELECT repa.id_rep as id_rep, client.id  as id, client.nombre as nombre, client.apellido as apellido, client.marca_vehiculo as marca_vehiculo, client.modelo_vehiculo as modelo_vehiculo, client.placa_vehiculo as placa_vehiculo, repa.fallas as fallas 
                      FROM cliente as client INNER JOIN reparaciones as repa ON client.id = repa.id_clientes";
  $query_reparaciones = $pdo->prepare($sql_reparaciones);
  $query_reparaciones->execute();
  $datos_reparaciones = $query_reparaciones->fetchAll(fetch_style: PDO::FETCH_ASSOC);
