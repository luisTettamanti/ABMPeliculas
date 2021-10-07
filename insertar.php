<?php
$mysqli = include_once "conexion.php";
$nombre = $_POST["nombre"];
$anio = $_POST["anio"];
$duracion = $_POST["duracion"];
$idDirector = $_POST["idDirector"];
$IMDB = $_POST["IMDB"];
$idCategoria = $_POST["idCategoria"];
$sentencia = $mysqli->prepare("INSERT INTO peliculas
(nombre, anio, duracion, idDirector, IMDB, idCategoria)
VALUES
(?, ?, ?, ?, ?, ?)");
$sentencia->bind_param("siiidi", $nombre, $anio, $duracion, $idDirector, $IMDB, $idCategoria);
$sentencia->execute();
header("Location: listar.php");
