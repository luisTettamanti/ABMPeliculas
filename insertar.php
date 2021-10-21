<?php
$mysqli = include_once "conexion.php";
$nombre = $_GET["nombre"];
$anio = $_GET["anio"];
$duracion = $_GET["duracion"];
$idDirector = $_GET["idDirector"];
$IMDB = $_GET["IMDB"];
$idCategoria = $_GET["idCategoria"];
$caratula = $_GET["caratula"];
$cantidad = $_GET["cantidad"];
$sentencia = $mysqli->prepare("INSERT INTO peliculas
  (nombre, anio, duracion, idDirector, IMDB, idCategoria, caratula, cantidad)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$sentencia->bind_param("siiidisi", $nombre, $anio, $duracion, $idDirector, $IMDB, $idCategoria, $caratula, $cantidad);
$sentencia->execute();
//header("Location: listar.php");
