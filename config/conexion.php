<?php
// define('DBUSER','root');
// define('DBPWD','');
// define('DBHOST','localhost');
// define('DBNAME','greenpower');
require_once('config.php');

date_default_timezone_set('Europe/Madrid');

$conex=new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
 
mysqli_set_charset($conex,'utf8');


if (mysqli_connect_error()) {
    die('Error de Conexión (' . mysqli_connect_error() . ') '
            . mysqli_connect_error());
}

// echo 'Éxito... ' . $conex->host_info. "\n";

?> 