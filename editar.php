<?php
include_once "encabezado.php";
$mysqli = include_once "conexion.php";
$id = $_GET["id"];
$sentencia = $mysqli->prepare("SELECT id, nombre, anio, duracion, idDirector, IMDB, idCategoria FROM peliculas WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();
$pelicula = $resultado->fetch_assoc();
if (!$pelicula) {
    exit("No hay resultados para ese ID");
}

$query = 'SELECT * FROM directores';
$directores = $mysqli->query($query);
if (!$directores) die($mysqli->error);
$numDir = $directores->num_rows;

$query = 'SELECT * FROM categorias';
$categorias = $mysqli->query($query);
if (!$categorias) die($mysql->error);
$numCat = $categorias->num_rows;
?>

<div class="row">
    <div class="col-12">
        <h1>Actualizar Película</h1>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $pelicula["id"] ?>">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input value="<?php echo $pelicula["nombre"] ?>" placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
              <label for="anio">Año</label>
              <input value="<?php echo $pelicula["anio"] ?>" placeholder="Año" class="form-control" type="text" name="anio" id="anio" required>
            </div>
            <div class="form-group">
              <label for="duracion">Duración</label>
              <input value="<?php echo $pelicula["duracion"] ?>" placeholder="Duración" class="form-control" type="text" name="duracion" id="duracion" required>
            </div>

            <div class="form-group">
              <label for="idDirector">Director</label>
              <select class="form-control" id="idDirector" name="idDirector">
              <?php
                for ($i=0; $i < $numDir; $i++) {
                  $directores->data_seek(i);
                  $dir = $directores->fetch_array(MYSQLI_ASSOC);
                  $sel = '';
                  if ($dir['id']==$pelicula['idDirector']) {
                    $sel = 'selected';
                  }
                  echo '<option value=' . $dir['id'] . ' ' . $sel . '>' . $dir['nombre'] .'</option>';
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="IMDB">IMDB</label>
              <input value="<?php echo $pelicula["IMDB"] ?>" placeholder="IMDB" class="form-control" type="text" name="IMDB" id="IMDB" required>
            </div>
            <div class="form-group">
              <label for="idCategoria">Categoria</label>
              <select class="form-control" id="idCategoria" name="idCategoria">
              <?php
                for ($i=0; $i < $numCat; $i++) {
                  $categorias->data_seek($i);
                  $cat = $categorias->fetch_array(MYSQLI_ASSOC);
                  $sel = '';
                  if ($cat['id']==$pelicula['idCategoria']) {
                    $sel = 'selected';
                  }
                  echo '<option value=' . $cat['id'] . ' ' . $sel . '>' . $cat['nombre'] .'</option>';
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <button class="btn btn-success">Guardar</button>
              <a class="btn btn-warning" href="listar.php">Volver</a>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>
