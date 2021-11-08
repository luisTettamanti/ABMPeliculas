<?php
  include_once "encabezado.php";
  //setlocale(LC_ALL,"es_ES");

  if (isset($_SESSION['idUsuario'])) {
    $sentencia = $mysqli->prepare("SELECT r.id, r.idUsuario, r.fecha, re.nombre, re.color
    FROM reservas r
    INNER JOIN resEstados re ON re.id=r.idEstado
    WHERE r.idUsuario = ?
    ORDER BY r.fecha DESC");
    $sentencia->bind_param("i", $_SESSION['idUsuario']);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $historial = $resultado->fetch_all(MYSQLI_ASSOC);

    echo '<div class="row"><div class="col-12">';
    echo '<h3 class="pt-3" style="color:teal; border:1px solid teal; border-style:none none solid none">Mis Compras</h3>';
    echo '</div></div>';

    echo '<div class="my-3" id="accordion">';
    foreach ($historial as $his) {
      echo '<div class="card">';
      echo '<div class="card-header" style="background-color:'.$his['color'].';">';
      echo '<a class="btn" data-bs-toggle="collapse" href="#collapse' . $his['id'] . '">';
      $fecha=date_create($his['fecha']);
      //echo '<b>'.$his['id'].'</b> '.date_format($fecha,"d").' de '.date_format($fecha,"F").' de '.date_format($fecha,"Y");
      echo '<b>'.$his['id'].'</b> | '.date_format($fecha,"d").' de '.strftime("%B",$fecha->getTimestamp()).' de '.date_format($fecha,"Y").' | '.$his['nombre'];
      echo '</a>';
      echo '</div>';
      echo '<div id="collapse' . $his['id'] . '" class="collapse" data-bs-parent="#accordion">';
      echo '<div class="card-body">';

      $sentencia = $mysqli->prepare("SELECT * from resPeliculas rp
      INNER JOIN peliculas p ON p.id = rp.idPelicula
      WHERE rp.idReserva = ?");
      $sentencia->bind_param("i", $his['id']);
      $sentencia->execute();
      $resultado = $sentencia->get_result();
      $hisPeliculas = $resultado->fetch_all(MYSQLI_ASSOC);

      foreach ($hisPeliculas as $hisPeli) {
        echo '<img class="rounded-circle" style="width:100px; height:100px; object-fit:cover;" src="img/'.$hisPeli['caratula'].'" alt="'.$hisPeli['nombre'].'">';
      }

      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
  }

  include_once "pie.php";

?>
