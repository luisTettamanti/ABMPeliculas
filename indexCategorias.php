<?php
  include_once "encabezado.php";
  $mysqli = include_once "conexion.php";

  $resultado = $mysqli->query('SELECT * FROM Categorias');
  $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

  foreach ($categorias as $cat) {
    $resultado = $mysqli->query('SELECT * FROM Peliculas WHERE idCategoria='.$cat['id']);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

    if ($peliculas) {
      echo '<div class="row"><div class="col-12">';
      echo '<h3 class="border-bottom border-3 pt-3" style="color:teal;">Categoría: '.$cat['nombre'].'</h3>';
      echo '</div></div>';
    }

  echo '<div class="row">';
    foreach ($peliculas as $peli) {
      echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">';
      echo '<div class="card my-3" style="border-color:teal;background-color:#e6ffff;">';
      echo '<img class="card-img-top" src="img/'.$peli['caratula'].'" alt="Card image">';
      echo '<div class="card-body">';
      echo '<h4 class="card-title">'.$peli['nombre'].'</h4>';
      echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
      echo '<a href="detalle.php?id='.$peli['id'].'" class="btn btn-primary">Ver más</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
  }
  include_once "pie.php";
?>
