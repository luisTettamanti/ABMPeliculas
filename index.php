<?php
include_once "encabezado.php";
$mysqli = include_once "conexion.php";
$resultado = $mysqli->query("SELECT p.id, p.nombre, p.anio, p.duracion, p.caratula, d.nombre director, p.IMDB, c.nombre categoria FROM peliculas p
INNER JOIN directores d ON d.id=p.idDirector
INNER JOIN categorias c ON c.id=p.idCategoria");
$peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<div class="row">
    <?php
      foreach ($peliculas as $pelicula) {
        echo '<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 mx-auto mb-3">';
        echo '<div class="card">';
        echo '<img class="card-img-top" src="img/'.$pelicula['caratula'].'" alt="imagen">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">'.$pelicula['nombre'].'</h4>';
        echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
        echo '<a href="detalle.php?id='.$pelicula['id'].'" class="btn btn-primary">Ver más</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
     ?>
</div>
<?php include_once "pie.php" ?>
