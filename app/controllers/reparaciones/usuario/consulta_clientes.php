<?php

  $sql_clientes = "SELECT * FROM cliente";
  $query_clientes = $pdo->prepare($sql_clientes);
  $query_clientes->execute();
  $datos_clientes = $query_clientes->fetchAll(fetch_style: PDO::FETCH_ASSOC);
