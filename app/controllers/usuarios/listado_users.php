<?php

  $sql_usuarios = "SELECT usr.id_usuario as id_usuario, usr.username as username, usr.correo as correo, rol.rol as rol 
                  FROM usuario as usr INNER JOIN roles as rol ON usr.id_rol = rol.id_rol";
  $query_usuarios = $pdo->prepare($sql_usuarios);
  $query_usuarios->execute();
  $datos_usuarios = $query_usuarios->fetchAll(fetch_style: PDO::FETCH_ASSOC);
