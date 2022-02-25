<?php
include_once "encabezado.php";
//$mysqli = include_once "conexion.php";
?>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carMoonlight.jpg" alt="Moonlight" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Moonlight</h3>
        <p class="d-none d-sm-block">Oscar Mejor Película 2016</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carBirdman.jpg" alt="Birdman" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Birdman</h3>
        <p class="d-none d-sm-block">Oscar Mejor Película 2014</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carParasite.jpg" alt="Parasite" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Parasite</h3>
        <p class="d-none d-sm-block">Oscar Mejor Película 2019</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carSpotlight.jpg" alt="Spotlight" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Spotlight</h3>
        <p class="d-none d-sm-block">Oscar Mejor Película 2016</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carKingspeech.jpg" alt="El Discurso del Rey" class="d-block w-100">
      <div class="carousel-caption">
        <h3>El Discurso del Rey</h3>
        <p>Oscar Mejor Película 2011</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<?php
  if (!isset($_GET['categoria']) || (isset($_GET['categoria']) && $_GET['categoria']=='Todas')) {
    $resultado = $mysqli->query('SELECT * FROM Categorias');
  } else {
    $resultado = $mysqli->query("SELECT * FROM Categorias WHERE nombre LIKE '".$_GET['categoria']."'");
  }
  $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

  foreach ($categorias as $cat) {
    $resultado = $mysqli->query('SELECT * FROM Peliculas WHERE idCategoria='.$cat['id']);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

    if ($peliculas) {
      echo '<div class="row"><div class="col-12">';
      echo '<h3 class="pt-3" style="color:teal; border:1px solid teal; border-style:none none solid none">Categoría: '.$cat['nombre'].'</h3>';
      echo '</div></div>';
    }

  echo '<div class="row">';
    foreach ($peliculas as $peli) {
      echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">';
      echo '<div class="card my-3" style="border-color:teal;background-color:#e6ffff;">';
      echo '<img class="card-img-top" src="img/'.$peli['caratula'].'" alt="Card image">';
      echo '<div class="card-body">';
      echo '<h4 class="card-title">'.$peli['nombre'].'</h4>';
      echo '<p class="card-text">'.substr($peli['resenia'],0,150).'...</p>';
      echo '<a href="detalle.php?id='.$peli['id'].'" class="btn btn-primary">Ver más</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
  }
  include_once "pie.php";
?>
