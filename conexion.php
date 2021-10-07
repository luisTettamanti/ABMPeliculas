<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "";
$base_de_datos = "cine";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
$mysqli -> set_charset('utf8');
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
return $mysqli;
