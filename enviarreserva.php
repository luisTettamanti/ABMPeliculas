<?php
session_start();
$mysqli = include_once "conexion.php";

$sentencia = $mysqli->prepare("INSERT INTO reservas
  (idUsuario,fecha) VALUES (?, ?)");
$sentencia->bind_param("is", $_SESSION['idUsuario'], date("Y-m-d"));
$sentencia->execute();

$query = "SELECT id FROM reservas ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($query);
$idReserva = $result->fetch_row()[0];
echo $idReserva;

for ($i=0; $i < count($_SESSION['resId']); $i++) {
  $sentencia = $mysqli->prepare("INSERT INTO resPeliculas
    (idReserva,idPelicula,cantidad) VALUES (?, ?, ?)");
  $sentencia->bind_param("iii", $idReserva, $_SESSION['resId'][$i], $_SESSION['resCantidad'][$i]);
  $sentencia->execute();
}

header("Location: indexCategorias.php");
