<?php
include_once "encabezado.php";
//$mysqli = include_once "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = $mysqli->prepare("SELECT p.id, p.nombre, p.anio, p.duracion,
      p.IMDB, p.caratula, p.resenia, p.idCategoria, c.nombre categoria,
      d.nombre director FROM peliculas p INNER JOIN categorias c
      ON c.id=p.idCategoria INNER JOIN directores d ON d.id=p.idDirector
      WHERE p.id = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $pelicula = $resultado->fetch_assoc();

    $sentencia = $mysqli->prepare("SELECT id, nombre, caratula
    FROM peliculas
    WHERE id <> ? AND idCategoria = ?");
    $sentencia->bind_param("ii", $pelicula['id'], $pelicula['idCategoria']);
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
            echo '<div class="col-6 col-xxl-4">';
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
        <p><?php echo $pelicula['resenia'];?></p>
        <form class="" action="reserva.php" method="get">
          <div class="row">
            <div class="col-2">
              <input type="text" class="form-control" placeholder="cantidad" name="cantidad" value="1">
              <input type="hidden" name="id" value="<?php echo $pelicula['id'];?>">
            </div>
            <div class="col-10">
              <?php
                if ($usuarioActual == 'Usuario') {
                  $paginaActual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  echo '<a href="login.php?desde=' . $paginaActual . '" class="btn btn-success mb-3">Agregar al carrito</a>';
                } else {
                  echo '<button type="submit" class="btn btn-success mb-3">Agregar al carrito</button>';
                }
              ?>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php include_once "pie.php"; ?>
<?php } ?>
