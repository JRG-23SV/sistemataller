<?php

  $sql_roles = "SELECT * FROM roles";
  $query_roles = $pdo->prepare($sql_roles);
  $query_roles->execute();
  $datos_roles = $query_roles->fetchAll(fetch_style: PDO::FETCH_ASSOC);
