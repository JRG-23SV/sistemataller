<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','taller');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
} catch (PDOException $e) {
    print_r($e);
}

date_default_timezone_set("America/El_Salvador");
$fecha_hora = date('Y-m-d H:i:s');
$fechaticket = date('d-m-Y');
$horaticket = date('H:i');

$host = $_SERVER['HTTP_HOST'];
$ip = $_SERVER['SERVER_ADDR'];
//verificar ruta actual es localhost

if($host == 'localhost'){
    return $URL = "http://localhost/sistemataller";
} else {
    return $URL = "http://$ip/sistemataller";
}


