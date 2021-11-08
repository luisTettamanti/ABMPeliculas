<?php
include_once "encabezado.php";
//$mysqli = include_once "conexion.php";

if (isset($_GET['borrarcarro'])) {
  unset($_SESSION['resId']);
  unset($_SESSION['resNombre']);
  unset($_SESSION['resCaratula']);
  unset($_SESSION['resCantidad']);
  unset($_SESSION['resImporte']);
  $resId = array();
  $resNombre = array();
  $resCaratula = array();
  $resCantidad = array();
  $resImporte = array();
  $_SESSION['resId'] = $resId;
  $_SESSION['resNombre'] = $resNombre;
  $_SESSION['resCaratula'] = $resCaratula;
  $_SESSION['resCantidad'] = $resCantidad;
  $_SESSION['resImporte'] = $resImporte;
} else {
  if (!isset($_SESSION['resId'])) {
    $resId = array();
    $resNombre = array();
    $resCaratula = array();
    $resCantidad = array();
    $resImporte = array();
    $_SESSION['resId'] = $resId;
    $_SESSION['resNombre'] = $resNombre;
    $_SESSION['resCaratula'] = $resCaratula;
    $_SESSION['resCantidad'] = $resCantidad;
    $_SESSION['resImporte'] = $resImporte;
  }
  if (isset($_GET['id'])) {
    $sentencia = $mysqli->prepare("SELECT id, nombre, caratula
    FROM peliculas
    WHERE id = ?");
    $sentencia->bind_param("i", $_GET['id']);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $reserva = $resultado->fetch_assoc();
    array_push($_SESSION['resId'],$reserva['id']);
    array_push($_SESSION['resNombre'],$reserva['nombre']);
    array_push($_SESSION['resCaratula'],$reserva['caratula']);
    array_push($_SESSION['resCantidad'],$_GET['cantidad']);
    array_push($_SESSION['resImporte'],100);
  }
}

  if (!isset($_SESSION['resId']) || (count($_SESSION['resId']) > 0)) {

    echo '<div class="row"><div class="col-12">';
    echo '<h3 class="pt-3" style="color:teal; border:1px solid teal; border-style:none none solid none">Carro de Compras</h3>';
    echo '</div></div>';

    echo '<table class="table table-striped">';
      echo '<thead>';
        echo '<th class="table-cell">Carátula</th>';
        echo '<th class="table-cell">Id</th>';
        echo '<th class="table-cell">Película</th>';
        echo '<th class="table-cell">Cantidad</th>';
        echo '<th class="table-cell">Importe</th>';
      echo '</thead>';
      echo '<tbody>';

      for ($i=0; $i < count($_SESSION['resId']); $i++) {
        echo '<tr>';
        echo '<td class="table-cell"><img class="rounded-circle" style="width:100px; height:100px; object-fit:cover;" src="img/'.$_SESSION['resCaratula'][$i].'"></td>';
        echo '<td class="table-cell" style="vertical-align:middle;">'.$_SESSION['resId'][$i].'</td>';
        echo '<td class="table-cell" style="vertical-align:middle;">'.$_SESSION['resNombre'][$i].'</td>';
        echo '<td class="table-cell" style="vertical-align:middle;">'.$_SESSION['resCantidad'][$i].'</td>';
        echo '<td class="table-cell" style="vertical-align:middle;">'.$_SESSION['resImporte'][$i].'</td>';
        echo '</tr>';
      }

      echo '</tbody>';
    echo '</table>';

    } else {

  echo '<div class="row"><div class="col-12">';
  echo '<h3 class="pt-3" style="color:teal; border:1px solid teal; border-style:none none solid none">Carro de Compras</h3>';
  echo '</div></div>';

  echo '<div class="alert alert-info p-2 mt-3">Aún no hay elementos en el carro.</div>';
  }

echo <<<'HTML'
  <div class="d-grid gap-2 d-md-block mb-3">
  <a href="reserva.php?borrarcarro=True" class="btn btn-success">Borrar Carro</a>
  <a href="enviarreserva.php" class="btn btn-success">Reservar</a>
  </div>
HTML;

  include_once "pie.php";

?>
