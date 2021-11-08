<?php
  session_start();
  $mysqli = include_once "conexion.php";

  if (count($_SESSION['resId']) > 0) {
    $sentencia = $mysqli->prepare("INSERT INTO reservas
      (idUsuario,fecha,idEstado) VALUES (?, ?, 1)");
    $sentencia->bind_param("is", $_SESSION['idUsuario'], date("Y-m-d H:i:s"));
    $sentencia->execute();

    $query = "SELECT id FROM reservas ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($query);
    $idReserva = $result->fetch_row()[0];
    echo $idReserva;
  }

  for ($i=0; $i < count($_SESSION['resId']); $i++) {
    $sentencia = $mysqli->prepare("INSERT INTO resPeliculas
      (idReserva,idPelicula,cantidad) VALUES (?, ?, ?)");
    $sentencia->bind_param("iii", $idReserva, $_SESSION['resId'][$i], $_SESSION['resCantidad'][$i]);
    $sentencia->execute();
  }

  unset($_SESSION['resId']);
  unset($_SESSION['resNombre']);
  unset($_SESSION['resCaratula']);
  unset($_SESSION['resCantidad']);
  unset($_SESSION['resImporte']);

  header("Location: indexCategorias.php");
?>
