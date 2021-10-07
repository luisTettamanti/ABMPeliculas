<?php
$mysqli = include_once "conexion.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$anio = $_POST["anio"];
$duracion = $_POST["duracion"];
$idDirector = $_POST["idDirector"];
$IMDB = $_POST["IMDB"];
$idCategoria = $_POST["idCategoria"];

$sentencia = $mysqli->prepare("UPDATE peliculas SET
nombre = ?,
anio = ?,
duracion = ?,
idDirector = ?,
IMDB = ?,
idCategoria = ?
WHERE id = ?");
$sentencia->bind_param("siiidii", $nombre, $anio, $duracion, $idDirector, $IMDB, $idCategoria, $id);
$sentencia->execute();
header("Location: listar.php");
