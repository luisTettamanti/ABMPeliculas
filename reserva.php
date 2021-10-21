<?php
include_once "encabezado.php";
$mysqli = include_once "conexion.php";

if (isset($_POST['borrarcarro'])) {
  unset($_SESSION['resId']);
  unset($_SESSION['resNombre']);
  unset($_SESSION['resCaratula']);
  unset($_SESSION['resCantidad']);
  unset($_SESSION['resImporte']);
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
?>

<table class="table table-striped">
  <thead>
    <th class="table-cell">Carátula</th>
    <th class="table-cell">Id</th>
    <th class="table-cell">Película</th>
    <th class="table-cell">Cantidad</th>
    <th class="table-cell">Importe</th>
  </thead>
  <tbody>

  <?php
    for ($i=0; $i < count($_SESSION['resId']); $i++) {
      echo '<tr>';
      echo '<td class="table-cell"><img class="rounded-circle" style="width:100px; height:100px; object-fit:cover;" src="img/'.$_SESSION['resCaratula'][$i].'"></td>';
      echo '<td class="table-cell">'.$_SESSION['resId'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resNombre'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resCantidad'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resImporte'][$i].'</td>';
      echo '</tr>';
    }
  }
  ?>

  </tbody>
</table>

<div class="d-grid gap-2 d-md-block mb-3">
  <input class="btn btn-success" type="submit" name="borrarcarro" value="Borrar carro">
  <a href="enviarreserva.php" class="btn btn-success">Reservar</a>
</div>

<!-- <div class="row">
  <div class="col-6">
    <form class="" action="reserva.php" method="post">
      <input class="btn btn-success my-3" type="submit" name="borrarcarro" value="Borrar carro">
    </form>
  </div>
  <div class="col-6">
    <a href="enviarreserva.php" class="btn btn-success m-3">Reservar</a>
  </div>
</div> -->

<?php include_once "pie.php";?>
