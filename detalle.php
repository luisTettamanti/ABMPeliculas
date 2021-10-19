<?php
include_once "encabezado.php";
$mysqli = include_once "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = $mysqli->prepare("SELECT p.id, p.nombre, p.anio, p.duracion,
      p.IMDB, p.caratula, p.idCategoria, c.nombre categoria,
      d.nombre director FROM peliculas p INNER JOIN categorias c
      ON c.id=p.idCategoria INNER JOIN directores d ON d.id=p.idDirector
      WHERE p.id = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $pelicula = $resultado->fetch_assoc();

    $sentencia = $mysqli->prepare("SELECT id, nombre, caratula
    FROM peliculas
    WHERE idCategoria = ?");
    $sentencia->bind_param("i", $pelicula['idCategoria']);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $similares = $resultado->fetch_all(MYSQLI_ASSOC);
?>

    <div class="row">
      <div class="col-lg-6 col-xs-12 mb-4">
        <img class="img-fluid mb-4" style="width:100%;" src="img/<?php echo $pelicula['caratula'];?>" alt="pelicula">
        <h3>Películas similares</h3>
        <div class="row">
          <?php
          foreach ($similares as $similar) {
            echo '<div class="col-4">';
            echo '<div class="card">';
            echo '<img class="card-img-top" src="img/'.$similar['caratula'].'" alt="Card image">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$similar['nombre'].'</h5>';
            echo '<a href="detalle.php?id='.$similar['id'].'" class="btn btn-primary" style="width:100%;">Consultar</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12">
        <h3><?php echo $pelicula['nombre'];?></h3>
        <h5><?php echo $pelicula['categoria'].' - '.$pelicula['duracion'].' minutos';?></h5>
        <h5><?php echo $pelicula['director'];?></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a href="reserva.php?id=<?php echo $pelicula['id'];?>&nombre=<?php echo $pelicula['nombre']; ?> " class="btn btn-success">Agregar al carrito</a>
        <!-- <button class="btn btn-success mb-3" href="reserva.php" style="width:100%;" type="button" name="button">Reservar ahora</button> -->
      </div>
    </div>

    <?php include_once "pie.php" ?>
<?php } ?>
