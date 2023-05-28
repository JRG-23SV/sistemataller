<?php

$sql_pagos = "SELECT * FROM facturacion";
$query_pagos = $pdo->prepare($sql_pagos);
$query_pagos->execute();
$datos_pagos = $query_pagos->fetchAll(fetch_style: PDO::FETCH_ASSOC);
