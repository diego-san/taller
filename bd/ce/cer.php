<?php

$usuario = "root";
$clave = "";
$db_nombre = "taller";
$host = "localhost";
try {
    $conn = new PDO("mysql:host=$host;dbname=$db_nombre;charset=utf8", $usuario, $clave);
    /* change character set to utf8 */


} catch (PDOException $e) {
    echo "error";
}
?>