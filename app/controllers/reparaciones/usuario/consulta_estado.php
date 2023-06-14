<?php

$sql_estado = "SELECT * FROM estado_rep";
$query_estado = $pdo->prepare($sql_estado);
$query_estado->execute();
$datos_estado = $query_estado->fetchAll(fetch_style: PDO::FETCH_ASSOC);
