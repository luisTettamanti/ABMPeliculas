<?php
include_once "encabezado.php";

$mysqli = include_once "conexion.php";
$resultado = $mysqli->query("SELECT p.id, p.nombre, p.anio, p.duracion, d.nombre director, p.IMDB, c.nombre categoria FROM peliculas p
INNER JOIN directores d ON d.id=p.idDirector
INNER JOIN categorias c ON c.id=p.idCategoria");
$peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
  <div class="col-12">
    <h1>Listado de Películas</h1>
  </div>
  <div class="col-12">
    <a class="btn btn-success my-2" href="insertarfrm.php">Agregar nuevo</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th class="d-none d-lg-table-cell">Año</th>
          <th class="d-none d-lg-table-cell">Duración</th>
          <th class="d-none d-lg-table-cell">Director</th>
          <th class="d-none d-lg-table-cell">IMDB</th>
          <th class="d-none d-lg-table-cell">Categoría</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
        <tbody>
          <?php
          foreach ($peliculas as $pelicula) { ?>
            <tr>
              <td><?php echo $pelicula["id"] ?></td>
              <td><?php echo $pelicula["nombre"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $pelicula["anio"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $pelicula["duracion"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $pelicula["director"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $pelicula["IMDB"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $pelicula["categoria"] ?></td>
              <td>
                  <a href="editar.php?id=<?php echo $pelicula["id"] ?>">Editar</a>
              </td>
              <td>
                  <a href="eliminar.php?id=<?php echo $pelicula["id"] ?>">Eliminar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </div>
</div>

<?php include_once "pie.php" ?>
